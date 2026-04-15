<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Pro Gaming X', 'brand' => 'Asus', 'description' => 'Laptop con Intel i7 y RTX 4060', 'price' => 1299.00, 'image_url' => 'https://placehold.co/400x300?text=Asus+Gaming'],
            ['name' => 'Legion 5 Pro', 'brand' => 'Lenovo', 'description' => 'Pantalla 165Hz y Ryzen 7', 'price' => 1150.00, 'image_url' => 'https://placehold.co/400x300?text=Lenovo+Legion'],
            ['name' => 'MSI Titan GT77', 'brand' => 'MSI', 'description' => 'Equipo potente para juegos y creación', 'price' => 2199.00, 'image_url' => 'https://placehold.co/400x300?text=MSI+Titan'],
            ['name' => 'Acer Nitro 16', 'brand' => 'Acer', 'description' => 'Rendimiento sólido para gaming diario', 'price' => 999.00, 'image_url' => 'https://placehold.co/400x300?text=Acer+Nitro'],
            ['name' => 'Dell G15', 'brand' => 'Dell', 'description' => 'Laptop gaming equilibrada con buena refrigeración', 'price' => 1099.00, 'image_url' => 'https://placehold.co/400x300?text=Dell+G15'],
            ['name' => 'HP Victus 15', 'brand' => 'HP', 'description' => 'Precio accesible con GPU dedicada', 'price' => 879.00, 'image_url' => 'https://placehold.co/400x300?text=HP+Victus'],
            ['name' => 'Razer Basilisk V3', 'brand' => 'Razer', 'description' => 'Ratón ergonómico con botones programables', 'price' => 89.00, 'image_url' => 'https://placehold.co/400x300?text=Razer+Mouse'],
            ['name' => 'SteelSeries Apex Pro', 'brand' => 'SteelSeries', 'description' => 'Teclado mecánico con respuesta ajustable', 'price' => 199.00, 'image_url' => 'https://placehold.co/400x300?text=Apex+Pro'],
            ['name' => 'Logitech G Pro X Headset', 'brand' => 'Logitech', 'description' => 'Auriculares para comunicación clara en partidas', 'price' => 129.00, 'image_url' => 'https://placehold.co/400x300?text=G+Pro+X'],
            ['name' => 'LG UltraGear 27', 'brand' => 'LG', 'description' => 'Monitor 144Hz para gaming fluido', 'price' => 349.00, 'image_url' => 'https://placehold.co/400x300?text=LG+UltraGear'],
            ['name' => 'Samsung Odyssey G5', 'brand' => 'Samsung', 'description' => 'Pantalla curva ideal para inmersión', 'price' => 289.00, 'image_url' => 'https://placehold.co/400x300?text=Odyssey+G5'],
            ['name' => 'Corsair HS80', 'brand' => 'Corsair', 'description' => 'Headset con sonido envolvente y micrófono nítido', 'price' => 149.00, 'image_url' => 'https://placehold.co/400x300?text=Corsair+HS80'],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['name' => $product['name']], $product);
        }
    }
}
