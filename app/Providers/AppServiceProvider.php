<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
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
        Event::listen(Login::class, function (Login $event) {
            $userId = $event->user->id;

            $sessionCart = session('cart', []);
            $dbCart = Cart::firstOrCreate(['user_id' => $userId], ['items' => []])->items ?? [];

            $merged = $dbCart;

            foreach ($sessionCart as $productId => $item) {
                if (isset($merged[$productId])) {
                    $merged[$productId]['quantity'] += (int) ($item['quantity'] ?? 1);
                } else {
                    $merged[$productId] = $item;
                }
            }

            Cart::updateOrCreate(
                ['user_id' => $userId],
                ['items' => $merged]
            );

            session(['cart' => $merged]);
        });

        View::composer('*', function ($view) {
            $cart = session('cart', []);
            $cartCount = array_sum(array_map(static fn ($item) => (int) ($item['quantity'] ?? 0), $cart));

            $view->with('cartCount', $cartCount);
        });
    }
}
