@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card border-0 shadow-sm">
    <div class="card-header bg-primary text-white py-2">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mb-0">{{ $product->name }}</h2>
        <a href="{{ route('products.index') }}" 
           class="btn btn-light btn-lg bg-light text-primary shadow-sm">Back</a>
    </div>
</div>

        <div class="card-body p-4">
            <div class="row align-items-center">
                <!-- Product Image -->
                <div class="col-md-6 text-center">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                         class="img-fluid rounded shadow-sm" style="max-height: 400px; max-width: 100%;">
                </div>
                <!-- Product Details -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="text-secondary d-block">Product ID:</strong>
                        <span class="text-dark">{{ $product->product_id }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="text-secondary d-block">Price:</strong>
                        <span class="text-success fw-bold">$ {{ number_format($product->price, 2) }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="text-secondary d-block">Description:</strong>
                        <p class="text-muted mb-0">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Similar Products Section -->
    <div class="container mt-5">
        <h2 class="mb-4 text-center fw-bold text-primary">Similar More Products</h2>
        @if($products->isEmpty())
            <div class="alert alert-warning text-center">No products available at the moment.</div>
        @else
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach($products as $similarProduct)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="{{ asset('storage/' . $similarProduct->image) }}" 
                                 class="card-img-top rounded-top" 
                                 alt="{{ $similarProduct->name }}" 
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate text-dark fw-semibold">{{ $similarProduct->name }}</h5>
                                <p class="card-text text-muted small">{{ Str::limit($similarProduct->description, 50) }}</p>
                                <p class="card-text fw-bold text-success fs-5">${{ number_format($similarProduct->price, 2) }}</p>
                                <div class="">
                                    <a href="{{ route('products.show', $similarProduct->id) }}" 
                                       class="btn btn-primary btn-sm px-3">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
