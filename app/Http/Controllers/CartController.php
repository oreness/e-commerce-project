<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Resolve the current cart for a guest (by session token) or logged-in user.
     * When a user logs in, their guest cart should be merged into their user cart.
     */
    private function resolveCart(): Cart
    {
        // TODO: implement cart resolution
        // if (auth()->check()) {
        //     return Cart::firstOrCreate(['user_id' => auth()->id()]);
        // }
        // $token = session()->get('cart_token') ?? tap(str()->uuid(), fn($t) => session()->put('cart_token', $t));
        // return Cart::firstOrCreate(['session_token' => $token]);
    }

    /**
     * Display the shopping cart.
     */
    public function index()
    {
        // $cart = $this->resolveCart()->load('items.product.primaryImage');
        // return view('cart.index', compact('cart'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request, Product $product)
    {
        // $validated = $request->validate(['quantity' => 'required|integer|min:1']);
        // $cart = $this->resolveCart();
        // $item = $cart->items()->firstOrNew(['product_id' => $product->id]);
        // $item->quantity = ($item->quantity ?? 0) + $validated['quantity'];
        // $item->save();
        // return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    /**
     * Update quantity of a cart item.
     */
    public function update(Request $request, CartItem $item)
    {
        // $validated = $request->validate(['quantity' => 'required|integer|min:1']);
        // $item->update(['quantity' => $validated['quantity']]);
        // return redirect()->route('cart.index');
    }

    /**
     * Remove a product from the cart.
     */
    public function remove(CartItem $item)
    {
        // $item->delete();
        // return redirect()->route('cart.index');
    }

    /**
     * Show the checkout form (transport, payment, delivery address).
     */
    public function checkout()
    {
        // $cart = $this->resolveCart()->load('items.product');
        // return view('cart.checkout', compact('cart'));
    }

    /**
     * Process the order (store order, clear cart, redirect to confirmation).
     */
    public function placeOrder(Request $request)
    {
        // TODO: validate delivery data, create Order + OrderItems, clear cart
        // See App\Models\Order for required fields
    }
}
