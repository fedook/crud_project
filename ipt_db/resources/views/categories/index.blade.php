<h2>Categories</h2>  

<a href="{{ route('categories.create') }}">Add category</a>

<ul> 
    @foreach ($categories as $category)
        <li>
            {{$category->cat_name}} - {{$category->cat_color}}
        </li>
    @endforeach
</ul>