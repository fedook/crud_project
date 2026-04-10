<h2>Edit Product</h2>

<form method="POST" action="{{ route('products.update', $product->id)}}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product->name}}"><br><br>
    <input type="text" name="name" value="{{ $product->price}}"><br><br>

    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category_id}}"
            {{ $product->category_id==$category->id ? 'selected' : }}>
            {{ $category->cat_name}}
            </option>
            @endforeach
    </select><br><br>

    <button type="submit">Update</button>
</form>

