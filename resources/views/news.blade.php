@extends('layout')

@section('hero')
<div class="bg-header-green text-white pb-5 pt-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="section-label">Agriculture Updates</span>
                <h1 class="display-5 fw-bold mt-1 mb-2">Rice Market News</h1>
                <p class="text-white-50 lead fs-6">
                    Latest updates from Cambodia's rice markets, farmers, and trade sector.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="fw-bold mb-1">Latest News</h2>
                <p class="text-muted mb-0">
                    Stories and updates from the KhmerRice community
                </p>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($posts as $post)
                <div class="col">
                    <article class="rice-card h-100 p-4">
                        <span class="badge-type position-static d-inline-block mb-3">
                            Market Update
                        </span>

                        <h4 class="fw-bold mb-2">{{ $post->title }}</h4>

                        <p class="text-muted small mb-3">
                            By {{ $post->user->name }} · {{ $post->created_at->format('M d, Y') }}
                        </p>

                        <p class="text-muted mb-0">
                            {{ $post->body }}
                        </p>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="rice-card p-5 text-center">
                        <h4 class="fw-bold">No news posted yet</h4>
                        <p class="text-muted mb-0">
                            New rice market updates will appear here.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection