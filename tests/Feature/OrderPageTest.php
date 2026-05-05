<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_orders_page_shows_authenticated_user_orders(): void
    {
        $user = User::factory()->create();
        $category = Category::create(['name' => 'Accessories', 'slug' => 'accessories']);
        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Gaming Headset',
            'brand' => 'Razer',
            'description' => 'Headset description',
            'price' => 79.00,
            'image_url' => '/images/products/headset.jpg',
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'order_number' => 'ORD-TEST-12345',
            'status' => 'confirmed',
            'shipping_name' => 'Test User',
            'shipping_address' => 'Test street 1',
            'shipping_city' => 'Bratislava',
            'shipping_method' => 'Standard',
            'payment_method' => 'Card',
            'total_price' => 79.00,
        ]);

        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => 1,
            'unit_price' => 79.00,
        ]);

        $response = $this->actingAs($user)->get(route('orders.index'));

        $response->assertOk();
        $response->assertSee('ORD-TEST-12345');
        $response->assertSee('Gaming Headset');
        $response->assertSee('€79.00');
    }
}