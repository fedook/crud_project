@extends('layouts.app')
@section('title', 'Products List')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Products</h2>
        <a href="{{ route('products.create') }}" class="btn btn-dark btn-sm rounded-pill px-3">
            + New Product
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th class="border-0 text-secondary small text-uppercase">Name</th>
                    <th class="border-0 text-secondary small text-uppercase">Price</th>
                    <th class="border-0 text-secondary small text-uppercase">Category</th>
                    <th class="border-0 text-secondary small text-uppercase text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Changed @foreach to @forelse --}}
                @forelse($products as $product)
                <tr class="border-bottom">
                    <td class="fw-semibold py-3">{{ $product->name }}</td>
                    <td class="text-muted">₱{{ number_format($product->price, 2) }}</td>
                    <td>
                        <span class="badge rounded-pill px-3" 
                              style="background-color: {{ $product->category->cat_color ?? '#eeeeee' }}; 
                                     color: #fff; font-weight: 500;">
                            {{ $product->category->cat_name ?? 'Uncategorized' }}
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    {{-- Fixed colspan to 4 to match the headers --}}
                    <td colspan="4" class="text-center py-5 text-muted">
                        <i class="bi bi-folder2-open display-4 d-block mb-3"></i>
                        <p>No products found.</p>
                    </td>
                </tr>
                @endforelse {{-- Changed to @endforelse --}}
            </tbody>
        </table>
    </div>
</div>
@endsection