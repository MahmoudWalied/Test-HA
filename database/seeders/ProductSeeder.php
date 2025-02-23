<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplierIds = Supplier::pluck('id');

        Product::factory()->count(20)->create([
            'supplier_id' => function () use ($supplierIds) {
                return $supplierIds->random();
            },
            'quantity' => function () {
                return rand(0, 100);
            },
            'minimum_stock' => function () {
                return rand(10, 30);
            },
            'price' => function () {
                return rand(100, 1000) / 10;
            }
        ]);
    }
}
