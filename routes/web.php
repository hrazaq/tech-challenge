<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index']);
// Prodcut Routes
Route::get('/products',[ProductController::class, 'all']);
Route::post('/addProduct',[ProductController::class, 'create']);

// Category Routes
Route::get('/categories',[CategoryController::class, 'all']);
Route::get('/category/{id}/products',[ProductController::class, 'filterByCategory']);

// Images Route
Route::post('/image', [ImageController::class, 'store']);