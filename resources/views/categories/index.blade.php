@extends('layouts.app')
@section('title', 'Categories List')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

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

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-dark btn-sm rounded-pill px-3">
            + New Category
        </a>
    </div>

    <div class="card border shadow-sm overflow-hidden">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="ps-4 py-3 border-0 small text-white" style="width: 50%">Name</th>
                        <th class="py-3 border-0 small text-white" style="width: 30%">Color Theme</th>
                        <th class="text-end pe-4 py-3 border-0 small text-white" style="width: 20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="ps-4 py-3 fw-semibold">{{ $category->cat_name }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="rounded-circle me-2" 
                                          style="background-color: {{ $category->cat_color }}; width: 14px; height: 14px; display: inline-block; border: 1px solid rgba(0,0,0,0.1);">
                                    </span>
                                    <span class="text-muted small">
                                        {{ hexToColorName($category->cat_color) }}
                                    </span>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                            <div class="text-nowrap">
                                <a href="{{ route('categories.edit', $category->id) }}" 
                                   class="btn btn-outline-primary border-0 fw-bold btn-sm px-3 rounded-pill">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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