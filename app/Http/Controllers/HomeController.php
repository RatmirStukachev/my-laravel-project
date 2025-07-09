<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ItemService;
use App\Services\PageService;

class HomeController extends Controller
{
    public function __construct(
        private PageService $pageService,
        private ItemService $itemService,
    ){}

    public function index()
    {
        $page = $this->pageService->getPage('/');
        $sliders = $this->itemService->getSliders();
        $categories = $this->itemService->getCategoriesForIndex();
        $news = $this->itemService->getNewsForIndex();

        return view('index', 
            compact('page', 'sliders', 'categories', 'news'));
    }
}
