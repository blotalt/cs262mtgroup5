@extends('layout')

@section('hero')
<div class="bg-header-green text-white pb-5">
    <div class="container mt-0">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="text-warning fw-bold small" style="font-size: 0.8rem;">SECURE ADMINISTRATION PORTAL</span>
                <h1 class="display-5 fw-bold mt-1 mb-2">Manage Varieties</h1>
                <p class="text-white-50 lead fs-6">Create entries and control existing structural cards in real-time.</p>
                <a href="/variety" class="btn btn-outline-light btn-sm px-3 rounded-pill mt-2">← Back to Catalog</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row g-4">

            <div class="col-lg-5">
                <div class="rice-card p-4 shadow-sm bg-white rounded-4">
                    <span class="section-label bg-gold-subtle text-gold px-2 py-1 rounded small fw-bold mb-2 d-inline-block">DATABASE CREATE</span>
                    <h2 class="fw-bold mb-3">New Rice Variety</h2>

                    <form action="/create-variety" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Variety Standard Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Khmer Name</label>
                            <input type="text" class="form-control" name="khmer_name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Classification Category</label>
                            <select class="form-select" name="type" required>
                                <option selected disabled value="">Select rice type</option>
                                <option value="Jasmine">Jasmine</option>
                                <option value="Black Rice">Black Rice</option>
                                <option value="Whole-grain">Whole-grain</option>
                                <option value="Glutinous">Glutinous</option>
                                <option value="Brown Rice">Brown Rice</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Grow Regions / Provinces</label>
                            <input type="text" class="form-control" name="location" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Aromatic/Structural Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted">Avg Yield</label>
                                <input type="text" class="form-control" name="yield" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted">Life Cycle</label>
                                <input type="text" class="form-control" name="cycle" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-muted">Season</label>
                                <input type="text" class="form-control" name="season" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Market Export Demand</label>
                            <select class="form-select" name="demand" required>
                                <option selected disabled value="">Select demand rank</option>
                                <option value="Very High">Very High</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-muted">Display Cover Media</label>
                            <input type="file" class="form-control" name="image" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-gold w-100 fw-bold shadow-sm py-2">
                            Post!
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="mb-4">
                    <h2 class="fw-bold mb-1">Your Registered Entries</h2>
                    <p class="text-muted mb-0">Review and modify cards you have uploaded to the system registry.</p>
                </div>

                @forelse($myVarieties as $item)
                    <div class="rice-card p-3 mb-3 border bg-white rounded-4 shadow-sm">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded-3" alt="Image" style="height: 120px; width: 100%; object-fit: cover;">
                            </div>

                            <div class="col-md-8">
                                <div class="d-flex justify-content-between align-items-start gap-2">
                                    <div>
                                        <span class="badge bg-success mb-1">{{ $item->type }}</span>
                                        <h4 class="fw-bold mb-0 text-dark">{{ $item->name }}</h4>
                                        <p class="text-muted small mb-2">{{ $item->khmer_name }} • {{ $item->location }}</p>
                                        <div class="d-flex gap-3 text-muted" style="font-size: 0.8rem;">
                                            <span>🌾 {{ $item->yield }}</span>
                                            <span>⏱️ {{ $item->cycle }}</span>
                                            <span>☀️ {{ $item->season }}</span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column gap-2">
                                        <a href="/edit-variety/{{ $item->id }}" class="btn btn-warning btn-sm fw-bold">Edit</a>

                                        <button type="button"
                                                class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteVarietyModal{{ $item->id }}">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="rice-card p-5 text-center bg-light border-dashed rounded-4">
                        <h4 class="fw-bold text-muted mb-1">Workspace Portfolio Empty</h4>
                        <p class="text-muted small mb-0">Use the creation panel on the left to add entries under your account session.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</section>

@foreach($myVarieties as $item)
<div class="modal fade" id="deleteVarietyModal{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Delete Variety</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-5">
                <p class="fw-bold fs-4 mb-3">Delete this rice variety?</p>
                <p class="text-muted fs-6 mb-0">This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center gap-2">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                <form action="/delete-variety/{{ $item->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection