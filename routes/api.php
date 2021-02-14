<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products',[ProductController::class, 'all']);
Route::get('/categories',[CategoryController::class, 'all']);

Route::get('/category/{id}/products',[ProductController::class, 'filterByCategory']);

Route::post('/addProduct',[ProductController::class, 'create']);

Route::post('/image', [ImageController::class, 'store']);


