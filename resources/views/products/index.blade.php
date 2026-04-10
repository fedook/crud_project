@extends('layouts.app')
@section('title', 'Products List')
@section('content')

@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif
    <h2>Products</h2>

    <a href="{{ route('products.create') }}">Add Product</a>

    <table border="1" cellpadding="10">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>

            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>₱{{$product->price}}</td>
                   <td>{{ $product->category->cat_name ?? 'No Category' }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
@endsection