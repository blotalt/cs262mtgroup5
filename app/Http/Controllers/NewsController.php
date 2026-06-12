<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($id)
{
    $post = \App\Models\Post::with(['user', 'comments.user'])
        ->findOrFail($id);

    // CURRENT USER RATING (for the star fill)
    $post->userRating = auth()->check()
        ? \App\Models\Rating::where('post_id', $post->id)
            ->where('user_id', auth()->id())
            ->value('rating')
        : 0;

    // AVERAGE RATING (for display)
    $post->avgRating = \App\Models\Rating::where('post_id', $post->id)
        ->avg('rating');

    return view('news.show', compact('post'));
}
}