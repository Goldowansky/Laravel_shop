<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryAdminController;
use App\Http\Controllers\ItemAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CategoryController::class, 'index'])->name('index.');

Route::prefix(('/user'))->name('user.')->group(function() {
	Route::resource('items', ItemController::class)->only(['show']);
	Route::resource('categories', CategoryController::class)->only(['index', 'show']);
});

Route::prefix('/admin')->name('admin.')->group(function() {
	Route::resource('items', ItemAdminController::class)->except(['destroy', 'show']);
	Route::get('/items/{item}/delete',[ItemAdminController::class, 'destroy']);
	Route::resource('categories', CategoryAdminController::class)->except(['destroy']);
	Route::get('/categories/{category}/delete', [CategoryAdminController::class, 'destroy']);
});