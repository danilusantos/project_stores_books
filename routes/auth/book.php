<?php

namespace Routes\Auth;

use App\Http\Controllers\Api\v1\Auth\BookController;
use Illuminate\Support\Facades\Route;

Route::apiResource('books', BookController::class);
