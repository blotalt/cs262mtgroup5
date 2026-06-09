@extends('layout')

@section('hero')
<div class="bg-header-green text-white pb-5 pt-4">
    <div class="container">
        <h1 class="fw-bold">News Details</h1>
        <p class="text-white-50">Read the full update</p>
    </div>
</div>
@endsection

@section('content')
<div class="container py-5">

    <!-- Post Card -->
    <div class="rice-card p-4 mb-4">
        <h2 class="fw-bold">{{ $post->title }}</h2>

        <p class="text-muted small">
            By {{ $post->user->name }} · {{ $post->created_at->format('M d, Y') }}
        </p>

        <hr>

        <p class="text-muted">
            {{ $post->body }}
        </p>
    </div>

    <!-- Comments Section -->
<div class="rice-card p-4">
    <h4 class="fw-bold mb-3">Comments</h4>

    <!-- Comment form -->
    <form method="POST" action="{{ route('comments.store', $post->id) }}">
        @csrf

        <textarea name="body" class="form-control mb-2" rows="3" placeholder="Write a comment..."></textarea>

        <button type="submit" class="btn btn-success btn-sm rounded-pill px-3">
            Post Comment
        </button>
    </form>

    <hr>

    @if($post->comments->count())
        @foreach($post->comments as $comment)
            <div class="mb-3 d-flex justify-content-between align-items-start">

                <div>
                    <p class="mb-1">
                        <strong>{{ $comment->user->name }}:</strong>
                        {{ $comment->body }}
                    </p>

                    <small class="text-muted">
                        {{ $comment->created_at->diffForHumans() }}
                    </small>
                </div>

                @if(auth()->id() === $comment->user_id)
                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm rounded-pill px-3">
                            Delete
                        </button>
                    </form>
                @endif

            </div>
        @endforeach
    @else
        <p class="text-muted">No comments yet.</p>
    @endif

<hr>

<!-- Fake Comments for testing -->
<div class="mt-3">

    <div class="mb-3">
        <p class="mb-1">
            <strong>Phanna:</strong>
            yooooo (this is a fake comment im just testing it)
        </p>
        <small class="text-muted">24 years ago</small>
    </div>

    <div class="mb-3">
        <p class="mb-1">
            <strong>Mr. Phearun:</strong>
            awesome project gang 100% full scores.
        </p>
        <small class="text-muted">52 seconds ago</small>
    </div>

</div>
    </div>
</div>
@endsection