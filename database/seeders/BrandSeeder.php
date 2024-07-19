<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Brand::create([
            'name' => 'Samsung',
            'slug' => 'samsung',
            'url' => 'https://www.samsung.com',
            'primary_hex' => '#674cc4',
            'is_visible' => true,
            'description' => 'Samsung is a South Korean multinational conglomerate headquartered in Seoul, South Korea. The company was founded in 1934.',
        ]);
    }
}
