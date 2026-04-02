
@extends('layouts.app')

@section('title', 'Add Product')

@section('content')


<h2>Add Product</h2>

<form method="POST" action="{{ route('products.store') }}">
    @csrf
    
    <input type="text" name="name" placeholder="Product Name"><br><br>
    <input type="number" name="price" placeholder="Price"><br><br>

    <select name="category_id">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">save</button>
</form>
@endsection



