<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar scroll</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">   
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/news') }}">News</a>
                    </li>

                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/pricemarket') }}">Price Market</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/variety') }}">Variety</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/signup') }}">Sign Up</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    @endguest
                    @auth
                     <li class="nav-item">
                        <span class="nav-link">Hi, {{ auth()->user()->name }}!</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</body>
</html>