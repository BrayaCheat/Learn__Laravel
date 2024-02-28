<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Post Endpoint
Route::get('/post', [PostController::class, 'getData']);
Route::get('/post/{id}', [PostController::class, 'getDataById']);
Route::post('/post', [PostController::class, 'createData']);
Route::put('/post/{id}', [PostController::class, 'updateData']);
Route::delete('/post/{id}', [PostController::class, 'deleteData']);
// ---

// Product Endpoint
Route::get('/product', [ProductController::class, 'getAllProduct']);
Route::get('/product/{id}', [ProductController::class, 'getProductById']);
Route::get('/product/type/{type}', [ProductController::class, 'getProductByType']);
Route::post('/product', [ProductController::class, 'addProduct']);
Route::put('/product/{id}', [ProductController::class, 'updateProduct']);


