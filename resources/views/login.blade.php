<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Page</h1>
    <form action="/login" method="post">
        @csrf
        <input type="text" name="loginname" placeholder="Username">
        <input type="password" name="loginpassword" placeholder="Password">
        <br>
        <button type="submit" name="submit" class="btn btn-primary my-2">LOGIN</button>
    </form>
</body>
</html>