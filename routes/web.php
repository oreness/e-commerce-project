<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/search', function () {
    return view('search');
});
Route::get('/products', function () {
    return view('products');
});
Route::get('/product-detail', function () {
    return view('product-detail');
});

Route::get('/cart', function () {
    return view('cart');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/order-confirmation', function () {
    return view('order-confirmation');
});

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/account', function () {
    return view('account');
})->middleware('auth')->name('account.index');

Route::get('/orders', function () {
    return view('orders');
});
Route::get('/wishlist', function () {
    return view('wishlist');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin-products', function () {
    return view('admin-products');
});
Route::get('/admin-product-form', function () {
    return view('admin-product-form');
});

Route::get('/404', function () {
    return view('404');
});
