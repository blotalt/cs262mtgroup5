<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        $incomingFields['isTrending'] = $request->has('isTrending');


    if ($request->hasFile('image')) {
        $incomingFields['image'] = $request->file('image')->store('posts', 'public');
    }

        Post::create($incomingFields);

        return redirect('/dashboard');
    }
        public function news()
            {
                $posts = Post::with('user')->orderByDesc('isTrending')->latest()->get();
                return view('news', ['posts' => $posts]);
            }

    public function showEditScreen(Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/dashboard');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);

        return redirect('/dashboard');
    }

    public function deletePost(Post $post)
    {
        if (auth()->user()->id === $post->user_id) {
            $post->delete();
        }

        return redirect('/dashboard');
    }
    public function show($id)
{
    $post = Post::with(['user', 'comments.user'])->findOrFail($id);

    $post->userRating = auth()->check()
        ? \App\Models\Rating::where('post_id', $post->id)
            ->where('user_id', auth()->id())
            ->value('rating')
        : 0;

    $post->avgRating = \App\Models\Rating::where('post_id', $post->id)
        ->avg('rating');

    return view('news.show', compact('post'));
}

}