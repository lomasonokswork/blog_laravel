<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a new comment.
     *
     * Implicit route model binding will inject the correct instance.
     */


    public function store(Request $request)
    {
        $validated = $request->validate([
            "post_id" => ["required"],
            "author" => ["required", "max:255"],
            "content" => ["required", "max:255"]
        ]);
        Comment::create([
            "post_id" => $validated["post_id"],
            "author" => $validated["author"],
            "content" => $validated["content"]
        ]);
        return redirect("/posts/{$validated['post_id']}");
    }

    public function edit(Comment $comment)
    {
        return view("comments.edit", compact("comment"));
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            "post_id" => ["required"],
            "author" => ["required", "max:255"],
            "content" => ["required", "max:255"]
        ]);
        $comment->update([
            "post_id" => $validated["post_id"],
            "author" => $validated["author"],
            "content" => $validated["content"]
        ]);
        return redirect("/posts/{$comment->post_id}");
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return redirect("/posts/{$comment->post_id}");
    }
}
