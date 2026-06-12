@extends('layout')

@section('content')

<div class="container py-5">
    <div class="rice-card p-4">
        <span class="section-label">Edit Update</span>
        <h1 class="fw-bold mb-4">Edit Post</h1>

        <form action="{{ url('/edit-post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input
        type="text"
        name="title"
        value="{{ $post->title }}"
        class="form-control mb-3"
        placeholder="Post title"
    >

    <textarea
        name="body"
        rows="6"
        class="form-control mb-3"
        placeholder="Write market news..."
    >{{ $post->body }}</textarea>

    {{-- Show current image if there is one --}}
    @if($post->image)
        <div class="mb-2">
            <small class="text-muted">Current image:</small><br>
            <img src="{{ asset('storage/'.$post->image) }}"
                 class="img-fluid rounded mb-2"
                 style="max-height: 150px;">
        </div>
    @endif

    {{-- Upload a new image (optional) --}}
    <input
        type="file"
        name="image"
        accept="image/*"
        class="form-control mb-3"
    >

    {{-- Trending checkbox, pre-checked if already trending --}}
    <div class="form-check mb-3">
        <input
            class="form-check-input"
            type="checkbox"
            name="isTrending"
            value="1"
            id="editTrending"
            {{ $post->isTrending ? 'checked' : '' }}
        >
        <label class="form-check-label" for="editTrending">
            🔥 Mark as Trending
        </label>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-gold">Save Changes</button>
        <a href="/dashboard" class="btn btn-outline-secondary">Cancel</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Post</button>
    </div>
</form>

        {{-- <form action="{{ url('/edit-post/'.$post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input
                type="text"
                name="title"
                value="{{ $post->title }}"
                class="form-control mb-3"
                placeholder="Post title"
            >

            <textarea
                name="body"
                rows="6"
                class="form-control mb-3"
                placeholder="Write market news..."
            >{{ $post->body }}</textarea>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-gold">
                    Save Changes
                </button>

                <a href="/dashboard" class="btn btn-outline-secondary">
                    Cancel
                </a>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Delete Post
                </button>
            </div>
        </form> --}}
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Delete Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center py-5">
                <p class="fw-bold fs-4 mb-3">
                    Are you sure you want to delete this post?
                </p>

                <p class="text-muted fs-6 mb-0">
                    This action cannot be undone.
                </p>
            </div>

            <div class="modal-footer border-0 justify-content-center gap-2">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                    Cancel
                </button>

                <form action="{{ url('/delete-post/'.$post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger px-4">
                        Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection