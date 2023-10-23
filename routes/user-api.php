<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('products', ProductController::class);

Route::post('orders', [OrderController::class, 'store']);
Route::put('orders', [OrderController::class, 'update']);
