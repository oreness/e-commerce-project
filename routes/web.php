<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('index'))->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/search', [ProductController::class, 'index'])->name('search');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::view('/contact', 'contact')->name('contact');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/account', 'account')->name('account.index');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::view('/wishlist', 'wishlist')->name('wishlist.index');
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::view('/order-confirmation', 'order-confirmation')->name('order.confirmation');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin-product-form', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin-products', [AdminProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin-product-form/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin-products/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/admin-products/{product}', [AdminProductController::class, 'destroy'])->name('admin.product.delete');
    Route::delete('/admin-products/{product}/images/{image}', [AdminProductController::class, 'destroyImage'])->name('admin.products.images.destroy');
});

require __DIR__.'/auth.php';
