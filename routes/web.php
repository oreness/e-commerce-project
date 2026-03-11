<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use Illuminate\Support\Facades\Route;

// ─── Home ────────────────────────────────────────────────────────────────────
Route::get('/', fn () => view('welcome'))->name('home');

// ─── Products / Categories ────────────────────────────────────────────────────
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/category/{category:slug}', [ProductController::class, 'index'])->name('products.index');
Route::get('/category/{category:slug}/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// ─── Cart (accessible to guests and logged-in users) ─────────────────────────
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('add');
    Route::patch('/update/{item}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove/{item}', [CartController::class, 'remove'])->name('remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CartController::class, 'placeOrder'])->name('place-order');
});

// ─── Auth ─────────────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ─── Admin ────────────────────────────────────────────────────────────────────
// Protect all admin routes with the 'admin' middleware (see App\Http\Middleware\AdminMiddleware)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', fn () => redirect()->route('admin.products.index'))->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::delete('products/{product}/images/{image}', [AdminProductController::class, 'destroyImage'])
        ->name('products.images.destroy');
});

