@extends('layout')

@section('content')
<div class="container py-4">
    <h1>News</h1>

    @forelse($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $post->title }}</h4>
                <p class="mb-1"><strong>By:</strong> {{ $post->user->name }}</p>
                <p>{{ $post->body }}</p>
                <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
            </div>
        </div>
    @empty
        <p>No news posted yet.</p>
    @endforelse
</div>
@endsection