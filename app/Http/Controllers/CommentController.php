<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
{
    $request->validate([
        'body' => 'required'
    ]);

    Comment::create([
        'post_id' => $id,
        'user_id' => auth()->id(),
        'body' => $request->body
    ]);

    return back();
}
    public function destroy(Comment $comment)
{
    // only allow owner to delete
    if (auth()->id() !== $comment->user_id) {
        return back();
    }

    $comment->delete();

    return back();
}

public function update(Request $request, Comment $comment)
{
    if (auth()->id() !== $comment->user_id) {
        return back();
    }

    $request->validate([
        'body' => 'required'
    ]);

    $comment->update([
        'body' => $request->body
    ]);

    return back();
}
}