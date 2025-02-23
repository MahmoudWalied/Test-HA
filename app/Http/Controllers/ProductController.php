<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Mail\OrderRequestMail;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('supplier')->latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('products.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id'
        ]);

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'supplier_id' => 'required|exists:suppliers,id'
        ]);

        $product->update($validated);

        if ($product->quantity <= $product->minimum_stock) {
            $purchaseOrder = PurchaseOrder::create([
                'product_id' => $product->id,
                'supplier_id' => $request->supplier_id,
                'quantity' => $product->minimum_stock * 2,
                'status' => 'pending'
            ]);
            $supplier = Supplier::find($request->supplier_id);

            Mail::to($supplier->email)->send(new OrderRequestMail($product, $supplier, $purchaseOrder->quantity));
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function lowStock()
    {
        $products = Product::whereColumn('quantity', '<', 'minimum_stock')
            ->with('supplier')
            ->get();

        return view('products.low-stock', compact('products'));
    }

    public function sendOrderRequest(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::find($request->product_id);
        $supplier = Supplier::find($request->supplier_id);
        $quantity = $request->quantity;

        Mail::to($supplier->email)->send(new OrderRequestMail($product, $supplier, $quantity));

        return back()->with('success', 'Order request sent to '.$supplier->email);
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
