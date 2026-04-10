<h2>Add Category</h2>
<form  method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div>
        <label for="cat_name">Category Name:</label>
        <input type="text" id="cat_name" name="cat_name" required>
    </div>
    <div>
        <label for="cat_color">Category Color:</label>
        <input type="text" id="cat_color" name="cat_color" required>
    </div>
    <button type="submit">Save</button>