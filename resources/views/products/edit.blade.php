@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">Edit Product</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $product->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="price" name="price"
                                            value="{{ old('price', $product->price) }}" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity"
                                        value="{{ old('quantity', $product->quantity) }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="minimum_stock" class="form-label">Minimum Stock</label>
                                    <input type="number" class="form-control" id="minimum_stock" name="minimum_stock"
                                        value="{{ old('minimum_stock', $product->minimum_stock) }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="supplier_id" class="form-label">Supplier</label>
                                <select class="form-select" id="supplier_id" name="supplier_id" required>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
