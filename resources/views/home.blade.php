@extends('layout')

@section('content')
<section>
    <div id="carouselExampleIndicators" class="carousel slide home-carousel" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/extra/ricefields.png" class="d-block w-100 carousel-img" alt="Cambodian rice field">
                
                <div class="carousel-caption text-start hero-content">
                    <span class="hero-badge">Live Market Data</span>
                    <h1>From Field to Market</h1>
                    <p>Connecting Cambodia’s rice producers and buyers through accurate, real-time market pricing and regional insights. With transparent pricing for Cambodia's premier rice varieties.</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="/pricemarket" class="btn btn-warning">
                            View Market Prices
                        </a>
                        <a href="/variety" class="btn btn-outline-light">
                            Explore Varieties
                        </a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img src="/images/extra/cambodiaricefarmer.jpg" class="d-block w-100 carousel-img" alt="Cambodian rice farmer">

                <div class="carousel-caption text-start hero-content">
                    <span class="hero-badge">Cambodian Rice</span>
                    <h1>Supporting Local Farmers</h1>
                    <p>Connecting farmers, traders, and buyers through accurate rice market data and pricing insights.</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="/pricemarket" class="btn btn-warning">
                            View Market Prices
                        </a>
                        <a href="/about" class="btn btn-outline-light">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <img src="/images/extra/ricelandscape.jpg" class="d-block w-100 carousel-img" alt="Rice field landscape">

                <div class="carousel-caption text-start hero-content">
                    <span class="hero-badge">Daily Price Updates</span>
                    <h1>Track Rice Prices</h1>
                    <p>Explore rice price trends from Cambodia’s provincial markets, including variations across regions, seasons, and local trading conditions.</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="/pricemarket" class="btn btn-warning">
                            Explore Prices
                        </a>
                        <a href="/variety" class="btn btn-outline-light">
                            Rice Varieties
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</section>

<section class="stats-bar">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 stat-item">
                <h3>25+</h3>
                <p>Rice Varieties</p>
            </div>
            <div class="col-md-4 stat-item">
                <h3>60+</h3>
                <p>Export Countries</p>
            </div>
            <div class="col-md-4 stat-item">
                <h3>25</h3>
                <p>Farming Provinces</p>
            </div>
        </div>
    </div>
</section>

<section class="featured-story py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="video-card">
                    <div class="ratio ratio-16x9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/9FmFKUwm41o?si=H0blIlSJHAfosmLA" title="YouTube video player" 
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <p class="section-label">Featured Story</p>
                <h2>The Story of Cambodia's Rice Culture</h2>
                <p>
                    Rice is the heart of Cambodian life. For over 2,000 years,
                    Khmer farmers have cultivated diverse varieties across the
                    floodplains of the Mekong and Tonle Sap.
                </p>
                <p>
                    Today, Cambodia exports premium fragrant rice to over 15
                    countries, with Phka Rumduol recognized as one of the world's
                    finest jasmine rice varieties.
                </p>
                <a href="{{ url('/about') }}" class="story-link">Learn more about our mission →</a>
            </div>
        </div>
    </div>
</section>

<section class="about-preview py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <p class="section-label">About KhmerRice</p>
                <h2>Cambodia's Most Trusted Rice Market Platform</h2>
                <p>
                    KhmerRice is the official agricultural market information system
                    for Cambodia's rice sector. We aggregate daily price data from
                    provincial markets across all provinces.
                </p>

                <div class="row g-3 mt-4">
                    <div class="col-sm-6">
                        <div class="mini-stat">
                            <h3>25</h3>
                            <p>Provinces Covered</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mini-stat">
                            <h3>60+</h3>
                            <p>Export Markets</p>
                        </div>
                    </div>
                </div>

                <a href="/pricemarket" class="btn btn-success mt-4">
                    Explore Market Data →
                </a>
            </div>

            <div class="col-lg-6">
                <img src="/images/riceheartandsoul/heartandsoul_4.jpg" class="about-image" alt="Cambodian rice farmer">
            </div>
        </div>
    </div>
</section>
@endsection