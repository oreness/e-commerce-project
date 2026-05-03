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

    public function run(): void
    {
        // Admin user
        User::factory()->create([
            'name'     => 'Admin User',
            'email'    => 'admin@electrohub.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);

        // Regular test user
        User::factory()->create([
            'name'     => 'Test User',
            'email'    => 'user@electrohub.com',
            'password' => bcrypt('password'),
            'role'     => 'customer',
        ]);

        // Categories
        $laptops     = Category::create(['name' => 'Laptops',     'slug' => 'laptops']);
        $accessories = Category::create(['name' => 'Accessories', 'slug' => 'accessories']);
        $mice        = Category::create(['name' => 'Mice',        'slug' => 'mice']);
        $keyboards   = Category::create(['name' => 'Keyboards',   'slug' => 'keyboards']);
        $monitors    = Category::create(['name' => 'Monitors',    'slug' => 'monitors']);

        // Products
        $products = [
            [
                'category_id' => $laptops->id,
                'name'        => 'Pro Gaming X',
                'description' => 'Engineered for elite performance. 15.6" FHD 144Hz, Intel Core i7-13700H, NVIDIA RTX 4060 8GB, 16GB DDR5, 512GB NVMe SSD.',
                'price'       => 1299.00,
                'stock'       => 15,
                'color'       => 'Black',
            ],
            [
                'category_id' => $laptops->id,
                'name'        => 'UltraSlim Pro 14',
                'description' => 'Ultra-thin productivity laptop. 14" OLED display, Intel Core i5-1335U, Intel Iris Xe, 16GB LPDDR5, 512GB SSD.',
                'price'       => 899.00,
                'stock'       => 22,
                'color'       => 'Silver',
            ],
            [
                'category_id' => $laptops->id,
                'name'        => 'Creator Studio 16',
                'description' => 'Built for creators. 16" 4K mini-LED, AMD Ryzen 9 7945HX, AMD Radeon RX 7600M, 32GB DDR5, 1TB SSD.',
                'price'       => 1799.00,
                'stock'       => 8,
                'color'       => 'Space Gray',
            ],
            [
                'category_id' => $mice->id,
                'name'        => 'Ultra Wireless Mouse',
                'description' => 'Ergonomic wireless mouse. 4000 DPI optical sensor, 60h battery, USB-C charging, silent click buttons.',
                'price'       => 49.00,
                'stock'       => 80,
                'color'       => 'Black',
            ],
            [
                'category_id' => $mice->id,
                'name'        => 'Pro Gaming Mouse',
                'description' => 'High-precision wired gaming mouse. 25000 DPI, 8 programmable buttons, RGB lighting, braided cable.',
                'price'       => 69.00,
                'stock'       => 55,
                'color'       => 'Black',
            ],
            [
                'category_id' => $keyboards->id,
                'name'        => 'Mechanical TKL Keyboard',
                'description' => 'Tenkeyless mechanical keyboard. Blue switches, per-key RGB backlight, aluminum frame, USB-C detachable.',
                'price'       => 89.00,
                'stock'       => 40,
                'color'       => 'White',
            ],
            [
                'category_id' => $keyboards->id,
                'name'        => 'Wireless Slim Keyboard',
                'description' => 'Slim wireless keyboard. Bluetooth 5.0, multi-device (up to 3), scissor switches, 3-month battery.',
                'price'       => 55.00,
                'stock'       => 60,
                'color'       => 'Silver',
            ],
            [
                'category_id' => $monitors->id,
                'name'        => '27in QHD Gaming Monitor',
                'description' => '27" QHD (2560x1440) IPS, 165Hz, 1ms, G-Sync/FreeSync, HDMI 2.0 + DisplayPort 1.4.',
                'price'       => 349.00,
                'stock'       => 18,
                'color'       => 'Black',
            ],
            [
                'category_id' => $accessories->id,
                'name'        => 'USB-C Hub 7-in-1',
                'description' => 'Compact 7-in-1 USB-C hub. 4K HDMI, 100W PD, 3x USB-A 3.0, SD/microSD, plug-and-play.',
                'price'       => 39.00,
                'stock'       => 100,
                'color'       => 'Space Gray',
            ],
            [
                'category_id' => $accessories->id,
                'name'        => 'Laptop Backpack 15in',
                'description' => 'Water-resistant laptop backpack. Padded 15.6" sleeve, USB-A charging port, anti-theft pocket, 30L.',
                'price'       => 59.00,
                'stock'       => 45,
                'color'       => 'Black',
            ],
        ];

        foreach ($products as $data) {
            $data['slug'] = Str::slug($data['name']);
            Product::create($data);
        }
    }
}
