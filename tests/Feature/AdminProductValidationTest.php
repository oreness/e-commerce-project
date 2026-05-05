<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdminProductValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_product_creation_requires_at_least_two_images(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $category = Category::create(['name' => 'Laptops', 'slug' => 'laptops']);

        $response = $this->actingAs($admin)->post(route('admin.product.store'), [
            'name' => 'Validation Laptop',
            'brand' => 'ASUS',
            'description' => 'Test product',
            'price' => 999.99,
            'category_id' => $category->id,
            'images' => [UploadedFile::fake()->create('one.jpg', 20, 'image/jpeg')],
        ]);

        $response->assertSessionHasErrors(['images']);
        $this->assertDatabaseMissing('products', ['name' => 'Validation Laptop']);
    }
}