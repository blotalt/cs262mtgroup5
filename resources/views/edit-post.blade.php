@extends('layout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Edit Post</h1>

    <form action="{{ url('/edit-post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input
            class="form-control mb-3"
            type="text"
            name="title"
            value="{{ $post->title }}"
        >

        <textarea
            class="form-control mb-3"
            name="body"
            rows="6"
        >{{ $post->body }}</textarea>

        {{-- Show current image if one exists --}}
        @if($post->image)
            <div class="mb-2">
                <small class="text-muted">Current image:</small><br>
                <img src="{{ asset('storage/'.$post->image) }}"
                     class="img-fluid rounded mb-2"
                     style="max-height: 150px;">
            </div>
        @endif

        <input
            class="form-control mb-3"
            type="file"
            name="image"
            accept="image/*"
        >

        
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

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="/dashboard" class="btn btn-secondary">Cancel</a>
    </form>
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