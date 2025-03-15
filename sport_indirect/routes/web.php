<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Redirect to dashboard after login (for now, just a placeholder)
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/womenproduct', function () {
    return view('womenproduct');
})->name('womenproduct');

Route::get('/kidproduct', function () {
    return view('kidproduct');
})->name('kidproduct');

Route::get('/productdetail', function () {
    return view('productdetail');
})->name('productdetail');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/findstore', function () {
    return view('findstore');
})->name('findstore');

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/order', function () {
    return view('order'); 
})->name('order');

Route::get('/contactus', function () {
    return view('contactus'); 
})->name('contactus');

Route::get('/aboutus', function () {
    return view('aboutus'); 
})->name('aboutus');

Route::get('/help', function () {
    return view('help'); 
})->name('help');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/order', function () {
        return view('adminorder');
    })->name('orders.index');

    Route::get('/product', function () {
        return view('adminproduct');
    })->name('products.index');

    Route::get('/user', function () {
        return view('adminuser');
    })->name('users.index');

    Route::get('/location', function () {
        return view('adminlocation');
    })->name('locations.index');
});
