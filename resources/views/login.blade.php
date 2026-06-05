@extends('layout')

@section('content')

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                <h4>LOGIN</h4>
                <p>Log in here!</p>

                <form action="/login" method="post">
                    @csrf
                    <input type="text" name="loginname" class="mt-2 form-control" placeholder="Username">
                    <input type="password" name="loginpassword" class="mt-2 form-control" placeholder="Password">
                    <button type="submit" name="submit" class="btn btn-primary my-2">
                        LOGIN
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
