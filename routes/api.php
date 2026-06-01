<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\ProductController;  

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) { 
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);

Route::post('products', [ProductController::class, 'index'])->middleware('auth:sanctum');

Route::apiResource('/api-product', ProductController::class)->middleware('auth:sanctum');



// Lebih rapih pake apiResource, karena sudah otomatis buat route untuk index, 
// store, show, update, destroy
// Harus selalu check di terminal route:list untuk memastikan route sudah dibuat dengan benar
Route::apiResource('/api-categories', CategoryController::class)->middleware('auth:sanctum');
// Route untuk order
Route::apiResource('/api-orders', OrderController::class)->middleware('auth:sanctum');
Route::apiResource('/api-orders-items', OrderItemController::class)->middleware('auth:sanctum');
