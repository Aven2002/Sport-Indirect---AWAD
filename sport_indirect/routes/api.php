<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::get('/stores', [StoreController::class, 'index']);
Route::get('/carts', [CartController::class, 'index']);
Route::get('/orders',[OrderController::class,'index']);
Route::get('/product',[ProductController::class,'index']);
Route::get('/profile',[ProfileController::class,'index']);
Route::get('/user',[UserController::class,'index']);