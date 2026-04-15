<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart = session('cart', []);
            $cartCount = array_sum(array_map(static fn ($item) => (int) ($item['quantity'] ?? 0), $cart));

            $view->with('cartCount', $cartCount);
        });
    }
}
