@extends('layouts.app')

@section('title', 'Add Category')
@section('page_title', 'Create New Category') {{-- Matches the header in our new layout --}}

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0 fw-bold text-primary">Category Details</h5>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="cat_name" class="form-label fw-semibold">Category Name</label>
                        <input type="text" 
                               name="cat_name" 
                               id="cat_name" 
                               class="form-control @error('cat_name') is-invalid @enderror" 
                               placeholder="e.g. Electronics" 
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
           value="{{ old('cat_color') }}"
           required> 

    {{-- Clean Bootstrap error message --}}
    @error('cat_color')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
                   

                    <div class="d-flex justify-content-between align-items-center border-top pt-3">
                        <a href="{{ route('categories.index') }}" class="btn btn-light">
                            <i class="bi bi-arrow-left"></i> Back to List
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-check-lg"></i> Save Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection