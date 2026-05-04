<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@electrohub.local'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('Admin12345!'),
                'is_admin' => true,
            ]
        );

        $categories = [
            'laptops' => Category::query()->updateOrCreate(['slug' => 'laptops'], ['name' => 'Laptops']),
            'accessories' => Category::query()->updateOrCreate(['slug' => 'accessories'], ['name' => 'Accessories']),
            'monitors' => Category::query()->updateOrCreate(['slug' => 'monitors'], ['name' => 'Monitors']),
        ];

        $products = [
            ['category_slug' => 'laptops', 'image_key' => 'pro-gaming-x', 'name' => 'Pro Gaming X', 'brand' => 'ASUS', 'description' => 'High-performance gaming laptop with Intel Core i7 and RTX 4060 graphics.', 'price' => 1299.00],
            ['category_slug' => 'laptops', 'image_key' => 'legion-5-pro', 'name' => 'Legion 5 Pro', 'brand' => 'Lenovo', 'description' => 'Smooth 165Hz display and Ryzen 7 processor for gaming and work.', 'price' => 1150.00],
            ['category_slug' => 'laptops', 'image_key' => 'msi-titan-gt77', 'name' => 'MSI Titan GT77', 'brand' => 'MSI', 'description' => 'Premium powerhouse laptop built for creators and competitive gaming.', 'price' => 2199.00],
            ['category_slug' => 'laptops', 'image_key' => 'acer-nitro-16', 'name' => 'Acer Nitro 16', 'brand' => 'Acer', 'description' => 'Balanced performance laptop for daily gaming sessions.', 'price' => 999.00],
            ['category_slug' => 'laptops', 'image_key' => 'dell-g15', 'name' => 'Dell G15', 'brand' => 'Dell', 'description' => 'Reliable gaming laptop with strong cooling and modern hardware.', 'price' => 1099.00],
            ['category_slug' => 'laptops', 'image_key' => 'hp-victus-15', 'name' => 'HP Victus 15', 'brand' => 'HP', 'description' => 'Affordable gaming laptop with dedicated GPU and modern design.', 'price' => 879.00],
            ['category_slug' => 'accessories', 'image_key' => 'razer-basilisk-v3', 'name' => 'Razer Basilisk V3', 'brand' => 'Razer', 'description' => 'Ergonomic gaming mouse with customizable controls and RGB lighting.', 'price' => 89.00],
            ['category_slug' => 'accessories', 'image_key' => 'steelseries-apex-pro', 'name' => 'SteelSeries Apex Pro', 'brand' => 'SteelSeries', 'description' => 'Mechanical keyboard with adjustable actuation for precision typing.', 'price' => 199.00],
            ['category_slug' => 'accessories', 'image_key' => 'logitech-g-pro-x-headset', 'name' => 'Logitech G Pro X Headset', 'brand' => 'Logitech', 'description' => 'Comfortable headset with clear voice pickup for team communication.', 'price' => 129.00],
            ['category_slug' => 'monitors', 'image_key' => 'lg-ultragear-27', 'name' => 'LG UltraGear 27', 'brand' => 'LG', 'description' => '27-inch 144Hz gaming monitor for smooth and responsive gameplay.', 'price' => 349.00],
            ['category_slug' => 'monitors', 'image_key' => 'samsung-odyssey-g5', 'name' => 'Samsung Odyssey G5', 'brand' => 'Samsung', 'description' => 'Immersive curved monitor designed for modern gaming setups.', 'price' => 289.00],
            ['category_slug' => 'accessories', 'image_key' => 'corsair-hs80', 'name' => 'Corsair HS80', 'brand' => 'Corsair', 'description' => 'Surround-sound gaming headset with a crisp and flexible microphone.', 'price' => 149.00],
        ];

        foreach ($products as $product) {
            $payload = [
                'category_id' => $categories[$product['category_slug']]->id,
                'brand' => $product['brand'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image_url' => $this->resolveProductImage($product['image_key']),
            ];

            $savedProduct = Product::updateOrCreate(['name' => $product['name']], $payload);

            if ($savedProduct->image_url && !$savedProduct->images()->exists()) {
                ProductImage::create([
                    'product_id' => $savedProduct->id,
                    'path' => $savedProduct->image_url,
                    'sort_order' => 0,
                ]);
            }
        }
    }

    private function resolveProductImage(string $imageKey): string
    {
        $extensions = ['jpg', 'jpeg', 'png', 'webp', 'avif', 'svg'];
        $basePath = public_path('images/products');

        foreach ($extensions as $extension) {
            $fullPath = $basePath.'/'.$imageKey.'.'.$extension;

            if (file_exists($fullPath)) {
                return '/images/products/'.$imageKey.'.'.$extension;
            }
        }

        return '/images/products/default-product.svg';
    }
}
