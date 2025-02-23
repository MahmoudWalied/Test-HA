@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">Product Details</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h3>{{ $product->name }}</h3>
                        <p class="lead">{{ $product->description }}</p>
                        <dl class="row">
                            <dt class="col-sm-4">Price:</dt>
                            <dd class="col-sm-8">${{ number_format($product->price, 2) }}</dd>

                            <dt class="col-sm-4">Current Stock:</dt>
                            <dd class="col-sm-8">{{ $product->quantity }}</dd>

                            <dt class="col-sm-4">Minimum Stock:</dt>
                            <dd class="col-sm-8">{{ $product->minimum_stock }}</dd>

                            <dt class="col-sm-4">Supplier:</dt>
                            <dd class="col-sm-8">{{ $product->supplier->name }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-4 border-start">
                        <div class="d-grid gap-2">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-outline-secondary">Edit
                                Product</a>
                            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
