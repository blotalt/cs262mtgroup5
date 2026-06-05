@extends('layout')

@section('content')

<style>
    
</style>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                <h4>SIGN UP</h4>
                <p>Don't have an account yet? Sign up here!</p>

                <form action="/register" method="post">
                    @csrf
                    <input type="text" name="name" class="mt-2 form-control" placeholder="Username">
                    <input type="password" name="password" class="mt-2 form-control" placeholder="Password">
                    <input type="password" name="password_confirmation" class="mt-2 form-control" placeholder="Repeat Password">
                    <input type="email" name="email" class="my-2 form-control" placeholder="E-mail">
                    <button type="submit" name="submit" class="btn btn-primary my-2">
                        SIGN UP
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
