<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\FeedbackController;

//Profile
Route::get('/profile/{id}',[ProfileController::class,'getProfile']);
Route::put('/profile/{id}',[ProfileController::class,'update']);

//User
Route::get('/user',[UserController::class,'index']);
Route::post('/user',[UserController::class,'store']);
Route::delete('/user/{id}',[UserController::class,'destroy']);

//Store 
Route::get('/stores', [StoreController::class, 'index']);
Route::post('/stores', [StoreController::class, 'store']);
Route::delete('/stores/{id}', [StoreController::class, 'destroy']);
Route::put('/stores/{id}', [StoreController::class, 'update']);

//Cart
Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/{user_id}', [CartController::class, 'getUserCart']);
Route::post('/cart',[CartController::class, 'addToCart']);
Route::put('/cart',[CartController::class,'update']);
Route::delete('/cart',[CartController::class,'destroy']);

//Product
Route::get('/product',[ProductController::class,'index']);
Route::post('/product',[ProductController::class,'store']);
Route::put('/product/{id}',[ProductController::class,'update']);
Route::delete('/product/{id}',[ProductController::class,'destroy']);

//Order
Route::get('/order',[OrderController::class,'index']);
Route::get('/order/{id}',[OrderController::class,'getUserOrders']);
Route::post('/order',[OrderController::class,'store']);
Route::put('/order/{id}',[OrderController::class,'update']);
Route::delete('/order/{id}',[OrderController::class,'destroy']);

//Address
Route::get('/address',[AddressController::class,'index']);
Route::get('/address/{id}',[AddressController::class,'getUserAddressBook']);
Route::post('/address',[AddressController::class,'store']);
Route::put('/address/{id}',[AddressController::class,'update']);
Route::delete('/address/{id}',[AddressController::class,'destroy']);

//Feedback
Route::get('/feedback',[FeedbackController::class,'index']);
Route::get('/feedback/unread',[FeedbackController::class,'unreadCount']);
Route::get('/feedback/{id}',[FeedbackController::class,'getFeedback']);
Route::delete('/feedback/{id}',[FeedbackController::class,'destroy']);
Route::post('/feedback',[FeedbackController::class,'store']);
Route::put('/feedback/{id}',[FeedbackController::class,'updateStatus']);
