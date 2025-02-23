<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $orders = PurchaseOrder::with(['product', 'supplier'])->latest()->paginate(10);
        return view('purchase-orders.index', compact('orders'));
    }

    public function update(Request $request, PurchaseOrder $purchase_order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,ordered,received'
        ]);

        $purchase_order->update($validated);

        if ($validated['status'] === 'received') {
            // Ensure quantity is numeric before incrementing
            $quantity = (int)$purchase_order->quantity;
            $purchase_order->product()->increment('quantity', $quantity);
        }
        $purchase_order->save();
        return back()->with('success', 'Order status updated');
    }

}
