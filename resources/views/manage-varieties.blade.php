@extends('layout')

@section('hero')
<div class="bg-header-green text-white pb-5">
    <div class="container mt-0">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="text-warning fw-bold small" style="font-size: 0.8rem;">
                    LIVE DATA • UPDATED TODAY
                </span>
                <h1 class="display-5 fw-bold mt-1 mb-2">Rice Varieties</h1>
                <p class="text-white-50 lead fs-6">
                    Manage Cambodia's diverse rice varieties and market demand
                </p>
            </div>

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

{{--
OLD HARD-CODED VARIETY PAGE CODE WAS HERE

The previous version used:
- @php $varieties = [...]
- $paginatedVarieties
- @foreach($paginatedVarieties as $rice)
- hard-coded card display
- pagination buttons

It was removed from display so the new CRUD-style interface can show.
--}}

<section class="py-5">
    <div class="container">
        <div class="row g-4">

            <!-- Create Variety Form -->
            <div class="col-lg-5">
                <div class="rice-card p-4">
                    <span class="section-label">Create Variety</span>
                    <h2 class="fw-bold mb-3">New Rice Variety</h2>

                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input
                            type="text"
                            class="form-control mb-3"
                            name="name"
                            placeholder="Rice name"
                        >

                        <input
                            type="text"
                            class="form-control mb-3"
                            name="khmer_name"
                            placeholder="Khmer name"
                        >

                        <select class="form-select mb-3" name="type">
                            <option selected disabled>Select rice type</option>
                            <option>Jasmine</option>
                            <option>Black Rice</option>
                            <option>Whole-grain</option>
                            <option>Glutinous</option>
                            <option>Brown Rice</option>
                        </select>

                        <input
                            type="text"
                            class="form-control mb-3"
                            name="location"
                            placeholder="Province / Location"
                        >

                        <textarea
                            class="form-control mb-3"
                            name="description"
                            rows="4"
                            placeholder="Description"
                        ></textarea>

                        <div class="row g-2">
                            <div class="col-md-4">
                                <input
                                    type="text"
                                    class="form-control mb-3"
                                    name="yield"
                                    placeholder="Yield"
                                >
                            </div>

                            <div class="col-md-4">
                                <input
                                    type="text"
                                    class="form-control mb-3"
                                    name="cycle"
                                    placeholder="Cycle"
                                >
                            </div>

                            <div class="col-md-4">
                                <input
                                    type="text"
                                    class="form-control mb-3"
                                    name="season"
                                    placeholder="Season"
                                >
                            </div>
                        </div>

                        <select class="form-select mb-3" name="demand">
                            <option selected disabled>Select demand</option>
                            <option>Very High</option>
                            <option>High</option>
                            <option>Medium</option>
                            <option>Low</option>
                        </select>

                        <input
                            type="file"
                            class="form-control mb-3"
                            name="image"
                        >

                        <button type="submit" class="btn btn-gold">
                            Add Variety
                        </button>
                    </form>
                </div>
            </div>

            <!-- Existing Varieties CRUD Display -->
            <div class="col-lg-7">
                <div class="mb-4">
                    <h2 class="fw-bold mb-1">Existing Varieties</h2>
                    <p class="text-muted mb-0">
                        Preview and manage rice variety cards.
                    </p>
                </div>

                <div class="rice-card p-3 mb-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <img
                                src="{{ asset('images/ricetypes/jasmine.png') }}"
                                class="img-fluid rounded"
                                alt="Phka Rumduol"
                            >
                        </div>

                        <div class="col-md-8">
                            <div class="d-flex justify-content-between gap-3">
                                <div>
                                    <span class="badge bg-success mb-2">Jasmine</span>

                                    <h4 class="fw-bold mb-1">
                                        Phka Rumduol
                                    </h4>

                                    <p class="text-muted small mb-2">
                                        ផ្ការំដួល • Takeo, Kampong Speu
                                    </p>

                                    <p class="text-muted mb-3">
                                        Cambodia's most prized aromatic variety, awarded World's Best Rice multiple times.
                                    </p>

                                    <div class="d-flex flex-wrap gap-3 small fw-semibold">
                                        <span>3.2 t/ha Yield</span>
                                        <span>155 days Cycle</span>
                                        <span>Wet Season</span>
                                    </div>
                                </div>

                                <div class="d-flex flex-column gap-2">
                                    <a href="#" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <button type="button" class="btn btn-outline-danger btn-sm">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rice-card p-3 mb-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <img
                                src="{{ asset('images/ricetypes/blackrice.jpg') }}"
                                class="img-fluid rounded"
                                alt="Neab Dam"
                            >
                        </div>

                        <div class="col-md-8">
                            <div class="d-flex justify-content-between gap-3">
                                <div>
                                    <span class="badge bg-dark mb-2">Black Rice</span>

                                    <h4 class="fw-bold mb-1">
                                        Neab Dam
                                    </h4>

                                    <p class="text-muted small mb-2">
                                        នាងដំ • Kampong Thom
                                    </p>

                                    <p class="text-muted mb-3">
                                        Traditional Cambodian black rice with deep purple bran layer.
                                    </p>

                                    <div class="d-flex flex-wrap gap-3 small fw-semibold">
                                        <span>2.8 t/ha Yield</span>
                                        <span>148 days Cycle</span>
                                        <span>Dry Season</span>
                                    </div>
                                </div>

                                <div class="d-flex flex-column gap-2">
                                    <a href="#" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <button type="button" class="btn btn-outline-danger btn-sm">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rice-card p-3 mb-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <img
                                src="{{ asset('images/ricetypes/redrice.png') }}"
                                class="img-fluid rounded"
                                alt="Phka Rumdeng"
                            >
                        </div>

                        <div class="col-md-8">
                            <div class="d-flex justify-content-between gap-3">
                                <div>
                                    <span class="badge bg-danger mb-2">Whole-grain</span>

                                    <h4 class="fw-bold mb-1">
                                        Phka Rumdeng
                                    </h4>

                                    <p class="text-muted small mb-2">
                                        ផ្ការំដេង • Takeo, Battambang, Siem Reap
                                    </p>

                                    <p class="text-muted mb-3">
                                        Whole-grain red rice with a reddish-brown hue from the outer bran layer.
                                    </p>

                                    <div class="d-flex flex-wrap gap-3 small fw-semibold">
                                        <span>3.2 t/ha Yield</span>
                                        <span>155 days Cycle</span>
                                        <span>Dry Season</span>
                                    </div>
                                </div>

                                <div class="d-flex flex-column gap-2">
                                    <a href="#" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <button type="button" class="btn btn-outline-danger btn-sm">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rice-card p-5 text-center">
                    <h4 class="fw-bold">Backend Ready</h4>
                    <p class="text-muted mb-0">
                        Backend can later connect this form and replace the sample cards with database records.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection