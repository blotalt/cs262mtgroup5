<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variety;
use App\Models\Post;

class SearchController extends Controller
{
     public function index(Request $request)
    {
        $q = $request->q;

        $varieties = collect();
        $posts = collect();

        if ($request->filled('q')) {
            $varieties = Variety::where('name', 'like', "%{$q}%")
                ->orWhere('khmer_name', 'like', "%{$q}%")
                ->orWhere('location', 'like', "%{$q}%")
                ->orWhere('type', 'like', "%{$q}%")
                ->orWhere('description', 'like', "%{$q}%")
                ->get();

            $posts = Post::where('title', 'like', "%{$q}%")
                ->orWhere('body', 'like', "%{$q}%")
                ->get();
        }

        return view('search', [
            'q' => $q,
            'varieties' => $varieties,
            'posts' => $posts,
        ]);
    }
        public function suggest(Request $request)
{
    $q = $request->q;

    if (!$q) {
        return response()->json([]);
    }

    // Varieties
    $varieties = Variety::where('name', 'like', "%{$q}%")
        ->orWhere('type', 'like', "%{$q}%")
        ->orWhere('location', 'like', "%{$q}%")
        ->limit(5)
        ->get(['name', 'type'])
        ->map(fn($v) => ['label' => $v->name, 'meta' => $v->type, 'kind' => 'Variety']);

    // News posts
    $posts = Post::where('title', 'like', "%{$q}%")
        ->limit(3)
        ->get(['title'])
        ->map(fn($p) => ['label' => $p->title, 'meta' => 'News', 'kind' => 'News']);

    // Combine both into one suggestion list
    $results = $varieties->concat($posts);

    return response()->json($results);
}
}