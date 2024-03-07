<?php

namespace Database\Seeders;

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
    $products = [
      [
        'name' => 'Kopi',
        'category' => 'Konsumsi',
        'stock' => 100,
      ],
      [
        'name' => 'Teh',
        'category' => 'Konsumsi',
        'stock' => 100
      ],
      [
        'name' => 'Pasta Gigi',
        'category' => 'Pembersih',
        'stock' => 100
      ],
      [
        'name' => 'Sabun Mandi',
        'category' => 'Pembersih',
        'stock' => 100
      ],
      [
        'name' => 'Sampo',
        'category' => 'Pembersih',
        'stock' => 100
      ],
    ];

    foreach ($products as $item) {
      $product = Product::create([
        'name' => $item['name'],
        'category' => $item['category'],
      ]);

      $product->stock()->create([
        'stock' => $item['stock']
      ]);
    }
  }
}
