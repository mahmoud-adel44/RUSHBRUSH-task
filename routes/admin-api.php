<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductController as IndexProductController;
use App\Http\Middleware\AdminAccessMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware(AdminAccessMiddleware::class)
    ->group(function () {
        Route::get('customers', CustomerController::class);

        Route::apiResource('orders', OrderController::class)->only(['index', 'update']);

        Route::get('products', IndexProductController::class);
        Route::apiResource('products', ProductController::class)->only(['store', 'update', 'destroy']);

    });
