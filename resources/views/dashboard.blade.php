@extends('layout')

@section('hero')
<div class="bg-header-green text-white pb-5 pt-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="section-label">Community Dashboard</span>
                <h1 class="display-5 fw-bold mt-1 mb-2">Manage News Posts</h1>
                <p class="text-white-50 lead fs-6">
                    Create, edit, and manage KhmerRice market updates.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        @auth
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="rice-card p-4">
                        <span class="section-label">Create Update</span>
                        <h2 class="fw-bold mb-3">New Post</h2>

                        <form action="{{ url('/create-post') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input
                                class="form-control mb-3"
                                type="text"
                                name="title"
                                placeholder="Post title"
                            >

                            <textarea
                                class="form-control mb-3"
                                name="body"
                                rows="6"
                                placeholder="Write market news..."
                            ></textarea>

                             <input
                             class="form-control mb-3"
                             type="file"
                             name="image"
                             accept="image/*">
                             <div class = "form-check mb-3">
                                <input
                                    class="form-check-input"
                                    type = "checkbox"
                                    name = "isTrending"
                                    value = "1"
                                    id = "trendingCheck"
                                    >
                                    <label class = "form-check-label" for="trendingCheck">
                                        Mark as Trending
                                    </label>

                             </div>

                            <button type="submit" class="btn btn-gold">
                                Create Post
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="mb-4">
                        <h2 class="fw-bold mb-1">Your Posts</h2>
                        <p class="text-muted mb-0">
                            Review and update your published rice market news
                        </p>
                    </div>

                    @forelse($posts as $post)
                        <div class="rice-card p-4 mb-3">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <div>
                                    <h4 class="fw-bold mb-1">{{ $post->title }}</h4>
                                    @if($post->isTrending)
    <span class="badge bg-danger mb-2">🔥 Trending</span>
@endif
                                           @if($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}"
                         class="img-fluid rounded mb-3"
                         alt="{{ $post->title }}"
                         style="max-height: 200px; object-fit: cover;">
                    @endif

                                    <p class="text-muted small mb-3">
                                        By {{ $post->user->name }}
                                    </p>

                                    <p class="text-muted mb-0">
                                        {{ $post->body }}
                                    </p>
                                </div>

                                {{-- <div class="d-flex gap-2">
                                    <a
                                        href="{{ url('/edit-post/'.$post->id) }}"
                                        class="btn btn-warning btn-sm"
                                    >
                                        Edit
                                    </a>

                                    <form action="{{ url('/delete-post/'.$post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div> --}}

                                {{-- Edit + Delete buttons --}}
<div class="d-flex gap-2">
    <a href="{{ url('/edit-post/'.$post->id) }}" class="btn btn-warning btn-sm">Edit</a>

    <button type="button" class="btn btn-outline-danger btn-sm"
            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $post->id }}">
        Delete
    </button>
</div>

{{-- Delete confirmation modal for THIS post --}}
<div class="modal fade" id="deleteModal{{ $post->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Delete Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center py-5">
                <p class="fw-bold fs-4 mb-3">Are you sure you want to delete this post?</p>
                <p class="text-muted fs-6 mb-0">This action cannot be undone.</p>
            </div>

            <div class="modal-footer border-0 justify-content-center gap-2">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>

                {{-- <form action="{{ url('/delete-post/'.$post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4">Yes, Delete</button>
                </form> --}}

                <button type="button" class="btn btn-sm btn-outline-danger"
        data-bs-toggle="modal" data-bs-target="#deletePriceModal{{ $price->id }}">
    Delete
</button>
            </div>
        </div>
    </div>
</div>
                            </div>
                        </div>
                    @empty
                        <div class="rice-card p-5 text-center">
                            <h4 class="fw-bold">No posts yet</h4>
                            <p class="text-muted mb-0">
                                Create your first market update using the form.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        @endauth
    </div>
</section>
@endsection