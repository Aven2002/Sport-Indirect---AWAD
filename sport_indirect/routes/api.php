<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;


Route::get('/carts', [CartController::class, 'index']);
Route::get('/orders',[OrderController::class,'index']);
Route::get('/product',[ProductController::class,'index']);
Route::get('/profile',[ProfileController::class,'index']);
Route::get('/user',[UserController::class,'index']);

//Store 
Route::get('/stores', [StoreController::class, 'index']);
Route::post('/stores', [StoreController::class, 'store']);
Route::delete('/stores/{id}', [StoreController::class, 'destroy']);
Route::put('/stores/{id}', [StoreController::class, 'update']);

