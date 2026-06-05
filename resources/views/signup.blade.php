<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sign Up Page</h1>
    <form action="{{ url('/register') }}" method="post">
        @csrf
        <input type="text" name="name" class="mt-2 form-control" placeholder="Username">
        <input type="password" name="password" class="mt-2 form-control" placeholder="Password">
        <input type="password" name="password_confirmation" class="mt-2 form-control" placeholder="Repeat Password">
        <input type="text" name="email" class="my-2 form-control" placeholder="E-mail">
        <br>
        <button type="submit" class="btn btn-primary my-2">Sign Up</button>
    </form>
</body>
</html>