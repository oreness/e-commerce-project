<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function index(): View|RedirectResponse
    {
        $items = $this->cart->items();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = $this->cart->total();

        // Pre-fill form with authenticated user's data if available
        $user = Auth::user();

        return view('checkout', compact('items', 'total', 'user'));
    }

    public function store(Request $request): RedirectResponse
    {
        $items = $this->cart->items();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'email', 'max:255'],
            'address'          => ['required', 'string', 'max:500'],
            'city'             => ['required', 'string', 'max:255'],
            'shipping_method'  => ['required', 'in:standard,express'],
            'payment_method'   => ['required', 'in:card,paypal,cash'],
        ]);

        $total = $this->cart->total();
        if ($validated['shipping_method'] === 'express') {
            $total += 9.99;
        }

        $order = Order::create([
            'user_id'         => Auth::id(),
            'name'            => $validated['name'],
            'email'           => $validated['email'],
            'address'         => $validated['address'],
            'city'            => $validated['city'],
            'shipping_method' => $validated['shipping_method'],
            'payment_method'  => $validated['payment_method'],
            'total'           => $total,
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $item->product->id,
                'product_name' => $item->product->name,
                'unit_price'   => $item->product->price,
                'quantity'     => $item->quantity,
            ]);
        }

        $this->cart->clear();

        return redirect()->route('order.confirmation', $order)->with('success', 'Order placed successfully!');
    }
}
