@extends('layouts.app')

@section('title', 'Low Stock Products')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Low Stock Products</h2>
            <div>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">All Products</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Product Name</th>
                        <th>Current Stock</th>
                        <th>Minimum Required</th>
                        <th>Order Quantity Needed</th>
                        <th>Supplier</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td class="text-danger">{{ $product->quantity }}</td>
                            <td>{{ $product->minimum_stock }}</td>
                            <td class="text-primary">{{ max($product->minimum_stock * 2 - $product->quantity, 0) }}</td>
                            <td>{{ $product->supplier->name }}</td>
                            <td>
                                <form action="{{ route('order.request') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="supplier_id" value="{{ $product->supplier->id }}">
                                    <input type="hidden" name="quantity"
                                        value="{{ max($product->minimum_stock * 2 - $product->quantity, 0) }}">
                                    <button type="submit" class="btn btn-link text-decoration-none p-0">
                                        {{ $product->supplier->email }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No low stock products found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
