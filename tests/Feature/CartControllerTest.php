<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_cart_items_can_be_updated_and_removed(): void
    {
        $category = Category::create(['name' => 'Accessories', 'slug' => 'accessories']);
        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Wireless Mouse',
            'brand' => 'Logitech',
            'description' => 'Wireless mouse',
            'price' => 49.99,
            'image_url' => '/images/products/mouse.jpg',
        ]);

        $this->from('/products')->post(route('cart.add', $product->id), ['quantity' => 2]);

        $this->from('/cart')->patch(route('cart.update', $product->id), ['quantity' => 5]);
        $cart = session('cart');

        $this->assertIsArray($cart);
        $this->assertSame(5, (int) $cart[$product->id]['quantity']);

        $this->from('/cart')->delete(route('cart.remove', $product->id));
        $this->assertSame([], session('cart'));
    }
}