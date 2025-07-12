<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/contacts', [PageController::class, 'getContacts'])->name('contacts');

Route::get('/news-list', [PageController::class, 'getNews'])->name('news-list');
Route::get('/news-list/{slug}', [PageController::class, 'getOneNews'])->name('one-news');

Route::get('/{slug}', [PageController::class, 'getPage'])->name('page');

Route::post('/send-callback', [PageController::class, 'sendCallback'])->name('send-callback');