@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold text-primary">All Products</h2>

    @if($products->isEmpty())
        <div class="alert alert-warning text-center">No products available at the moment.</div>
    @else
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top rounded-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-truncate text-dark fw-semibold">{{ $product->name }}</h5>
                            <p class="card-text text-muted small">{{ Str::limit($product->description, 50) }}</p>
                            <p class="card-text fw-bold text-success fs-5">${{ number_format($product->price, 2) }}</p>
                            <div class="">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm px-3">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
