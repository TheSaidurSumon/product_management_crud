@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card border-0">
        <div class="card-header bg-primary  text-white text-center">
            <h3 class="mb-0 py-2">List of All Products</h3>
        </div>
        <div class="card-body">
            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Search and Sort Form -->
            <form method="GET" action="{{ route('products.index') }}" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control form-control-lg" 
                            placeholder="Search products..." 
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="sort_by" class="form-select form-select-lg">
                            <option value="">Sort By</option>
                            <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                            <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Price</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="sort_direction" class="form-select form-select-lg">
                            <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                            <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Filter</button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('products.create') }}" class="btn btn-dark btn-lg w-100">Add Product</a>
                    </div>
                </div>
            </form>

           <!-- Product Table -->
<div class="table-responsive shadow-sm rounded">
    <table class="table table-bordered align-middle text-center">
        <thead class="bg-primary text-white">
            <tr>
                <th>#</th>
                <th>Product ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr class="align-middle">
                    <td class="fw-bold">{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                    <td class="text-muted">{{ $product->product_id }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="Image" 
                             class="shadow-sm" 
                             width="60" 
                             height="60">
                    </td>
                    <td class="text-dark fw-semibold">{{ $product->name }}</td>
                    <td class="text-success fw-bold">${{ number_format($product->price, 2) }}</td>
                    <td class="text-muted small">{{ Str::limit($product->description, 50) }}</td>
                    <td class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('products.show', $product->id) }}" 
       class="btn btn-sm btn-info text-white shadow-sm">
        <i class="bi bi-eye"></i> View
    </a>
    <a href="{{ route('products.edit', $product->id) }}" 
       class="btn btn-sm btn-warning text-white shadow-sm">
        <i class="bi bi-pencil-square"></i> Edit
    </a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" 
          onsubmit="return confirm('Are you sure?')" 
          class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger shadow-sm">
            <i class="bi bi-trash"></i> Delete
        </button>
    </form>
</td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-muted text-center">No products available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


            <!-- Pagination -->
            <div class="d-flex justify-content-end mt-3">
                {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
