<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(fn ($item) => (float) $item['price'] * (int) $item['quantity']);

        return view('checkout', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'shipping_name' => ['required', 'string', 'max:255'],
            'shipping_address' => ['required', 'string', 'max:255'],
            'shipping_city' => ['required', 'string', 'max:255'],
            'shipping_method' => ['required', 'string', 'max:100'],
            'payment_method' => ['required', 'string', 'max:100'],
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $order = DB::transaction(function () use ($validated, $cart) {
            $total = collect($cart)->sum(fn ($item) => (float) $item['price'] * (int) $item['quantity']);

            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'ORD-'.strtoupper(Str::random(10)),
                'status' => 'confirmed',
                'shipping_name' => $validated['shipping_name'],
                'shipping_address' => $validated['shipping_address'],
                'shipping_city' => $validated['shipping_city'],
                'shipping_method' => $validated['shipping_method'],
                'payment_method' => $validated['payment_method'],
                'total_price' => $total,
            ]);

            foreach ($cart as $key => $item) {
                $order->items()->create([
                    'product_id' => is_numeric($key) ? (int) $key : null,
                    'quantity' => (int) $item['quantity'],
                    'unit_price' => (float) $item['price'],
                ]);
            }

            session()->forget('cart');

            if (Auth::check()) {
                Cart::updateOrCreate(
                    ['user_id' => Auth::id()],
                    ['items' => []]
                );
            }

            return $order;
        });

        return redirect()->route('order.confirmation')->with('success', 'Order '.$order->order_number.' has been placed successfully.');
    }
}
