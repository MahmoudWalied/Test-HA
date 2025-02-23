@extends('layouts.app')

@section('title', 'Inventory Reports')

@section('content')
    <div class="container">
        <h2 class="mb-4">Inventory Reports</h2>
        <div class="row">
            {{-- <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">Low Stock Alerts</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Current Stock</th>
                                        <th>Minimum Required</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products->where('quantity', '<', 'minimum_stock') as $product)
                                        <tr class="table-warning">
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->minimum_stock }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Stock Levels</div>
                    <div class="card-body">
                        <canvas id="stockChart" height="150"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Supplier Orders</div>
                    <div class="card-body">
                        <canvas id="supplierChart" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Stock Levels Chart
                new Chart(document.getElementById('stockChart'), {
                    type: 'bar',
                    data: {
                        labels: @json($products->pluck('name')),
                        datasets: [{
                            label: 'Current Stock',
                            data: @json($products->pluck('quantity')),
                            backgroundColor: 'rgba(54, 162, 235, 0.2)'
                        }, {
                            label: 'Minimum Stock',
                            data: @json($products->pluck('minimum_stock')),
                            backgroundColor: 'rgba(255, 99, 132, 0.2)'
                        }]
                    }
                });

                // Supplier Orders Chart
                new Chart(document.getElementById('supplierChart'), {
                    type: 'pie',
                    data: {
                        labels: @json($suppliers->pluck('name')),
                        datasets: [{
                            data: @json($suppliers->pluck('purchase_orders_count')),
                            backgroundColor: [
                                '#FF6384', '#36A2EB', '#FFCE56',
                                '#4BC0C0', '#9966FF', '#FF9F40'
                            ]
                        }]
                    }
                });
            </script>
        @endpush
    @endsection
