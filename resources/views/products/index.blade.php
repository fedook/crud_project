@extends('layouts.app')
@section('title', 'Products List')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Products</h2>
        <a href="{{ route('products.create') }}" class="btn btn-dark btn-sm rounded-pill px-3">
            + New Product
        </a>
    </div>

    <div class="card border shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3">Price</th>
                        <th class="py-3">Category</th>
                        <th class="py-3 px-4 text-center" style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="fw-semibold py-3 px-2">{{ $product->name }}</td>
                        <td class="text-dark">₱{{ number_format($product->price, 2) }}</td>
                        <td>
                            <span class="badge rounded-pill px-3 py-2" 
                                  style="background-color: {{ $product->category->cat_color ?? '#eeeeee' }}; 
                                         color: #ffffff; 
                                         font-weight: 500;">
                                {{ $product->category->cat_name ?? 'Uncategorized' }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="text-nowrap">
                                <a href="{{ route('products.edit', $product->id) }}" 
                                   class="btn btn-outline-primary border-0 fw-bold btn-sm px-3 rounded-pill">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-outline-danger border-0 fw-bold btn-sm px-3 rounded-pill" 
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="bi bi-folder2-open display-4 d-block mb-3"></i>
                            <p>No products found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection