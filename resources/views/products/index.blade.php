@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Product List</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Min Stock</th>
                        <th>Supplier</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="{{ $product->needsRestock() ? 'table-warning' : '' }}">
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->minimum_stock }}</td>
                            <td>{{ $product->supplier->name }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
