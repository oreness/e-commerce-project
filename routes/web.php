<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', fn () => view('index'))->name('home');
Route::view('/products', 'products')->name('products.index');
Route::view('/product-detail', 'product-detail')->name('product.show');
Route::view('/contact', 'contact')->name('contact');
Route::view('/search', 'search')->name('search');

// Rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    Route::view('/account', 'account')->name('account.index');
    Route::view('/cart', 'cart')->name('cart.index');
    Route::view('/checkout', 'checkout')->name('checkout.index');
    Route::view('/order-confirmation', 'order-confirmation')->name('order.confirmation');
    Route::view('/orders', 'orders')->name('orders.index');
    Route::view('/wishlist', 'wishlist')->name('wishlist.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de administración (requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::view('/admin-products', 'admin-products')->name('admin.products.index');
    Route::view('/admin-product-form', 'admin-product-form')->name('admin.products.form');
});

require __DIR__.'/auth.php';
