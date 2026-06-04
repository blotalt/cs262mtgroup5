<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sign Up Page</h1>
    <form action="/register" method="post">
        @csrf

        @if ($errors->any())
            <div style="color:red; border:1px solid red; padding:8px; margin:8px 0;">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <input type="text" name="name" class="mt-2 form-control" placeholder="Username" value="{{ old('name') }}">
        <input type="password" name="password" class="mt-2 form-control" placeholder="Password">
        <input type="password" name="password_confirmation" class="mt-2 form-control" placeholder="Repeat Password">
        <input type="text" name="email" class="my-2 form-control" placeholder="E-mail" value="{{ old('email') }}">
        <br>
        <button type="submit" name="submit" class="btn btn-primary my-2">SIGN UP</button>
    </form>
</body>
</html>