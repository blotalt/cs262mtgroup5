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
@endsection