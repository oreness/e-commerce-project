<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckoutAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_open_checkout(): void
    {
        $category = Category::create(['name' => 'Accessories', 'slug' => 'accessories']);
        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Test Mouse',
            'brand' => 'Logitech',
            'description' => 'Mouse',
            'price' => 49.99,
            'image_url' => '/images/products/mouse.jpg',
        ]);

        $this->withSession([
            'cart' => [
                $product->id => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image' => $product->image_url,
                ],
            ],
        ]);

        $response = $this->get(route('checkout.index'));

        $response->assertRedirect(route('login'));
    }
}