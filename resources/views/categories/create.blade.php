@extends('layouts.app')
@section('title', 'Add Category')
@section('content')

<h2>Add Category</h2>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    
    <input type="text" name="cat_name" placeholder="Category Name"><br><br>
    <input type="color" name="cat_color" placeholder="Category Color"><br><br>

    <button type="submit">save</button>
</form>
@endsection