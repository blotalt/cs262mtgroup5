@extends('layout')

@section('hero')
    <div class="bg-header-green text-white pb-5">
        <div class="container mt-0">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="text-warning fw-bold small tracking-wider" style="font-size: 0.8rem;">LIVE DATA • DATABASE CONNECTED</span>
                    <h1 class="display-5 fw-bold mt-1 mb-2">Rice Varieties</h1>
                    <p class="text-white-50 lead fs-6">Explore Cambodia's diverse rice varieties and market demand</p>
                    @auth
                        <a href="/manage-varieties" class="btn btn-warning btn-sm fw-bold px-3 rounded-pill mt-2">⚙️ Open Management Workspace</a>
                    @endauth
                </div>
                
                <div class="col-lg-4 d-flex justify-content-lg-end mt-4 mt-lg-0">
                    <div class="d-flex align-items-center bg-white bg-opacity-10 rounded p-3 text-center px-4">
                        <div class="px-3 stat-divider">
                            <h3 class="fw-bold text-warning m-0">{{ $totalCount }}</h3>
                            <small class="text-white-50" style="font-size: 0.75rem;">Total Varieties</small>
                        </div>
                        <div class="px-3 stat-divider">
                            <h3 class="fw-bold text-warning m-0">{{ $highDemandCount }}</h3>
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
    <div class="container my-4">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="d-flex align-items-center flex-grow-1 flex-md-grow-0" style="min-width: 260px;">
                <div class="position-relative w-100">
                    <input type="text" class="form-control search-filter-input" placeholder="Search varieties...">
                    <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-black-50 d-flex align-items-center"
                            style="pointer-events: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </span>
                </div>
            </div>

            {{-- <div class="d-flex gap-2 overflow-auto py-1 align-items-center">
                <button class="pill-filter active">All Types</button>
                <button class="pill-filter">Jasmine</button>
                <button class="pill-filter">Black Rice</button>
                <button class="pill-filter">Glutinous</button>
                <button class="pill-filter">Whole-Grain White</button>
                <button class="pill-filter">Brown Rice</button>
            </div> --}}
<div class="d-flex gap-2 overflow-auto py-1 align-items-center">
    <a href="/variety" class="pill-filter text-decoration-none {{ !request('type') ? 'active' : '' }}">All Types</a>
    <a href="/variety?type=Jasmine" class="pill-filter text-decoration-none {{ request('type') == 'Jasmine' ? 'active' : '' }}">Jasmine</a>
    <a href="/variety?type=Black Rice" class="pill-filter text-decoration-none {{ request('type') == 'Black Rice' ? 'active' : '' }}">Black Rice</a>
    <a href="/variety?type=Glutinous" class="pill-filter text-decoration-none {{ request('type') == 'Glutinous' ? 'active' : '' }}">Glutinous</a>
    <a href="/variety?type=Whole-Grain White" class="pill-filter text-decoration-none {{ request('type') == 'Whole-Grain White' ? 'active' : '' }}">Whole-Grain White</a>
    <a href="/variety?type=Brown Rice" class="pill-filter text-decoration-none {{ request('type') == 'Brown Rice' ? 'active' : '' }}">Brown Rice</a>
</div>


           <div>
    <a href="/variety?type={{ request('type') }}&sort={{ request('sort') == 'az' ? 'za' : 'az' }}"
       class="dropdown-sort text-decoration-none d-flex align-items-center gap-2 {{ request('sort') ? 'active' : '' }}">
        <span>⚙️</span> Sort: {{ request('sort') == 'za' ? 'Z–A' : 'A–Z' }} <span>▼</span>
    </a>
</div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($varieties as $rice)
                <div class="col">
                    <div class="card h-100 rice-card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="card-img-wrapper position-relative">
                            <img src="{{ asset('storage/' . $rice->image) }}" class="card-img-top" alt="{{ $rice->name }}" style="height: 200px; object-fit: cover;">
                            <span class="badge-type position-absolute top-0 start-0 m-3 bg-success">{{ $rice->type }}</span>
                        </div>
                        
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h5 class="card-title fw-bold mb-0">{{ $rice->name }}</h5>
                                    <p class="text-muted small mb-2">{{ $rice->khmer_name }} • {{ $rice->location }}</p>
                                </div>
                                <div class="text-center">
                                    <span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill">{{ $rice->demand }}</span>
                                    <div class="text-muted" style="font-size: 0.7rem;">Demand</div>
                                </div>
                            </div>
                            
                            <p class="card-text text-muted small mb-4">{{ $rice->description }}</p>
                            
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <div class="text-center"><div class="fw-bold small">{{ $rice->yield }}</div><div class="text-muted" style="font-size: 0.7rem;">Yield</div></div>
                                <div class="text-center"><div class="fw-bold small">{{ $rice->cycle }}</div><div class="text-muted" style="font-size: 0.7rem;">Cycle</div></div>
                                <div class="text-center"><div class="fw-bold small">{{ $rice->season }}</div><div class="text-muted" style="font-size: 0.7rem;">Season</div></div>
                                <button class="btn btn-success btn-sm rounded-pill px-3">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted lead">No rice varieties have been uploaded to the registry yet.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $varieties->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection