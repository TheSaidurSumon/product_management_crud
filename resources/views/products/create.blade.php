@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white text-center py-3">
            <h2 class="mb-0">Add New Product</h2>
        </div>
        <div class="card-body p-4">
            <!-- Display Errors -->
            @if($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Product Name</label>
                    <input type="text" name="name" class="form-control form-control-lg rounded-3 border-0 shadow-sm" id="name" placeholder="Enter product name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="number" name="price" class="form-control form-control-lg rounded-3 border-0 shadow-sm" id="price" placeholder="Enter product price" value="{{ old('price') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control form-control-lg rounded-3 border-0 shadow-sm" id="description" rows="4" placeholder="Enter product description" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Product Image</label>
                    <input type="file" name="image" class="form-control form-control-lg rounded-3 border-0 shadow-sm" id="image">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg px-5 shadow-sm">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
