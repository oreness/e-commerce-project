<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController; // 1. Importa el nuevo controlador
use App\Http\Controllers\CartController;    // 2. Importa el controlador del carrito
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', fn () => view('index'))->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/search', [ProductController::class, 'index'])->name('search');

// 4. CAMBIO: Ruta dinámica para ver el detalle de UN producto específico usando su ID
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::view('/contact', 'contact')->name('contact');

// Cart & checkout available for guests and authenticated users
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::view('/order-confirmation', 'order-confirmation')->name('order.confirmation');

// Rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    Route::view('/account', 'account')->name('account.index');
    Route::view('/orders', 'orders')->name('orders.index');
    Route::view('/wishlist', 'wishlist')->name('wishlist.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de administración
Route::middleware('auth')->group(function () {
    Route::view('/admin-products', 'admin-products')->name('admin.products.index');
    Route::view('/admin-product-form', 'admin-product-form')->name('admin.products.form');
});

require __DIR__.'/auth.php';
