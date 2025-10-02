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
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.categoryForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::where('name', $validated['name'])->first();
        if ($category) {
            return redirect()->route('category.create')->with('error', 'Category already exists!');
        }

        Category::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('category')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.categoryForm', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $existingCategory = Category::where('name', $validated['name'])->first();
        if ($existingCategory && $existingCategory->id != $category->id) {
            return redirect()->route('category.show', $id)->with('error', 'Category name already exists!');
        }

        $category->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('category')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $relatedPosts = Category::find($id)->posts;
        if($relatedPosts->count() > 0){
            return redirect()->route('category')->with('error', 'Category cannot be deleted because it has related posts!');
        }
        $category->delete();
        return redirect()->route('category')->with('success', 'Category deleted successfully!');
    }
}
