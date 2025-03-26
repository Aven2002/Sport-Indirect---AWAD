<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;

Route::get('/register', [UserController::class, 'showForm']);
Route::post('/register', [UserController::class, 'submitForm']);

// Show login form
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

// Handle login submission
Route::post('/login', [UserController::class, 'login']);

// Show registration form
Route::get('/register', [UserController::class, 'showForm'])->name('register');

// Handle registration submission
Route::post('/register', [UserController::class, 'submitForm']);

// Show forgot password form (you'll need a method for this)
Route::get('/forgotpassword', function () {
    return view('forgotpassword');
})->name('forgotpassword');

//Explict return home view
Route::get('/', function () {
    return view('home'); 
})->name('home');

// Return dynamic view
Route::get('/{page}',[ViewController::class, 'show']);