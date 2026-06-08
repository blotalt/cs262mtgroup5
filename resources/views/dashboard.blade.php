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

                        <form action="{{ url('/create-post') }}" method="POST">
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

                                    <p class="text-muted small mb-3">
                                        By {{ $post->user->name }}
                                    </p>

                                    <p class="text-muted mb-0">
                                        {{ $post->body }}
                                    </p>
                                </div>

                                <div class="d-flex gap-2">
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