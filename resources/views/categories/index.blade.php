@extends('layouts.app')
@section('title', 'Categories List')
@section('content')

@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-4">
    <h2>Categories</h2>

    <a href="{{ route('categories.create') }}">Add Category</a>
    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>Category Name</th>
            <th>Color Code</th>
            <th>Actions</th>
        </tr>

        @foreach($categories as $category)
            <tr>
                <td>{{ $category->cat_name }}</td>
                <td>
                    {{ $category->cat_color }}
                    <span style="display:inline-block; width:10px; height:10px; background-color:{{ $category->cat_color }}; border-radius:50%;"></span>
                </td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                    
                    | 

                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red; cursor: pointer; border: none; background: none; text-decoration: underline; padding: 0;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection