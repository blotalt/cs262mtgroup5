@php
        $teamMembers = [
            [
                'name' => 'Chhayhour Ly',
                'role' => 'Leader',
                'location' => 'Phnom Penh',
                'image' => 'chhayhour.jpg   '
            ],
            [
                'name' => 'Molinza Chum',
                'role' => 'Frontend',
                'location' => 'Phnom Penh',
                'image' => 'molinza.jpg'
            ],
            [
                'name' => 'Longly Chea',
                'role' => 'Frontend',
                'location' => 'Phnom Penh',
                'image' => 'longly.png'
            ],
            [
                'name' => 'Chattra Hean',
                'role' => 'BackEnd',
                'location' => 'Phnom Penh',
                'image' => 'chaktra.jpg'
            ],
            [
                'name' => 'Syphanna Kong',
                'role' => 'Backend',
                'location' => 'Phnom Penh',
                'image' => 'phanna.jpg'
            ],
            [
                'name' => 'Kunvitourichard Hou',
                'role' => 'QA/QC',
                'location' => 'Phnom Penh',
                'image' => 'vitou.jpg'
            ],
            [
                'name' => 'Sharif Shefiy',
                'role' => 'QA/QC',
                'location' => 'Phnom Penh',
                'image' => 'sharif.jpeg'
            ],
            
        ];
@endphp
@extends('layout')

