<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'totalProducts' => Product::count(),
            'lowStockCount' => Product::whereColumn('quantity', '<', 'minimum_stock')->count(),
            'totalSuppliers' => Supplier::count()
        ]);
    }
}
