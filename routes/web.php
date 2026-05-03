<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// ─────────────────────────────────────────────────────────────────────────────
//  Public routes
// ─────────────────────────────────────────────────────────────────────────────

Route::get('/', function () {
    return view('index');
});

Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/404', function () {
    return view('404');
});

// ─────────────────────────────────────────────────────────────────────────────
//  Cart (guests & auth users both access)
// ─────────────────────────────────────────────────────────────────────────────

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// ─────────────────────────────────────────────────────────────────────────────
//  Checkout & order confirmation
// ─────────────────────────────────────────────────────────────────────────────

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/order-confirmation/{order}', [OrderController::class, 'confirmation'])->name('order.confirmation');

// ─────────────────────────────────────────────────────────────────────────────
//  Auth routes (guest only)
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Logout (auth only)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// ─────────────────────────────────────────────────────────────────────────────
//  Authenticated customer routes
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware('auth')->group(function () {
    Route::get('/account', function () {
        return view('account');
    })->name('account.index');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/wishlist', function () {
        return view('wishlist');
    })->name('wishlist.index');
});

// ─────────────────────────────────────────────────────────────────────────────
//  Admin routes
// ─────────────────────────────────────────────────────────────────────────────

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.products.index'));

    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)
        ->except(['show']);

    Route::delete('products/{product}/image', [\App\Http\Controllers\Admin\ProductController::class, 'deleteImage'])
        ->name('products.delete-image');
});
