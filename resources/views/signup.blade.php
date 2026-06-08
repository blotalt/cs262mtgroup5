@extends('layout')

@section('content')

<style>
    body { background-color: #2e5b26 !important; }
    main { padding: 0 !important; margin: 0 !important; }
</style>

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center py-5" 
     style="background: linear-gradient(rgba(46, 91, 38, 0.85), rgba(46, 91, 38, 0.85)), url('{{ asset('images/rice_field_bg.jpg') }}') no-repeat center center; background-size: cover;">
    
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden w-100" style="max-width: 750px; background-color: #ffffff;">
        <div class="text-center text-white p-4" style="background-color: var(--primary-green, #2e5b26);">
            <div class="mb-2">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#e9af2a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 22s11.5-1.5 14-11.5S15 2 15 2s-1.5 7.5-11.5 10S2 22 2 22z"></path>
                    <path d="M9 13c1.5-1.5 4-2.5 4-2.5s-1-2.5-2.5-4"></path>
                    <path d="M6 16c1.5-1.5 4-2.5 4-2.5s-1-2.5-2.5-4"></path>
                </svg>
            </div>
            <h2 class="fw-bold mb-1" style="font-family: Georgia, serif; letter-spacing: 0.5px;">SIGN UP</h2>
            <p class="small opacity-75 mb-0">Don't have an account yet? Sign up here!</p>
        </div>

        <div class="card-body p-4 p-md-5">
            <form action="/register" method="post">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark small mb-2">Username</label>
                        <div class="input-group">
                            <span class="input-group-text border-0 ps-4 pe-2" style="background-color: #f4edd4; color: #7a7561;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            </span>
                            <input type="text" name="name" class="form-control border-0 py-3 pe-4 fs-6" style="background-color: #f4edd4;" placeholder="Username" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark small mb-2">E-mail</label>
                        <div class="input-group">
                            <span class="input-group-text border-0 ps-4 pe-2" style="background-color: #f4edd4; color: #7a7561;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </span>
                            <input type="email" name="email" class="form-control border-0 py-3 pe-4 fs-6" style="background-color: #f4edd4;" placeholder="E-mail" required>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark small mb-2">Password</label>
                        <div class="input-group">
                            <span class="input-group-text border-0 ps-4 pe-2" style="background-color: #f4edd4; color: #7a7561;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            </span>
                            <input type="password" name="password" class="form-control border-0 py-3 pe-4 fs-6" style="background-color: #f4edd4;" placeholder="Password" required>
                        </div>
                    </div>
 

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark small mb-2">Repeat Password</label>
                        <div class="input-group">
                            <span class="input-group-text border-0 ps-4 pe-2" style="background-color: #f4edd4; color: #7a7561;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            </span>
                            <input type="password" name="password_confirmation" class="form-control border-0 py-3 pe-4 fs-6" style="background-color: #f4edd4;" placeholder="Repeat Password" required>
                        </div>
                    </div>
                </div>

                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="terms" required style="border-color: #7a7561;">
                    <label class="form-check-label text-muted small user-select-none" for="terms">
                        I agree to the <a href="#" class="text-warning fw-semibold text-decoration-none">Terms of Service</a> and <a href="#" class="text-warning fw-semibold text-decoration-none">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit" name="submit" class="btn border-0 w-100 py-3 rounded-3 fw-bold text-dark mt-4" style="background-color: #e9af2a; transition: background 0.2s;">
                    SIGN UP
                </button>

                <div class="text-center mt-4">
                    <span class="text-muted small">Already have an account? </span>
                    <a href="/login" class="text-warning fw-bold text-decoration-none small">Sign In</a>
                </div>
            </form>
        </div>
        
        <div class="text-center pb-4 opacity-50 text-dark small">
            Join over 3.5M farming families connected through KhmerRice
        </div>
    </div>
</div>
@endsection