@extends('layouts.app')

@section('title', 'Inventory Management System')

@section('content')
    <div class="py-5">
        <div class="text-center mb-5">
            <h1 class="display-4">Welcome to Inventory Management System</h1>
            <p class="lead">Efficient stock control and purchase order management</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Products</h5>
                                <h2 class="text-primary">{{ $totalProducts }}</h2>
                                <a href="{{ route('products.index') }}" class="btn btn-outline-primary mt-3">Manage
                                    Products</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title">Low Stock Items</h5>
                                <h2 class="text-danger">{{ $lowStockCount }}</h2>
                                <a href="{{ route('products.low-stock') }}" class="btn btn-outline-danger mt-3">View Low
                                    Stock</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow">
                            <div class="card-body text-center">
                                <h5 class="card-title">Active Suppliers</h5>
                                <h2 class="text-success">{{ $totalSuppliers }}</h2>
                                <a href="{{ route('suppliers.index') }}" class="btn btn-outline-success mt-3">Manage
                                    Suppliers</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
