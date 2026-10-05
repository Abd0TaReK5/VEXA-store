<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
    [
        'name' => 'Classic Hoodie',
        'description' => 'A comfy classic hoodie perfect for casual wear and cold days.',
        'price' => 350,
        'image_path' => 'products/hoodie1.jpg'
    ],
    [
        'name' => 'Zip-Up Hoodie',
        'description' => 'Stylish zip-up hoodie with adjustable hood and front pockets.',
        'price' => 400,
        'image_path' => 'products/hoodie2.jpg'
    ],
    [
        'name' => 'Pullover Sweatshirt',
        'description' => 'Soft pullover sweatshirt for everyday comfort and warmth.',
        'price' => 300,
        'image_path' => 'products/sweatshirt1.jpg'
    ],
    [
        'name' => 'Graphic Hoodie',
        'description' => 'Trendy hoodie featuring unique graphic prints for a street style look.',
        'price' => 450,
        'image_path' => 'products/hoodie3.jpg'
    ],
    [
        'name' => 'Cropped Sweatshirt',
        'description' => 'Fashionable cropped sweatshirt, perfect for layering with high-waist pants.',
        'price' => 320,
        'image_path' => 'products/sweatshirt2.jpg'
    ],
    [
        'name' => 'Sporty Hoodie',
        'description' => 'Lightweight sporty hoodie designed for active wear and workouts.',
        'price' => 380,
        'image_path' => 'products/hoodie4.jpg'
    ],
    [
        'name' => 'Oversized Hoodie',
        'description' => 'Oversized hoodie for relaxed, cozy style and extra comfort.',
        'price' => 420,
        'image_path' => 'products/hoodie5.jpg'
    ],
    [
        'name' => 'Fleece Sweatshirt',
        'description' => 'Warm fleece sweatshirt, soft inside and perfect for chilly days.',
        'price' => 360,
        'image_path' => 'products/sweatshirt3.jpg'
    ],
    [
        'name' => 'Hoodie with Pockets',
        'description' => 'Functional hoodie with front kangaroo pockets and adjustable hood.',
        'price' => 390,
        'image_path' => 'products/hoodie6.jpg'
    ],
    [
        'name' => 'Crewneck Sweatshirt',
        'description' => 'Classic crewneck sweatshirt, versatile for layering or solo wear.',
        'price' => 310,
        'image_path' => 'products/sweatshirt4.jpg'
    ],
    ];
    DB::table('products')->insert($products);
    }
}
