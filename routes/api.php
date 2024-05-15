<?php

use App\Http\Controllers\Api\v1\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->group(function () {
        // Routes accessible only when authenticated
        Route::middleware('auth:sanctum')->group(function () {
            // Logout route
            Route::post('/logout', [AuthController::class, 'logout']);
        });

        // Routes accessible only when guest (not authenticated)
        Route::middleware('guest')->group(function () {
            // Login route
            Route::post('/login', [AuthController::class, 'login']);
        });
    });
