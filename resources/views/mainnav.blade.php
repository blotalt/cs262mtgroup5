<header class="bg-header-green text-white pb-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-header-green pt-3">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="/home">
                <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-2"
                    style="width: 32px; height: 32px;">
                    🌾
                </div>
                <div>
                    <span class="fw-bold d-block lh-1"
                        style="font-size: 1.2rem; letter-spacing: 0.5px;">
                        KhmerRice
                    </span>
                    <small class="text-white-50" style="font-size: 0.65rem;">
                        CAMBODIA MARKET
                    </small>
                </div>
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/home">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/variety">Varieties</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/pricemarket">Market Prices</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/dashboard">Dashboard</a>
                    </li>

                      <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="/news">News</a>
                    </li>
                    
                </ul>

              


                <div class="d-flex align-items-center gap-3">

                    <!-- Search -->
                    <div class="position-relative">
                        <input class="form-control form-control-sm search-nav-input ps-4"
                            type="search"
                            placeholder="Search rice...">

                        <span class="position-absolute top-50 start-0 translate-middle-y ms-2 text-white-50">
                            🔍
                        </span>
                    </div>

                    @guest
                        <a href="/signup"
                            class="text-white text-decoration-none small fw-semibold">
                            Sign Up
                        </a>

                        <a href="/login"
                            class="btn btn-gold btn-sm">
                            Login
                        </a>
                    @endguest

                    @auth
                        <span class="small text-white-50">
                            Hi, {{ auth()->user()->name }}!
                        </span>

                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="btn btn-outline-light btn-sm">
                                Logout
                            </button>
                        </form>
                    @endauth

                </div>

            </div>
        </div>
    </nav>
</header>
