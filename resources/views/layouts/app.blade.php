<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Inventory Management</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding-top: 60px;
        }

        .navbar {
            border-bottom: 3px solid #f8f9fa;
        }

        .table thead th {
            background-color: #f8f9fa;
        }
    </style>

    @stack('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Inventory System</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item {{ request()->is('products*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item {{ request()->is('suppliers*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('suppliers.index') }}">Suppliers</a>
                    </li>
                    <li class="nav-item {{ request()->is('low-stock') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.low-stock') }}">Low Stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('purchase-orders.index') }}">Purchase Orders</a>
                    </li>
                    <li class="nav-item {{ request()->is('reports') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('reports.index') }}">Reports</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('scripts')
</body>

</html>