@section('hero')
    <div class="bg-header-green text-white pb-5">
        <div class="container mt-0">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="text-warning fw-bold small tracking-wider" style="font-size: 0.8rem;">About KhmerRice</span>
                    <h1 class="display-5 fw-bold mt-1 mb-2" style="color: var(--text-white); font-family: Georgia, serif;">Cambodia's Rice Market Platform</h1>
                    <p class="text-white-50 lead fs-5">Empowering farmers, exporters, and traders with transparent market data</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
    <div class="row mt-5 mb-5 pt-3 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0 pe-lg-5">
            <span class="text-warning fw-bold small text-uppercase" style="letter-spacing: 1px;">Our Mission</span>
            <h2 class="fw-bold mt-2 mb-4" style="color: var(--text-dark); font-family: Georgia, serif;">Connecting Cambodia's Rice Economy</h2>
            
            <p class="text-muted mb-4" style="line-height: 1.8;">
                KhmerRice was established under the Ministry of Agriculture, Forestry and Fisheries of Cambodia to create a transparent, data-driven marketplace for the country's most important crop.
            </p>
            <p class="text-muted mb-4" style="line-height: 1.8;">
                We aggregate real-time price data from 25 provincial markets, maintain the national rice variety registry, and provide tools for farmers, millers, exporters, and researchers to make informed decisions.
            </p>
            <p class="text-muted" style="line-height: 1.8;">
                Cambodia's rice sector employs over 3.5 million farming families. Our platform helps ensure they receive fair market prices and connect with international buyers.
            </p>
        </div>
 

        <div class="col-lg-6">
            <div class="row g-4">
                <div class="col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4" style="background-color: #ffffff;">
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background-color: #eaf1eb; color: var(--primary-green);">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                        </div>
                        <h3 class="fw-bold text-warning mb-1">3.5 Million+</h3>
                        <p class="text-muted small mb-0">Farming Families</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4" style="background-color: #ffffff;">
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background-color: #eaf1eb; color: var(--primary-green);">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                            </div>
                        </div>
                        <h3 class="fw-bold text-warning mb-1">#1</h3>
                        <p class="text-muted small mb-0">Best Rice </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4" style="background-color: #ffffff;">
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background-color: #eaf1eb; color: var(--primary-green);">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                            </div>
                        </div>
                        <h3 class="fw-bold text-warning mb-1">60+</h3>
                        <p class="text-muted small mb-0">Export Countries</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4" style="background-color: #ffffff;">
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background-color: #eaf1eb; color: var(--primary-green);">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                            </div>
                        </div>
                        <h3 class="fw-bold text-warning mb-1">25</h3>
 
                        <p class="text-muted small mb-0">Provinces Covered</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="text-center mt-5 pt-4 mb-5">
        <span class="text-warning fw-bold small text-uppercase" style="letter-spacing: 1px;">The Team</span>
        <h2 class="fw-bold mt-2" style="color: var(--text-dark); font-family: Georgia, serif;">Built by Cambodian Web Designers</h2>
    </div>

    <div class="container">
    <div class="row g-4 mb-5 pb-5">
        @foreach($teamMembers as $member)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="background-color: #ffffff;">
                    <div style="height: 400px; overflow: hidden;">
                        <img src="{{ asset('images/team_members_stuff/' .$member['image']) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $member['name'] }}">
                    </div>
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-1">{{ $member['name'] }}</h5>
                        <p class="text-warning small fw-semibold mb-3">{{ $member['role'] }}</p>
                        <p class="text-muted small mb-0 d-flex align-items-center gap-2">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            {{ $member['location'] }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>

    <div class="text-center mt-4 mb-5">
        <span class="text-warning fw-bold small text-uppercase" style="letter-spacing: 1px;">Get In Touch</span>
        <h2 class="fw-bold mt-2" style="color: var(--text-dark); font-family: Georgia, serif;">Contact Us</h2>
    </div>

    <div class="row justify-content-center mb-5 pb-4">
        <div class="col-lg-5 mb-5 mb-lg-0 pe-lg-5 pt-3">
            <div class="d-flex mb-4">
                <div class="rounded-circle d-flex align-items-center justify-content-center me-3 mt-1 flex-shrink-0" style="width: 40px; height: 40px; background-color: #eaf1eb; color: var(--primary-green);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
                <div>
                    <h6 class="fw-bold mb-1 text-dark">Address</h6>
                    <p class="text-muted small mb-0" style="line-height: 1.6;">Ministry of Agriculture, Phnom Penh, Cambodia</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <div class="rounded-circle d-flex align-items-center justify-content-center me-3 mt-1 flex-shrink-0" style="width: 40px; height: 40px; background-color: #eaf1eb; color: var(--primary-green);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </div>
                <div>
                    <h6 class="fw-bold mb-1 text-dark">Email</h6>
                    <p class="text-muted small mb-0">info@khmerrice.gov.kh</p>
                </div>
            </div>


            <div class="d-flex mb-4">
                <div class="rounded-circle d-flex align-items-center justify-content-center me-3 mt-1 flex-shrink-0" style="width: 40px; height: 40px; background-color: #eaf1eb; color: var(--primary-green);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <div>
                    <h6 class="fw-bold mb-1 text-dark">Phone</h6>
                    <p class="text-muted small mb-0">+855 23 456 789</p>
                </div>
            </div>

            <div class="d-flex">
                <div class="rounded-circle d-flex align-items-center justify-content-center me-3 mt-1 flex-shrink-0" style="width: 40px; height: 40px; background-color: #eaf1eb; color: var(--primary-green);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                </div>
                <div>
                    <h6 class="fw-bold mb-1 text-dark">Website</h6>
                    <p class="text-muted small mb-0">www.khmerrice.gov.kh</p>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5" style="background-color: #ffffff;">
                <h5 class="fw-bold mb-4 text-dark" style="font-family: Georgia, serif;">Send a Message</h5>
                <form action="#" method="POST">
                    <!-- @csrf -->
                    <div class="mb-3">
                        <input type="text" class="form-control border-0 py-3 px-4 rounded-3" style="background-color: #f3ece0;" placeholder="Your name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control border-0 py-3 px-4 rounded-3" style="background-color: #f3ece0;" placeholder="Email address" required>
                    </div>
                    <div class="mb-4">
                        <textarea class="form-control border-0 py-3 px-4 rounded-3" style="background-color: #f3ece0; resize: none;" rows="4" placeholder="Your message..." required></textarea>
                    </div>
                    <button type="submit" class="btn text-white w-100 py-3 rounded-3 fw-bold" style="background-color: var(--primary-green);">Send Message</button>
                </form>
            </div>
        </div>
    </div>
@endsection