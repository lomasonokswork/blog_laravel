<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("category")->get();
        return view("posts.index", compact("posts"));
    }

    /**
     * Display a single to-do item.
     *
     * Implicit route model binding will inject the correct instance.
     */
    public function show(Post $post)
    {
        $post->load(["category", "comments"]);

        return view("posts.show", compact("post"));
    }

    public function create(Post $post)
    {
        $categories = Category::all();

        return view("posts.create", compact("post", "categories"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "content" => ["required", "max:255"],
            "category_id" => ["required"]
        ]);
        Post::create([
            "content" => $validated["content"],
            "category_id" => $validated["category_id"]
        ]);
        return redirect("/posts");
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view("posts.edit", compact("post", "categories"));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            "content" => ["required", "max:255"],
            "category_id" => ["required"]
        ]);
        $post->update([
            "content" => $validated["content"],
            "category_id" => $validated["category_id"]
        ]);
        return redirect("/posts/{$post->id}");
    }

    public function destroy(Post $post) {

        $post->delete();
        return redirect("/posts");
    }
}
