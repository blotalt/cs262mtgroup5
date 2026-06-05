@extends('layout')

@section('content')
<div class="container py-4">
    <h1>Dashboard</h1>

    @auth
        <h2>Create Post</h2>
        <div class="p-4 mb-4 rounded bg-body-secondary">
            <form action="{{ url('/create-post') }}" method="POST">
                @csrf
                <input class="form-control mb-2" type="text" name="title" placeholder="Post Title">
                <textarea class="form-control mb-2" name="body" placeholder="Body content..."></textarea>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>

        <h2>All Posts</h2>
        @forelse($posts as $post)
            <div class="p-4 mb-4 rounded bg-body-secondary">
                <h3>{{ $post->title }} by {{ $post->user->name }}</h3>
                <p>{{ $post->body }}</p>

                <a href="{{ url('/edit-post/'.$post->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ url('/delete-post/'.$post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        @empty
            <p>No posts yet.</p>
        @endforelse
    @else
        <div class="row">
            <div class="col-md-6">
                <div class="p-4 mb-4 rounded bg-body-secondary">
                    <h4>SIGN UP</h4>
                    <p>Don't have an account yet? Sign up here!</p>
                    <form action="{{ url('/register') }}" method="post">
                        @csrf
                        <input type="text" name="name" class="form-control mb-2" placeholder="Username">
                        <input type="password" name="password" class="form-control mb-2" placeholder="Password">
                        <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="Repeat Password">
                        <input type="text" name="email" class="form-control mb-2" placeholder="E-mail">
                        <button type="submit" class="btn btn-primary">SIGN UP</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 mb-4 rounded bg-body-secondary">
                    <h4>LOGIN</h4>
                    <p>Log in here!</p>
                    <form action="{{ url('/login') }}" method="post">
                        @csrf
                        <input type="text" name="loginname" class="form-control mb-2" placeholder="Username">
                        <input type="password" name="loginpassword" class="form-control mb-2" placeholder="Password">
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    @endauth
</div>
@endsection