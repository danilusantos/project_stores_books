<?php

namespace Routes\Auth;

use App\Http\Controllers\Api\v1\Auth\StoreController;
use Illuminate\Support\Facades\Route;

Route::apiResource('stores', StoreController::class);
