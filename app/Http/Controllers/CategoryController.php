<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index()
    {
        $categories = Category::all();
        return view("categories.index", compact("categories"));
    }

    /**
     * Display a single to-do item.
     *
     * Implicit route model binding will inject the correct instance.
     */
    public function show(Category $category)
    {
        $category->load("posts");

        return view("categories.show", compact("category"));
    }

    public function create(Category $category)
    {
        return view("categories.create", compact("category"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "category_name" => ["required", "max:255"]
        ]);
        Category::create([
            "category_name" => $validated["category_name"]
        ]);
        return redirect("/categories");
    }

    public function edit(Category $category)
    {
        return view("categories.edit", compact("category"));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            "category_name" => ["required", "max:255"]
        ]);
        $category->update([
            "category_name" => $validated["category_name"]
        ]);
        return redirect("/categories/{$category->id}");
    }

    public function destroy(Category $category) {

        $category->delete();
        return redirect("/categories");
    }
}
