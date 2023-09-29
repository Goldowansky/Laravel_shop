<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\PhotoController;
use Illuminate\Support\Facades\Route;

	
Route::resource('categories', CategoryController::class);
Route::resource('categories.items', ItemController::class)->except(['show', 'index']);
Route::resource('categories.items.photos', PhotoController::class)->only(['create', 'store', 'destroy']);
Route::patch('categories/{category}/items/{item}/photos/{photo}/main', [PhotoController::class, 'setMain'])->name('categories.items.photos.setMain');

// Route::get('categories/{category}/items/create-with-category', [ItemController::class, 'createWithCategory'])->name('categories.items.createWithCategory');
// Route::get('categories/{category}/items/', [ItemController::class, 'storeWithCategory'])->name('categories.items.createWithCategory');