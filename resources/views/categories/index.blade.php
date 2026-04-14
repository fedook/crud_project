@extends('layouts.app')

@section('title', 'Categories List')
@section('page_title', 'Category Management')

@section('content')

{{-- 1. Helper Function at the Top --}}
@php
    if (!function_exists('hexToColorName')) {
        function hexToColorName($hex) {
            $colors = [
                '#ff0000' => 'Red',
                '#00ff00' => 'Green',
                '#0000ff' => 'Blue',
                '#ffff00' => 'Yellow',
                '#ffa500' => 'Orange',
                '#800080' => 'Purple',
                '#000000' => 'Black',
                '#ffffff' => 'White',
            ];

            return $colors[strtolower($hex)] ?? $hex;
        }
    }
@endphp

{{-- Professional Success Alert --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Inventory</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-dark btn-sm rounded-pill px-3">
            + New Category
        </a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 40%">Category Name</th>
                        <th style="width: 30%">Color Theme</th>
                        <th class="text-end pe-4" style="width: 30%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="ps-4 fw-medium">{{ $category->cat_name }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{-- The Color Circle --}}
                                    <span class="badge rounded-pill me-2" 
                                          style="background-color: {{ $category->cat_color }}; width: 14px; height: 14px; display: inline-block; border: 1px solid rgba(0,0,0,0.1);">
                                    </span>
                                    
                                    {{-- 2. Use the Helper Function here --}}
                                    <code class="text-muted small">
                                        {{ hexToColorName($category->cat_color) }}
                                    </code>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('categories.edit', $category->id) }}" 
                                       class="btn btn-sm btn-outline-primary border-0 fw-bold">
                                        <i class="bi bi-pencil me-1"></i>Edit
                                    </a>
                                    
                                    <form action="{{ route('categories.destroy', $category->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Delete this category? This will affect products linked to it.')"
                                          style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger border-0 fw-bold">
                                            <i class="bi bi-trash me-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                <i class="bi bi-folder2-open display-4 d-block mb-3"></i>
                                <p>No categories found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection