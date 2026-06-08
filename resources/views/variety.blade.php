@php
    $varieties = [
        [
            'name' => 'Phka Rumduol', 
            'khmer' => 'ផ្ការំដួល', 
            'img' => 'jasmine.png',
            'location' => 'Takeo, Kampong Speu', 
            'desc' => "Cambodia's most prized aromatic variety, awarded World's Best Rice multiple times. Delicate floral fragrance and soft...",
            'type' => 'Jasmine', 'demand' => 'Very High', 'yield' => '3.2 t/ha', 'cycle' => '155 days', 'season' => 'Wet'
        ],
        [
            'name' => 'Sen Kra Ob', 
            'khmer' => 'សែនក្រអូប', 
            'img' => 'fragrant.jpg',
            'location' => 'Battambang, Pursat', 
            'desc' => "The most widely grown variety in Cambodia. Reliable yield and mild flavor make it the staple export rice of the country.",
            'type' => 'Jasmine', 'demand' => 'Very High', 'yield' => '5.5 t/ha', 'cycle' => '122 days', 'season' => 'Wet'
        ],
        [
            'name' => 'Neab Dam', 
            'khmer' => 'នាងដំ', 
            'img' => 'blackrice.jpg',
            'location' => 'Kampong Thom', 
            'desc' => "Traditional Cambodian black rice with deep purple bran layer. Rich in anthocyanins, preferred for ceremonial dishes.",
            'type' => 'Black Rice', 'demand' => 'High', 'yield' => '2.8 t/ha', 'cycle' => '148 days', 'season' => 'Dry'
        ],
        [
            'name' => 'Phka Rumdeng', 
            'khmer' => 'ផ្ការំដេង',
            'img' => 'redrice.png', 
            'location' => 'Takeo, Battambang, Siem Reap', 
            'desc' => "A whole-grain red rice with a reddish-brown hue, due to its outer bran layer, which remains intact.",
            'type' => 'Whole-grain', 'demand' => 'High', 'yield' => '3.2 t/ha', 'cycle' => '155 days', 'season' => 'Dry'
        ],
        [
            'name' => 'Angkor Damnaeb', 
            'khmer' => 'អង្ករដំណើប', 
            'img' => 'glutinous.png',
            'location' => 'Battambang, Pursat', 
            'desc' => "When cooked, it is called បាយដំណើប (bai damnaeb). It is a cornerstone of Cambodian cuisine and is used in a wide variety of daily staples and festive desserts",
            'type' => 'Glutinous', 'demand' => 'High', 'yield' => '5.5 t/ha', 'cycle' => '122 days', 'season' => 'Wet'
        ],
        [
            'name' => 'Angkor Samroub', 
            'khmer' => 'អង្ករសម្រូប', 
            'img' => 'brown.png',
            'location' => 'Preah Vihear, Kampong Speu', 
            'desc' => "Unpolished rice that retains the bran layer, resulting in a tan color and chewier texture. Nutty and earthy with a firmer bite.",
            'type' => 'Brown Rice', 'demand' => 'High', 'yield' => '2.8 t/ha', 'cycle' => '148 days', 'season' => 'All'
        ]
    ];
@endphp

@extends('layout')

@section('hero')
    <!-- Hero Info Banner Section -->
        <div class="bg-header-green text-white pb-5">
        <div class="container mt-0">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="text-warning fw-bold small tracking-wider" style="font-size: 0.8rem;">LIVE DATA • UPDATED TODAY</span>
                    <h1 class="display-5 fw-bold mt-1 mb-2">Rice Varieties</h1>
                    <p class="text-white-50 lead fs-6">Explore Cambodia's diverse rice varieties and market demand</p>
                </div>
                
                <!-- Stats Dashboard Display Right -->
                <div class="col-lg-4 d-flex justify-content-lg-end mt-4 mt-lg-0">
                    <div class="d-flex align-items-center bg-white bg-opacity-10 rounded p-3 text-center px-4">
                        <div class="px-3 stat-divider">
                            <h3 class="fw-bold text-warning m-0">6</h3>
                            <small class="text-white-50" style="font-size: 0.75rem;">Total Varieties</small>
                        </div>
                        <div class="px-3 stat-divider">
                            <h3 class="fw-bold text-warning m-0">3</h3>
                            <small class="text-white-50" style="font-size: 0.75rem;">High Demand</small>
                        </div>
                        <div class="px-3 ms-2">
                            <h3 class="fw-bold text-warning m-0">25</h3>
                            <small class="text-white-50" style="font-size: 0.75rem;">Provinces</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<!-- Filter & Options Controls Panel -->
    <div class="container my-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            
            <!-- Left Side Search Input -->
            <div class="d-flex align-items-center flex-grow-1 flex-md-grow-0" style="min-width: 260px;">
                <div class="position-relative w-100">
                    <input type="text" class="form-control search-filter-input" placeholder="Search varieties...">
                    <span class="position-absolute top-50 start-3 translate-middle-y text-muted">🔍</span>
                </div>
            </div>

            <!-- Scrollable Filter Chips -->
            <div class="d-flex gap-2 overflow-auto py-1 align-items-center">
                <button class="pill-filter active">All Types</button>
                <button class="pill-filter">Jasmine</button>
                <button class="pill-filter">Black Rice</button>
                
                <button class="pill-filter">Glutinous</button>
                <button class="pill-filter">Whole-Grain White</button>
                <button class="pill-filter">Brown Rice</button>
            </div>

            <!-- Sorting Dropdown Tool -->
            <div>
                <button class="dropdown-sort text-muted d-flex align-items-center gap-2">
                    <span>⚙️</span> Demand: High to Low <span>▼</span>
                </button>
            </div>
        </div>
    </div>
    <main class="container mb-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($varieties as $rice)
            <div class="col">
                <div class="card h-100 rice-card border-0 shadow-sm rounded-4 overflow-hidden">
                    <!-- Image Wrapper -->
                    <div class="card-img-wrapper position-relative">
                        <img src="{{ asset('images/ricetypes/' . $rice['img']) }}" class="card-img-top" alt="{{ $rice['name'] }}" style="height: 200px; object-fit: cover;">
                        <span class="badge-type position-absolute top-0 start-0 m-3 bg-success">{{ $rice['type'] }}</span>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Header: Name, Khmer, and Demand Badge -->
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h5 class="card-title fw-bold mb-0">{{ $rice['name'] }}</h5>
                                <p class="text-muted small mb-2">{{ $rice['khmer'] }} • {{ $rice['location'] }}</p>
                            </div>
                            <div class="text-center">
                                <span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill">{{ $rice['demand'] }}</span>
                                <div class="text-muted" style="font-size: 0.7rem;">Demand</div>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <p class="card-text text-muted small mb-4">{{ $rice['desc'] }}</p>
                        
                        <!-- Footer: Yield, Cycle, Season, Button -->
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <div class="text-center"><div class="fw-bold small">{{ $rice['yield'] }}</div><div class="text-muted" style="font-size: 0.7rem;">Yield</div></div>
                            <div class="text-center"><div class="fw-bold small">{{ $rice['cycle'] }}</div><div class="text-muted" style="font-size: 0.7rem;">Cycle</div></div>
                            <div class="text-center"><div class="fw-bold small">{{ $rice['season'] }}</div><div class="text-muted" style="font-size: 0.7rem;">Season</div></div>
                            <button class="btn btn-success btn-sm rounded-pill px-3">View Details</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection