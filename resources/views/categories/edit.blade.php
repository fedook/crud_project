@extends('layouts.app')

@section('title', 'Edit Category')
@section('page_title', 'Modify Category')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="card-title mb-0 fw-bold text-warning">
                    <i class="bi bi-pencil-square me-2"></i>Edit: {{ $category->cat_name }}
                </h5>
            </div>
            
            <div class="card-body p-4">
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="cat_name" class="form-label fw-semibold">Category Name</label>
                        <input type="text" 
                               name="cat_name" 
                               id="cat_name" 
                               class="form-control @error('cat_name') is-invalid @enderror" 
                               value="{{ old('cat_name', $category->cat_name) }}" 
                               required>
                        @error('cat_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                            <label for="cat_color" class="form-label fw-semibold">Category Color</label>
                            <input type="text" 
                                name="cat_color" 
                                id="cat_color" 
                                class="form-control @error('cat_color') is-invalid @enderror" 
                                placeholder="e.g. #ff0000 or Blue" 
                                value="{{ old('cat_color', $category->cat_color) }}"
                                required> 

                            {{-- This displays the error message if validation fails --}}
                            @error('cat_color')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold">
                            <i class="bi bi-arrow-repeat me-1"></i> Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection