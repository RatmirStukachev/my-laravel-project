<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('catalog')->name('catalog.')->group(function () {
    Route::get('/', [CategoryController::class, 'getCatalog'])->name('index');
    
    Route::get('/{category:slug}', [CategoryController::class, 'showLevel1'])
        ->name('level1');
    
    Route::get('/{parent:slug}/{category:slug}', [CategoryController::class, 'showLevel2'])
        ->name('level2');
});

Route::get('/contacts', [PageController::class, 'getContacts'])->name('contacts');

Route::get('/news-list', [PageController::class, 'getNews'])->name('news-list');
Route::get('/news-list/{slug}', [PageController::class, 'getOneNews'])->name('one-news');

Route::get('/{slug}', [PageController::class, 'getPage'])->name('page');

Route::post('/send-callback', [PageController::class, 'sendCallback'])->name('send-callback');