<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        // Create new comment
        Comment::create([
            'content' => $request->content,
            'post_id' => $post->id,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Comment added successfully.');
    }
}
