@extends('layouts.app')

@section('title', 'Purchase Orders')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Purchase Orders</h2>
            <a href="{{ route('products.low-stock') }}" class="btn btn-outline-primary">
                View Low Stock Products
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Product</th>
                        <th>Supplier</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $purchase_order)
                        <tr>
                            <td>{{ $purchase_order->product->name }}</td>
                            <td>{{ $purchase_order->supplier->name }}</td>
                            <td>{{ $purchase_order->quantity }}</td>
                            <td>
                                <span
                                    class="badge
                            @if ($purchase_order->status === 'pending') bg-warning
                            @elseif($purchase_order->status === 'ordered') bg-info
                            @else bg-success @endif">
                                    {{ ucfirst($purchase_order->status) }}
                                </span>
                            </td>
                            <td>{{ $purchase_order->created_at->format('M d, Y H:i') }}</td>
                            <td>
                                <form action="{{ route('purchase-orders.update', $purchase_order->id) }}" method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="pending" {{ $purchase_order->status === 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="ordered" {{ $purchase_order->status === 'ordered' ? 'selected' : '' }}>Ordered
                                        </option>
                                        <option value="received" {{ $purchase_order->status === 'received' ? 'selected' : '' }}>
                                            Received</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
@endsection
