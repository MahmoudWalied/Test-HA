<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\Supplier;

class ReportController extends Controller
{
    public function index()
    {
        $products = Product::with('supplier')->get();
        $suppliers = Supplier::withCount('purchaseOrders')->get();
        $orders = PurchaseOrder::with(['product', 'supplier'])->get();

        return view('reports.index', compact('products', 'suppliers', 'orders'));
    }
}
