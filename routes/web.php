<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// Public routes
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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/404', function () {
    return view('404');
});

// Cart & checkout (public for now; will be auth-protected when cart portability is implemented)
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/order-confirmation', function () {
    return view('order-confirmation');
});

// Auth routes (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Logout (auth only)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/account', function () {
        return view('account');
    })->name('account.index');

    Route::get('/orders', function () {
        return view('orders');
    })->name('orders.index');

    Route::get('/wishlist', function () {
        return view('wishlist');
    })->name('wishlist.index');
});

// Admin routes (public for now; role middleware to be added later)
Route::get('/admin-products', function () {
    return view('admin-products');
});
Route::get('/admin-product-form', function () {
    return view('admin-product-form');
});
