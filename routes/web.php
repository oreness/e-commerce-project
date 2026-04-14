<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('index'))->name('home');

Route::view('/shop', 'products')->name('shop.index');
Route::view('/product/{slug}', 'product-detail')->name('product.show');
Route::view('/contact', 'contact')->name('contact');
Route::view('/search', 'search')->name('search');

Route::middleware('auth')->group(function () {
    Route::view('/account', 'account')->name('account.index');
    Route::view('/cart', 'cart')->name('cart.index');
    Route::view('/checkout', 'checkout')->name('checkout.index');
    Route::view('/orders', 'orders')->name('orders.index');
    Route::view('/wishlist', 'wishlist')->name('wishlist.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
