<?php

namespace Database\Seeders;

use App\Enums\ProductType;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            'brand_id' => 1,
            'name' => 'S23 Ultra',
            'slug' => 's23-ultra',
            'sku' => 'S23-ULTRA',
            'description' => 'Samsung Galaxy S23 Ultra Mobile.',
            'image' => 'test.jpg',
            'quantity' => 50,
            'price' => 300000,
            'is_visible' => 1,
            'is_featured' => 1,
            'type' => ProductType::DELIVERABLE->value,
            'published_at' => now(),
        ]);
    }
}
