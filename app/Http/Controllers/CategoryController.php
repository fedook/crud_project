<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
    $request->validate([
    'cat_name'  => 'required|string|max:255',
    'cat_color' => [
        'required',
        

        'regex:/^(#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})|Red|Blue|Green|Yellow|Orange|Purple|Black|White|brown|cyan)$/i'
    ],
], [
    'cat_color.regex' => 'Please enter a valid color name (Red, Blue, etc.) or a Hex code (#ff0000).',
]);
        Category::create($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Category added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
{
    $request->validate([
    'cat_name'  => 'required|string|max:255',
    'cat_color' => [
        'required',
        

        'regex:/^(#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})|Red|Blue|Green|Yellow|Orange|Purple|Black|White|brown|cyan)$/i'
    ],
], [
    'cat_color.regex' => 'Please enter a valid color name (Red, Blue, etc.) or a Hex code (#ff0000).',
]);
       $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Category Updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}
