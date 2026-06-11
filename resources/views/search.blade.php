@extends('layout')

@section('hero')
    <div class="bg-header-green text-white pb-5 pt-4">
        <div class="container">
            <h1 class="display-6 fw-bold mb-1">Search Results</h1>
            <p class="text-white-50 mb-0">
                @if($q)
                    Showing results for "<strong>{{ $q }}</strong>"
                @else
                    Type something to search
                @endif
            </p>
        </div>
    </div>
@endsection

@section('content')
<div class="container my-5">

    {{-- Variety results --}}
    <h3 class="fw-bold mb-3">Rice Varieties ({{ $varieties->count() }})</h3>
    @forelse($varieties as $rice)
        <div class="rice-card p-3 mb-2 d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $rice->name }}</strong>
                <span class="text-muted small">— {{ $rice->type }}, {{ $rice->location }}</span>
            </div>
            <a href="/variety?search={{ $rice->name }}" class="btn btn-success btn-sm rounded-pill">View</a>
        </div>
    @empty
        <p class="text-muted">No varieties found.</p>
    @endforelse

    {{-- News results --}}
    <h3 class="fw-bold mb-3 mt-5">News Posts ({{ $posts->count() }})</h3>
    @forelse($posts as $post)
        <div class="rice-card p-3 mb-2">
            <strong>{{ $post->title }}</strong>
            <p class="text-muted small mb-0">{{ Str::limit($post->body, 100) }}</p>
        </div>
    @empty
        <p class="text-muted">No news posts found.</p>
    @endforelse

</div>
@endsection