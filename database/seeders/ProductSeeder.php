<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'article' => 'mtokb2',
                'name' => 'MTOK-B2/216-1KT3645-K',
                'status' => 'available',
                'data' => ['size' => 'L', 'color' => 'черный'],
            ],
            [
                'article' => 'mtokb3',
                'name' => 'MTOK-B3/216-1KT3645-K',
                'status' => 'unavailable',
                'data' => ['size' => 'XL', 'color' => 'серый'],
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
