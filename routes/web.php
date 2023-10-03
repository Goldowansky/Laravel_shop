<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class, 'index'])->name('index.');

Route::prefix(('/user'))->name('user.')->group(function() {
	Route::resource('categories', CategoryController::class)->only(['index', 'show']);
	Route::resource('categories.items', ItemController::class)->only(['show']);
});