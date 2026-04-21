<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $this->hydrateSessionCartFromDbIfNeeded();

        $cart = session()->get('cart', []);
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('cart', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        $quantity = max(1, (int) $request->input('quantity', 1));

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image_url
            ];
        }

        session()->put('cart', $cart);
        $this->persistCartIfAuthenticated($cart);
        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return redirect()->back();
        }

        $cart[$id]['quantity'] = max(1, (int) $request->input('quantity', 1));

        session()->put('cart', $cart);
        $this->persistCartIfAuthenticated($cart);

        return redirect()->back()->with('success', 'Quantity updated.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            $this->persistCartIfAuthenticated($cart);
        }
        return redirect()->back()->with('success', 'Product removed from cart.');
    }

    private function hydrateSessionCartFromDbIfNeeded(): void
    {
        if (!Auth::check()) {
            return;
        }

        if (!empty(session('cart', []))) {
            return;
        }

        $dbCart = Cart::query()->where('user_id', Auth::id())->value('items') ?? [];

        session(['cart' => $dbCart]);
    }

    private function persistCartIfAuthenticated(array $cart): void
    {
        if (!Auth::check()) {
            return;
        }

        Cart::updateOrCreate(
            ['user_id' => Auth::id()],
            ['items' => $cart]
        );
    }
}
