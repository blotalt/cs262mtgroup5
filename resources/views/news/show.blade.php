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

@if($post->image)
    <div class="mb-3 d-flex justify-content-center">
        <img src="{{ asset('storage/' . $post->image) }}"
             class="rounded"
             style="max-height: 400px; max-width: 100%; object-fit: contain;"
             alt="Post image">
    </div>
@endif

        <p class="text-muted small">
            By {{ $post->user->name }} · {{ $post->created_at->format('M d, Y') }}
        </p>

        <hr>

        <p class="text-muted">
            {{ $post->body }}
        </p>
    </div>

<div class="rice-card p-4 mb-4">

    <h4 class="fw-bold mb-3">Leave a Review</h4>

    <form method="POST" action="{{ route('ratings.store', $post->id) }}">
        @csrf

        <div class="d-flex gap-1 align-items-center">

            @for ($i = 1; $i <= 5; $i++)
                <button type="submit"
                        name="rating"
                        value="{{ $i }}"
                        class="btn p-0 border-0 bg-transparent">

                    @if($post->userRating >= $i)
                        <i class="bi bi-star-fill text-warning fs-4"></i>
                    @else
                        <i class="bi bi-star text-warning fs-4"></i>
                    @endif

                </button>
            @endfor

            <span class="ms-3 text-muted small">
                {{ number_format($post->avgRating, 1) }} / 5
            </span>

        </div>

    </form>

</div>

@if(session('success'))
    <div class="alert alert-success py-2">
        {{ session('success') }}
    </div>
@endif

    <!-- Comments Section -->
    <div class="rice-card p-4">
        <h4 class="fw-bold mb-3">Comments</h4>

        <!-- Add Comment -->
        <form method="POST" action="{{ route('comments.store', $post->id) }}">
            @csrf

            <textarea name="body" class="form-control mb-2" rows="3"
                placeholder="Write a comment..."></textarea>

            <button type="submit" class="btn btn-success btn-sm rounded-pill px-3">
                Post Comment
            </button>
        </form>

        <hr>

        @if($post->comments->count())

            @foreach($post->comments as $comment)

                <div class="border-bottom pb-3 mb-3">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>
                            <p class="mb-1">
                                <strong>{{ $comment->user->name }}</strong>
                            </p>

                            <p class="mb-1">
                                {{ $comment->body }}
                            </p>

                            <small class="text-muted">
                                {{ $comment->created_at->diffForHumans() }}
                            </small>
                        </div>

                        @if(auth()->id() === $comment->user_id)
                            <div class="d-flex flex-column gap-2 ms-3">

                                <!-- Edit Button -->
                                <button
                                    type="button"
                                    class="btn btn-warning btn-sm rounded-pill px-3 d-flex align-items-center justify-content-center"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#editComment{{ $comment->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <!-- Delete Button -->
                                <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm rounded-pill px-3 d-flex align-items-center justify-content-center">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        @endif

                    </div>

                    <!-- Edit Form -->
                    @if(auth()->id() === $comment->user_id)
                        <div class="collapse mt-3" id="editComment{{ $comment->id }}">

                            <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                                @csrf
                                @method('PUT')

                                <textarea name="body" class="form-control mb-2" rows="3">{{ $comment->body }}</textarea>

                                <button type="submit" class="btn btn-success btn-sm rounded-pill px-3">
                                    Save Changes
                                </button>
                            </form>

                        </div>
                    @endif

                </div>

            @endforeach

        @else
            <p class="text-muted">No comments yet.</p>
        @endif

    </div>

</div>
@endsection