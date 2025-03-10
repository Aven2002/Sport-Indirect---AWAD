<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;

Route::get('/stores', [StoreController::class, 'index']);
Route::get('/carts', [CartController::class, 'index']);