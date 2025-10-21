<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ZoomosImportService
{
    private int $productsCreated = 0;

    private int $productsUpdated = 0;

    private int $productsSkipped = 0;

    private int $productsDeactivated = 0;

    private array $processedZoomosIds = [];

    private array $categoryCache = [];

    private array $brandCache = [];

    public function import(string $apiKey, ?callable $progressCallback = null): array
    {
        $this->resetCounters();
        $this->resetCache();

        $products = $this->fetchProducts($apiKey);

        if (empty($products)) {
            Log::warning('Zoomos API returned empty products list');

            return $this->getStats();
        }

        $totalProducts = count($products);
        $processed = 0;

        foreach ($products as $productData) {
            $this->processProduct($productData);
            $processed++;

            if ($progressCallback) {
                $progressCallback($processed, $totalProducts);
            }
        }

        $this->deactivateProducts();

        Log::info('Products imported', $this->getStats());

        return $this->getStats();
    }

    private function fetchProducts(string $apiKey): array
    {
        try {
            $response = Http::timeout(60)->get('https://api.zoomos.by/pricelist', [
                'key' => $apiKey,
            ]);

            if (! $response->successful()) {
                Log::error('Zoomos API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [];
            }

            return $response->json() ?? [];
        } catch (\Exception $e) {
            Log::error('Zoomos API exception', [
                'message' => $e->getMessage(),
            ]);

            return [];
        }
    }

    private function processProduct(array $productData): void
    {
        // Пропускаем товары где vendor[id] = 0 или model = '?'
        if ($this->shouldSkipProduct($productData)) {
            $this->productsSkipped++;

            return;
        }

        $zoomosId = $productData['id'];
        $this->processedZoomosIds[] = $zoomosId;

        $product = Product::where('zoomos_id', $zoomosId)->first();

        if ($product) {
            $this->updateProduct($product, $productData);
        } else {
            $this->createProduct($productData);
        }
    }

    private function shouldSkipProduct(array $productData): bool
    {
        return ($productData['vendor']['id'] ?? 0) === 0
            || ($productData['model'] ?? '') === '?';
    }

    private function updateProduct(Product $product, array $productData): void
    {
        try {
            $product->update([
                'price' => $productData['price'] ?? null,
                'is_active' => $productData['status'] ?? 0,
            ]);

            $this->productsUpdated++;
        } catch (\Exception $e) {
            Log::error('Failed to update product', [
                'zoomos_id' => $productData['id'],
                'message' => $e->getMessage(),
            ]);
        }
    }

    private function createProduct(array $productData): void
    {
        try {
            $categoryId = null;
            if (! empty($productData['category']['id'])) {
                $categoryId = $this->getOrCreateCategory($productData['category']);
            }

            $brandId = null;
            if (! empty($productData['vendor']['id'])) {
                $brandId = $this->getOrCreateBrand($productData['vendor']);
            }

            $imagePath = null;
            if (! empty($productData['image'])) {
                $imagePath = $this->downloadImage($productData['image'], $productData['id']);
            }

            $title = $productData['supplierInfo']['model'] ?? 'Unknown Product';
            $slug = Str::slug($title);

            $originalSlug = $slug;
            $counter = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug.'-'.$counter;
                $counter++;
            }

            // Создаем товар
            Product::create([
                'zoomos_id' => $productData['id'],
                'title' => $title,
                'slug' => $slug,
                'price' => $productData['price'] ?? null,
                'is_active' => $productData['status'] ?? 0,
                'is_new' => $productData['isNew'] ?? 0,
                'category_id' => $categoryId,
                'brand_id' => $brandId,
                'image' => $imagePath,
            ]);

            $this->productsCreated++;
        } catch (\Exception $e) {
            Log::error('Failed to create product', [
                'zoomos_id' => $productData['id'],
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }

    private function getOrCreateCategory(array $categoryData): ?int
    {
        $zoomosId = $categoryData['id'];

        if (isset($this->categoryCache[$zoomosId])) {
            return $this->categoryCache[$zoomosId];
        }

        $category = Category::where('zoomos_id', $zoomosId)->first();

        if ($category) {
            $this->categoryCache[$zoomosId] = $category->id;

            return $category->id;
        }

        $title = $categoryData['name'] ?? 'Unknown Category';
        $slug = Str::slug($title);

        $originalSlug = $slug;
        $counter = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug.'-'.$counter;
            $counter++;
        }

        $category = Category::create([
            'zoomos_id' => $zoomosId,
            'title' => $title,
            'slug' => $slug,
            'is_active' => 1,
        ]);

        $this->categoryCache[$zoomosId] = $category->id;

        return $category->id;
    }

    private function getOrCreateBrand(array $vendorData): ?int
    {
        $zoomosId = $vendorData['id'];

        if (isset($this->brandCache[$zoomosId])) {
            return $this->brandCache[$zoomosId];
        }

        $brand = Brand::where('zoomos_id', $zoomosId)->first();

        if ($brand) {
            $this->brandCache[$zoomosId] = $brand->id;

            return $brand->id;
        }

        $title = $vendorData['name'] ?? 'Unknown Brand';

        $brand = Brand::create([
            'zoomos_id' => $zoomosId,
            'title' => $title,
            'is_active' => 1,
        ]);

        $this->brandCache[$zoomosId] = $brand->id;

        return $brand->id;
    }

    private function downloadImage(string $imageUrl, int $productId): ?string
    {
        try {
            $response = Http::timeout(30)->get($imageUrl);

            if (! $response->successful()) {
                Log::warning('Failed to download image', [
                    'url' => $imageUrl,
                    'status' => $response->status(),
                ]);

                return null;
            }

            $extension = 'jpg';
            $contentType = $response->header('Content-Type');
            if (str_contains($contentType, 'png')) {
                $extension = 'png';
            } elseif (str_contains($contentType, 'gif')) {
                $extension = 'gif';
            } elseif (str_contains($contentType, 'webp')) {
                $extension = 'webp';
            }

            $filename = 'product-'.$productId.'-'.time().'.'.$extension;
            $path = 'products/'.$filename;

            Storage::disk('public')->put($path, $response->body());

            return $path;
        } catch (\Exception $e) {
            Log::error('Failed to download image', [
                'url' => $imageUrl,
                'message' => $e->getMessage(),
            ]);

            return null;
        }
    }

    private function deactivateProducts(): void
    {
        try {
            $deactivatedNull = Product::whereNull('zoomos_id')
                ->where('is_active', 1)
                ->update(['is_active' => 0]);

            $deactivatedMissing = Product::whereNotNull('zoomos_id')
                ->whereNotIn('zoomos_id', $this->processedZoomosIds)
                ->where('is_active', 1)
                ->update(['is_active' => 0]);

            $this->productsDeactivated = $deactivatedNull + $deactivatedMissing;

            Log::info('Deactivated products', [
                'null_zoomos_id' => $deactivatedNull,
                'missing_from_api' => $deactivatedMissing,
                'total' => $this->productsDeactivated,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to deactivate products', [
                'message' => $e->getMessage(),
            ]);
        }
    }

    private function resetCounters(): void
    {
        $this->productsCreated = 0;
        $this->productsUpdated = 0;
        $this->productsSkipped = 0;
        $this->productsDeactivated = 0;
        $this->processedZoomosIds = [];
    }

    private function resetCache(): void
    {
        $this->categoryCache = [];
        $this->brandCache = [];
    }

    private function getStats(): array
    {
        return [
            'created' => $this->productsCreated,
            'updated' => $this->productsUpdated,
            'skipped' => $this->productsSkipped,
            'deactivated' => $this->productsDeactivated,
            'total' => $this->productsCreated + $this->productsUpdated + $this->productsSkipped,
        ];
    }
}
