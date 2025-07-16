<?php

namespace App\Services;

use App\Models\Faq;
use App\Models\News;
use App\Models\Shop;
use App\Models\Brand;
use App\Models\Flight;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\Delivery;
use App\Models\PageContent;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Services\Support\TextService;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemService
{
    const SERVICE_CENTER_PAGE_ID = 3;
    
    public function getPageBlock(string $key): array
    {
        $infoArray = PageContent::where('key', $key)->first();

        return $infoArray?->data;
    }

    public function getSliders()
    {
        return Slider::isActive()
            ->orderByPos()
            ->get();
    }

    public function getNewProducts()
    {
        return Product::isActive()
            ->orderByDesc('updated_at')
            ->limit(10)
            ->get();
    }

    public function getBrandsForIndex()
    {
        return Brand::isActive()
            ->orderByPos()
            ->get();
    }

    public function getCategoriesForCatalog()
    {
        return Category::isActive()
            ->with('children.parent')
            ->whereNull('parent_id')
            ->orderBy('pos')
            ->orderBy('title')
            ->get();
    }

    public function getProductsCanLike()
    {
        return Product::isActive()
            ->with('category')
            ->orderBy('pos')
            ->inRandomOrder()
            ->limit(20)
            ->get();
    }

    public function getNewProductsForIndex()
    {
        return Product::isActive()
            ->with('category')
            ->where('is_new', true)
            ->orderBy('pos')
            ->limit(20)
            ->get();
    }

    public function getPopularProductsForIndex()
    {
        return Product::isActive()
            ->with('category')
            ->where('is_popular', true)
            ->orderBy('pos')
            ->limit(20)
            ->get();
    }

    public function getRecommendProducts()
    {
        return Product::isActive()
            ->where('is_recommended', true)
            ->orderBy('pos')
            ->limit(20)
            ->get();
    }

    public function getFollowProducts(Category $category)
    {
        return Product::isActive()
            ->whereIn('category_id', $category->getFollowCategoriesIds())
            ->orderBy('pos')
            ->limit(20)
            ->get();
    }

    public function getFollowCategories(Category $category)
    {
        return Category::isActive()
            ->whereIn('id', $category->getFollowCategoriesIds())
            ->orderBy('pos')
            ->get();
    }

    public function getArticles()
    {
        $count = TextService::getSettingValue('content', 'articles_count');

        $articles = Article::isActive()
            ->where('created_at', '<=', now())
            ->orderBy('pos')
            ->orderByDesc('created_at')
            ->paginate((int)$count);

        if ($articles->currentPage() > $articles->lastPage() && $articles->lastPage() > 0) {
            abort(404);
        }

        return $articles;
    }

    public function getDeliveries()
    {
        return Delivery::isActive()
            ->orderByPos()
            ->get();
    }

    public function getPaymentTypes()
    {
        return PaymentType::isActive()
            ->orderByPos()
            ->get();
    }

    public function getNewsForIndex()
    {
        return News::isActive()
            ->where('date', '<=', now())
            ->orderBy('pos')
            ->orderByDesc('date')
            ->limit(10)
            ->get();
    }

    public function getServiceBrands(array $service_brands)
    {
        if (!empty($service_brands['brands'])) {
            $brands = Brand::select('id', 'title', 'svg')->whereIn('id', $service_brands['brands'])->get();
            return $brands;
        }

        return collect();
    }

    public function getCategoriesForMenu()
    {
        return Category::isActive()
            ->whereNull('parent_id')
            ->orderByPos()
            ->get();
    }

    public function getCategoriesForIndex()
    {
        return Category::isActive()
            ->with(['children.parent', 'parent'])
            ->where('is_index', true)
            ->orderByPos()
            ->get();
    }

    public function getNewsList()
    {
        $count = TextService::getSettingValue('content', 'news_count');

        $news = News::isActive()
            ->where('date', '<=', now())
            ->orderBy('pos')
            ->orderByDesc('date')
            ->paginate((int)$count);

        if ($news->currentPage() > $news->lastPage() && $news->lastPage() > 0) {
            abort(404);
        }

        return $news;
    }

    public function getNewsForSlider()
    {
        return News::isActive()
            ->orderBy('pos')
            ->orderByDesc('date')
            ->limit(10)
            ->get();
    }

    public function getProductsForCatalog(Category $category, Request $request, ?Brand $brand = null)
    {
        $count = TextService::getSettingValue('content', 'products_count');    
            
        $products = Product::isActive()
            ->with('category')
            ->whereIn('category_id', $category->getAllChildrenIds())
            ->whereRelation('category', 'is_active', '=', true)
            ->when($brand, function($query) use ($brand) {
                $query->where('brand_id', $brand->id);
            })
            ->when($request->min_price, function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price);
            })
            ->when($request->max_price, function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price);
            })
            ->when($request->brands, function ($query) use ($request) {
                $query->whereIn('brand_id', $request->brands);
            })
            ->when($request->is_new, function ($query) {
                $query->where('is_new', true);
            })
            ->when($request->is_popular, function ($query) {
                $query->where('is_popular', true);
            })
            ->when($request->has('filters'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    foreach ($request->filters as $characteristicId => $values) {
                        $query->whereHas('characteristics', function ($query) use ($characteristicId, $values) {
                            $query->where('characteristics.id', $characteristicId)
                                ->whereIn('product_characteristic.value', $values);
                        });
                    }
                });
            })
            ->when($request->has('filters_range'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    foreach ($request->filters_range as $characteristicId => $range) {
                        if (!empty($range['min']) || !empty($range['max'])) {
                            $query->whereHas('characteristics', function ($query) use ($characteristicId, $range) {
                                $query->where('characteristics.id', $characteristicId);

                                if (!empty($range['min'])) {
                                    $query->where(DB::raw('CAST(REPLACE(product_characteristic.value, ",", ".") AS DECIMAL(10,2))'), '>=', $range['min']);
                                }

                                if (!empty($range['max'])) {
                                    $query->where(DB::raw('CAST(REPLACE(product_characteristic.value, ",", ".") AS DECIMAL(10,2))'), '<=', $range['max']);
                                }
                            });
                        }
                    }
                });
            })
            ->orderByRaw("
                CASE
                    WHEN balance > 0 THEN 0
                    ELSE 1
                END
            ")
            ->when($request->sort, function ($query) use ($request) {
                return match($request->sort) {
                    'poor' => $query->orderBy('products.price', 'asc'),
                    'expensive' => $query->orderBy('products.price', 'desc'),
                    'is_choise' => $query->orderByRaw('CASE WHEN products.is_choice = 1 THEN 1 ELSE 0 END DESC, products.updated_at DESC'),
                    'is_new' => $query->orderByRaw('CASE WHEN products.is_choice = 1 THEN 1 ELSE 0 END DESC, products.updated_at DESC'),
                    default => $query
                };
            })
            ->paginate((int)$count);

        if ($products->currentPage() > $products->lastPage() && $products->lastPage() > 0) {
            abort(404);
        }

        return $products;
    }
}
