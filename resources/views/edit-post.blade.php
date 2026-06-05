@extends('layout')

@section('content')
<div class="container py-4">
    <h1>Edit Post</h1>

    <form action="{{ url('/edit-post/'.$post->id) }}" method="POST" class="p-3">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $post->title }}" class="form-control mb-3">
        <textarea name="body" class="form-control mb-3">{{ $post->body }}</textarea>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection