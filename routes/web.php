<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/contacts', [PageController::class, 'getContacts'])->name('contacts');
