<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@eshop.com',
            'is_admin' => true,
        ]);

        // Regular customer
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'user@eshop.com',
        ]);

        // Sample categories
        $categories = [
            ['name' => 'Laptops',     'description' => 'Portable computers for work and play'],
            ['name' => 'Smartphones', 'description' => 'Latest mobile phones'],
            ['name' => 'Headphones',  'description' => 'Over-ear, in-ear and wireless headphones'],
        ];

        foreach ($categories as $cat) {
            $category = Category::create([
                'name'        => $cat['name'],
                'slug'        => Str::slug($cat['name']),
                'description' => $cat['description'],
            ]);

            // 5 sample products per category
            for ($i = 1; $i <= 5; $i++) {
                Product::create([
                    'category_id' => $category->id,
                    'name'        => "{$cat['name']} Model {$i}",
                    'slug'        => Str::slug("{$cat['name']} Model {$i}"),
                    'description' => "Sample description for {$cat['name']} Model {$i}.",
                    'price'       => rand(99, 999) + 0.99,
                    'stock'       => rand(10, 100),
                    'brand'       => ['BrandA', 'BrandB', 'BrandC'][rand(0, 2)],
                    'color'       => ['Black', 'White', 'Silver', 'Blue'][rand(0, 3)],
                ]);
            }
        }
    }
}

