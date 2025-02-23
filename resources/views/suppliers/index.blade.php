@extends('layouts.app')

@section('title', 'Suppliers')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2>Supplier List</h2>
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Create New Supplier</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Products</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ Str::limit($supplier->address, 30) }}</td>
                            <td>{{ $supplier->products_count }}</td>
                            <td>
                                <a href="{{ route('suppliers.edit', $supplier->id) }}"
                                    class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST"
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
