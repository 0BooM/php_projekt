<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    // This method is used to show the form for editing a category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Category deleted!');
    }
    // This method is used to show the form for creating a new category
    public function create()
    {
        return view('admin.create-category');
    }
    // This method is used to store a new category in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);
        \App\Models\Category::create(['name' => $request->name]);
        return redirect()->route('admin.dashboard')->with('success', 'Category added!');
    }
}
