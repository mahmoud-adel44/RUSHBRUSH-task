<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'data' => 'works!'
    ]);
});

Route::prefix('user')
    ->group(function () {
        base_path('routes/auth.php');

        Route::middleware(['auth:sanctum'])
            ->group(
                base_path('routes/user-api.php')
            );
    });

Route::prefix('admin')
    ->group(function () {
        base_path('routes/auth.php');

        Route::middleware(['auth:sanctum'])
            ->group(
                base_path('routes/admin-api.php')
            );
    });
