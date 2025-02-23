<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\PurchaseOrder;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create orders for low-stock products
        $lowStockProducts = Product::whereColumn('quantity', '<=', 'minimum_stock')->get();

        foreach ($lowStockProducts as $product) {
            PurchaseOrder::factory()->create([
                'product_id' => $product->id,
                'supplier_id' => $product->supplier_id,
                'quantity' => max(
                    ($product->minimum_stock * 2) - $product->quantity,
                    $product->minimum_stock
                ),
                'status' => 'pending'
            ]);
        }

        // Create some completed orders using existing products
        $products = Product::inRandomOrder()->limit(5)->get();
        foreach ($products as $product) {
            PurchaseOrder::factory()->create([
                'product_id' => $product->id,
                'supplier_id' => $product->supplier_id,
                'status' => 'received'
            ]);
        }
    }
}
