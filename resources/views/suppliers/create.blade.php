@extends('layouts.app')

@section('title', 'Create Supplier')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">Create New Supplier</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('suppliers.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Supplier Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Create Supplier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
