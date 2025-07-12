<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ItemService;
use App\Services\PageService;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(
        private PageService $pageService,
        private CategoryService $categoryService,
        private ItemService $itemService,
    ){}

    public function getCatalog(Request $request)
    {
        $page = $this->pageService->getPage('catalog');
        $categories = $this->categoryService->getCatalog();               

        return view('catalog', compact('page','categories'));
    }

    public function showLevel1(Request $request, Category $category)
    {
        $page = $this->pageService->setCategoryPage($category);
        $page->load(['children', 'children.parent']);

        $products = $this->itemService->getProductsForCatalog($category, $request);
        $filters = $this->categoryService->getFilters($category);

        return view('category', compact('page', 'category', 'products', 'filters'));
    }
}
