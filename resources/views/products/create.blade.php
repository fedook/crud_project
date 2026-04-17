@extends('layouts.app')

@section('title', 'Add Product')
@section('page_title', 'Inventory Management')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row justify-content-center">
    <div class="col-md-8"> {{-- Slightly wider for product details --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark py-3">
                <h5 class="card-title mb-0 fw-bold text-white">
                    <i class="bi bi-box-seam me-2"></i>Add New Product
                </h5>
            </div>
            
            <div class="card-body bg-body-secondary p-4">
                <form method="POST" action="{{ route('products.store') }}">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label fw-semibold">Product Name</label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Enter product name" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label fw-semibold">Price</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted">₱</span>
                                <input type="number" 
                                       step="0.01" 
                                       name="price" 
                                       id="price" 
                                       class="form-control @error('price') is-invalid @enderror" 
                                       placeholder="0.00" 
                                       required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="category_id" class="form-label fw-semibold">Category</label>
                            <select name="category_id" 
                                    id="category_id" 
                                    class="form-select @error('category_id') is-invalid @enderror" 
                                    required>
                                <option value="" selected disabled>Choose a category...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center border-top pt-3">
                        <a href="{{ route('products.index') }}" class="btn btn-light border">
                            <i class="bi bi-x-lg"></i> Discard
                        </a>
                        <button type="submit" class="btn btn-primary px-5 shadow-sm">
                            <i class="bi bi-cloud-arrow-up me-1"></i> Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection