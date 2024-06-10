<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $detailId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->post_id = $detailId;
        $comment->content = $request->content;
        $comment->save();

        return back();
}
}
