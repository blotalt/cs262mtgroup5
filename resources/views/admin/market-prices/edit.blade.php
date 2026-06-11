@extends('layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="mb-3">
                <a href="{{ route('admin.market-prices.index') }}" class="text-decoration-none text-muted small">
                    ← Back to Price Management
                </a>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    
                    <h2 class="fw-bold mb-1">Edit Market Price</h2>
                    <p class="text-muted mb-4">Update the pricing and location details for this record.</p>

                    <form action="{{ route('admin.market-prices.update', $marketPrice->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-secondary">Rice Variety</label>
                                <input type="text" name="rice_variety"
                                       value="{{ $marketPrice->rice_variety }}"
                                       class="form-control" placeholder="e.g., Phka Rumduol" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-secondary">Rice Type</label>
                                <input type="text" name="rice_type"
                                       value="{{$marketPrice->rice_type }}"
                                       class="form-control" placeholder="e.g., Jasmine Rice" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-secondary">Province</label>
                                <input type="text" name="province"
                                       value="{{ $marketPrice->province }}"
                                       class="form-control" placeholder="e.g., Takeo" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-secondary">Market Name</label>
                                <input type="text" name="market"
                                       value="{{ $marketPrice->market }}"
                                       class="form-control" placeholder="e.g., Central Market" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold text-secondary">Price per kg ($)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted">$</span>
                                    <input type="number" step="0.01" name="price_per_kg"
                                           value="{{ $marketPrice->price_per_kg }}"
                                           class="form-control" placeholder="0.00" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold text-secondary">Change (%)</label>
                                <div class="input-group">
                                    <input type="number" step="0.01" name="change_percent"
                                           value="{{ $marketPrice->change_percent }}"
                                           class="form-control" placeholder="0.00">
                                    <span class="input-group-text bg-light text-muted">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-3 border-top pt-4">
                            <button type="submit" class="btn btn-success fw-semibold px-4">
                                Save Changes
                            </button>
                            <a href="{{ route('admin.market-prices.index') }}" class="btn btn-outline-secondary px-4">
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection