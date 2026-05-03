<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

/**
 * Cart service — abstracts session cart (guests) vs DB cart (authenticated users).
 *
 * Cart structure (session key "cart"):
 *   [ product_id => quantity, ... ]
 */
class CartService
{
    // ──────────────────────────────────────────────────────────────────────────
    //  Public API
    // ──────────────────────────────────────────────────────────────────────────

    /** Return all cart items as a collection of objects with ->product, ->quantity, ->subtotal. */
    public function items(): \Illuminate\Support\Collection
    {
        if (Auth::check()) {
            return CartItem::with('product')
                ->where('user_id', Auth::id())
                ->get()
                ->map(fn ($ci) => (object) [
                    'id'       => $ci->id,
                    'product'  => $ci->product,
                    'quantity' => $ci->quantity,
                    'subtotal' => $ci->product->price * $ci->quantity,
                ]);
        }

        return $this->sessionItems();
    }

    public function total(): float
    {
        return (float) $this->items()->sum('subtotal');
    }

    public function count(): int
    {
        return (int) $this->items()->sum('quantity');
    }

    public function add(int $productId, int $quantity = 1): void
    {
        if (Auth::check()) {
            $item = CartItem::firstOrCreate(
                ['user_id' => Auth::id(), 'product_id' => $productId],
                ['quantity' => 0]
            );
            $item->increment('quantity', $quantity);
        } else {
            $cart = session('cart', []);
            $cart[$productId] = ($cart[$productId] ?? 0) + $quantity;
            session(['cart' => $cart]);
        }
    }

    public function update(int $productId, int $quantity): void
    {
        if ($quantity <= 0) {
            $this->remove($productId);
            return;
        }

        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->update(['quantity' => $quantity]);
        } else {
            $cart = session('cart', []);
            $cart[$productId] = $quantity;
            session(['cart' => $cart]);
        }
    }

    public function remove(int $productId): void
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();
        } else {
            $cart = session('cart', []);
            unset($cart[$productId]);
            session(['cart' => $cart]);
        }
    }

    public function clear(): void
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->delete();
        } else {
            session()->forget('cart');
        }
    }

    /**
     * Merge the guest session cart into the authenticated user's DB cart.
     * Called right after login.
     */
    public function mergeSessionCart(): void
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return;
        }

        foreach ($cart as $productId => $quantity) {
            $item = CartItem::firstOrCreate(
                ['user_id' => Auth::id(), 'product_id' => $productId],
                ['quantity' => 0]
            );
            $item->increment('quantity', $quantity);
        }

        session()->forget('cart');
    }

    // ──────────────────────────────────────────────────────────────────────────
    //  Private helpers
    // ──────────────────────────────────────────────────────────────────────────

    private function sessionItems(): \Illuminate\Support\Collection
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return collect();
        }

        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');

        return collect($cart)->map(function ($qty, $productId) use ($products) {
            $product = $products->get($productId);
            if (! $product) {
                return null;
            }

            return (object) [
                'id'       => $productId,      // acts as cart item identifier for guests
                'product'  => $product,
                'quantity' => $qty,
                'subtotal' => $product->price * $qty,
            ];
        })->filter()->values();
    }
}
