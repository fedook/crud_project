@extends('layouts.app')
@section('title', 'Edit Category')

@section('content')

<h2>Edit Category</h2>

<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')
    
    <label>Category Name:</label><br>
    <input type="text" name="cat_name" value="{{ $category->cat_name }}" required><br><br>

    <label>Category Color:</label><br>
    <input type="text" name="cat_color" value="{{ $category->cat_color }}" required><br><br>

    <button type="submit">Update</button>
</form>

@endsection