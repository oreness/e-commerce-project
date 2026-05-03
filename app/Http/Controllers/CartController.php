<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function index()
    {
        $items = $this->cart->items();
        $total = $this->cart->total();

        return view('cart', compact('items', 'total'));
    }

    public function add(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity'   => ['sometimes', 'integer', 'min:1', 'max:99'],
        ]);

        $this->cart->add(
            $request->integer('product_id'),
            $request->integer('quantity', 1)
        );

        return back()->with('success', 'Item added to cart.');
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
            'quantity'   => ['required', 'integer', 'min:0', 'max:99'],
        ]);

        $this->cart->update(
            $request->integer('product_id'),
            $request->integer('quantity')
        );

        return back()->with('success', 'Cart updated.');
    }

    public function remove(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
        ]);

        $this->cart->remove($request->integer('product_id'));

        return back()->with('success', 'Item removed from cart.');
    }
}
