<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ItemService;
use App\Services\PageService;

class PageController extends Controller
{
    public function __construct(
        private PageService $pageService,
        private ItemService $itemService,
    ){}

    public function getContacts()
    {
        $page = $this->pageService->getPage('contacts');

        return view('contacts', compact('page'));
    }
}
