<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_filtered_by_category_and_brand(): void
    {
        $laptops = Category::create(['name' => 'Laptops', 'slug' => 'laptops']);
        $accessories = Category::create(['name' => 'Accessories', 'slug' => 'accessories']);

        Product::create([
            'category_id' => $laptops->id,
            'name' => 'Gaming Laptop',
            'brand' => 'ASUS',
            'description' => 'Fast laptop',
            'price' => 1299.00,
            'image_url' => '/images/products/laptop.jpg',
        ]);

        Product::create([
            'category_id' => $accessories->id,
            'name' => 'Gaming Mouse',
            'brand' => 'Logitech',
            'description' => 'Smooth mouse',
            'price' => 79.00,
            'image_url' => '/images/products/mouse.jpg',
        ]);

        $response = $this->get('/products?category=laptops&brand=ASUS');

        $response->assertOk();
        $response->assertSee('Gaming Laptop');
        $response->assertDontSee('Gaming Mouse');
    }

    public function test_products_can_be_searched_by_name_or_description(): void
    {
        $category = Category::create(['name' => 'Accessories', 'slug' => 'accessories']);

        Product::create([
            'category_id' => $category->id,
            'name' => 'Mechanical Keyboard',
            'brand' => 'SteelSeries',
            'description' => 'Clicky switches',
            'price' => 159.00,
            'image_url' => '/images/products/keyboard.jpg',
        ]);

        Product::create([
            'category_id' => $category->id,
            'name' => 'Office Mouse',
            'brand' => 'Dell',
            'description' => 'Comfortable office mouse',
            'price' => 29.00,
            'image_url' => '/images/products/mouse.jpg',
        ]);

        $response = $this->get('/search?search=clicky');

        $response->assertOk();
        $response->assertSee('Mechanical Keyboard');
        $response->assertDontSee('Office Mouse');
    }
}