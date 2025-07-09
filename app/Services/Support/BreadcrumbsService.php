<?php

namespace App\Services\Support;

use App\Models\News;
use App\Models\Page;
use App\Models\Brand;
use App\Models\Point;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class BreadcrumbsService
{
    private $bread = [
        'Главная' => '/'
    ];


    /**
     * Генерация для отдельных страниц
     * @param $page
     * @return $this
     */
    public function page($page)
    {
        $this->bread[$page->title] = '/' . $page->slug;
        return $this;
    }

    public function pageAccount($page)
    {
        $this->bread['Личный кабинет'] = '/account';
        $this->bread[$page->title] = end($this->bread) . '/' . $page->slug;
        return $this;
    }

    public function pageArticle($page)
    {
        $this->bread['Статьи'] = '/articles';
        $this->bread[$page->title] = end($this->bread) . '/' . $page->slug;
        return $this;
    }

    public function pageBrand($page)
    {
        $this->page(Page::where('slug', 'brands-list')->first());
        $this->bread[$page->title] = end($this->bread) . '/' . $page->slug;
        return $this;
    }

    public function pageCategory(Category $category)
    {
        if ($category->parent) {
            $this->pageCategory($category->parent);
        }
        $this->bread['Каталог'] = '/catalog';
        $this->bread[$category->title] = '/catalog/' . $category->slug;
        return $this;
    }

    public function  pageSubcategory(Category $category)
    {
        $this->pageCategory($category->parent);
        $this->bread[$category->title] =  end($this->bread) . '/' . $category->slug;
        return $this;
    }

    public function  pageLastCategory(Category $category)
    {
        $this->pageSubcategory($category->parent);
        $this->bread[$category->title] =  end($this->bread) . '/' . $category->slug;
        return $this;
    }

    public function pageNews($page)
    {
        $this->page(Page::where('slug', 'news-list')->first());
        $this->bread[$page->title] = end($this->bread) . '/' . $page->slug;
        return $this;
    }

    public function pagePoint(Point $point)
    {
        match($point->category->level) {
            3 => $this->pageLastCategory($point->category),
            2 => $this->pageSubcategory($point->category),
            1 => $this->pageCategory($point->category),
            default => null,
        };
        $this->bread[$point->title] =  end($this->bread) . '/' . $point->slug;

        return $this;
    }

    public function pageService(Service $service)
    {
        $this->bread['Услуги'] = '/services';
        $this->bread[$service->title] = end($this->bread) . '/' . $service->slug;
        return $this;
    }

    public function pageLastService(Service $service)
    {
        $this->bread['Услуги'] = '/services';
        $this->bread[$service->parent?->title] = end($this->bread) . '/' . $service->parent?->slug;
        $this->bread[$service->title] = end($this->bread) . '/' . $service->slug;
        return $this;
    }

    public function pageProduct(Product $product)
    {
        match($product->category->level) {
            3 => $this->pageLastCategory($product->category),
            2 => $this->pageSubcategory($product->category),
            1 => $this->pageCategory($product->category),
            default => null,
        };

        $this->bread[$product->title . ' ' . $product->h1] = end($this->bread) . '/' . $product->slug;
        return $this;
    }

    public function generate()
    {
        $lastKeyBread = array_keys($this->bread)[count($this->bread)-1];
        $this->bread[$lastKeyBread] = '';

        View::share([
            'breadcrumbs' =>  $this->bread
        ]);
    }
}
