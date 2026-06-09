<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($id)
{
    $post = Post::with(['user', 'comments.user'])->findOrFail($id);

    return view('news.show', compact('post'));
}
}