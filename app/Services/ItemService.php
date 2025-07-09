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
use App\Models\PageContent;
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

    
    public function getAsideArticles()
    {
        $articles = Article::isActive()
            ->select('id', 'slug', 'title', 'image', 'created_at')
            ->where('is_aside_menu', true)
            ->orderByPos()
            ->limit(3)
            ->get();

        if ($articles->isEmpty()) {
            $articles = Article::isActive()
                ->select('id', 'slug', 'title', 'image', 'created_at')
                ->orderByDesc('created_at')
                ->limit(3)
                ->get();
        }

        return $articles;
    }

    public function getSaleHitProducts(Category $category)
    {
        return Product::isActive()
            ->whereIn('category_id', $category->getAllChildrenIds())
            ->where('is_sale_hit', true)
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

    public function getAsideNews()
    {
        return News::isActive()
            ->select('id', 'slug', 'title', 'image', 'created_at')
            ->where('date', '<=', now())
            ->orderBy('pos')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();
    }

    public function getFaqs()
    {
        return Faq::isActive()
            ->where(function($query) {
                $query->whereNull('page')
                    ->orWhere('page', '');
            })
            ->orderByPos()
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

    public function getServicesForIndex()
    {
        return Service::isActive()
            ->with('children')
            ->whereNull('parent_id')
            ->orderByPos()
            ->get();
    }

    public function getFaqsForService()
    {
        return Faq::isActive()
            ->where('page', self::SERVICE_CENTER_PAGE_ID)
            ->orderByPos()
            ->get();
    }

    public function getArticlesForIndex()
    {
        return Article::isActive()
            ->where('created_at', '<=', now())
            ->orderBy('pos')
            ->orderByDesc('created_at')
            ->limit(10)
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

    public function getCompanyReviews()
    {
        $count = TextService::getSettingValue('content', 'reviews_count_company');

        $reviews = Review::isActive()
            ->where('type', 2)
            ->orderByPos()
            ->paginate((int)$count);

        if ($reviews->currentPage() > $reviews->lastPage() && $reviews->lastPage() > 0) {
            abort(404);
        }

        return $reviews;
    }

    public function getPersonalReviews()
    {
        $count = TextService::getSettingValue('content', 'reviews_count_company');

        $reviews = Review::isActive()
            ->where('type', 1)
            ->orderByPos()
            ->paginate((int)$count);

        if ($reviews->currentPage() > $reviews->lastPage() && $reviews->lastPage() > 0) {
            abort(404);
        }

        return $reviews;
    }

    public function getCategoriesForIndex()
    {
        return Category::isActive()
            ->whereNull('parent_id')
            ->orderByPos()
            ->get();
    }

    public function getCategoriesForBrand(Brand $brand)
    {
        return Category::query()
            ->select('categories.*')
            ->distinct()
            ->where('categories.is_active', true)
            ->join('products', function($join) use ($brand) {
                $join->on('categories.id', '=', 'products.category_id')
                    ->where('products.brand_id', $brand->id);
            })
            ->orderBy('categories.pos')
            ->get();
    }

    public function getProductsForBrand(Brand $brand)
    {
        $count = TextService::getSettingValue('content', 'products_count_brand');
        return Product::query()
            ->isActive()
            ->where('brand_id', $brand->id)
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('shop_product')
                    ->join('shops', 'shop_product.shop_id', '=', 'shops.id')
                    ->whereColumn('shop_product.product_id', 'products.id')
                    ->where('shops.is_active', true)
                    ->where('shop_product.count', '>', 0);
            })
            ->orderByPos()
            ->paginate((int)$count);
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

    public function getGroupedProducts(Request $request)
    {
        return Product::isActive()
            ->where('group_key', $request->group_key)
            ->orderBy('group_value')
            ->get();
    }

    public function getProductsForCatalog(Category $category, Request $request, ?Brand $brand = null)
    {
        if ($request->count) {
            session(['products_per_page' => $request->count]);
        }

        $count = session('products_per_page') ?? TextService::getSettingValue('content', 'products_count');    
            
        $products = Product::isActive()
            ->with('mainCharacteristics')
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
            ->when($request->is_promotion, function ($query) {
                $query->where('old_price', '>', '0');
            })
            ->when($request->is_new, function ($query) {
                $query->where('is_new', true);
            })
            ->when($request->is_in_stock, function ($query) {
                $query->where('balance', '>', 0);
            })
            ->when($request->is_choice, function ($query) {
                $query->where('is_choice', true);
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
