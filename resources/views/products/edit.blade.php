@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white py-2">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Edit Product</h2>
        <a href="{{ route('products.index') }}" 
           class="btn btn-light btn-lg bg-light text-primary shadow-sm">Back</a>
    </div>
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
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Product Name</label>
                    <input type="text" name="name" class="form-control form-control-lg rounded-3 border-0 shadow-sm" id="name" value="{{ $product->name }}" placeholder="Enter product name" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="number" name="price" class="form-control form-control-lg rounded-3 border-0 shadow-sm" id="price" value="{{ $product->price }}" placeholder="Enter product price" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control form-control-lg rounded-3 border-0 shadow-sm" id="description" rows="4" placeholder="Enter product description" required>{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Product Image</label>
                    <input type="file" name="image" class="form-control form-control-lg rounded-3 border-0 shadow-sm" id="image">
                    @if($product->image)
                        <small class="d-block mt-3 text-muted">
                            Current Image: <br>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" class="rounded shadow-sm mt-2" width="150">
                        </small>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg  px-5 shadow-sm">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
