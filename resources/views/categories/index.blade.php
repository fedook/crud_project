@extends('layouts.app')
@section('title', 'Categories List')
@section('content')



<div class="container mt-4">
    <h2>Categories</h2>

<a href="{{ route('categories.create') }}">Add Category</a>

<ul>
    @foreach($categories as $category)
        <li>
            {{ $category->cat_name }} - {{ $category->cat_color }}
        </li>
    @endforeach
</ul>
</div>
@endsection