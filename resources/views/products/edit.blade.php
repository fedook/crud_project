@extends('layouts.app')

@section('title', 'Edit Product')
@section('page_title', 'Modify Inventory')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark py-3 border-bottom">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0 fw-bold text-white">
                        <i class="bi bi-pencil-square me-2"></i>Edit Product: {{ $product->name }}
                    </h5> 
                    <span class="badge bg-light text-dark border shadow-sm">ID: #{{ $product->id }}</span>
                </div>
            </div>
            
            <div class="card-body p-4">
                <form method="POST" action="{{ route('products.update', $product->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label fw-semibold">Product Name</label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $product->name) }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label fw-semibold">Price</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">₱</span>
                                <input type="number" 
                                       step="0.01" 
                                       name="price" 
                                       id="price" 
                                       class="form-control @error('price') is-invalid @enderror" 
                                       value="{{ old('price', $product->price) }}" 
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
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
                                        {{ $category->cat_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-2">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Back to List
                        </a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold shadow-sm">
                            <i class="bi bi-save2 me-1"></i> Update Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection