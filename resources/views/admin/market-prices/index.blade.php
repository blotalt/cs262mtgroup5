@extends('layout')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0">Manage Market Prices</h2>
            <p class="text-muted m-0">Create, update, or remove live market records</p>
        </div>
        <a href="{{ route('admin.market-prices.create') }}" class="btn btn-success fw-semibold">
            + Add New Price
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-success">
                    <tr>
                        <th class="ps-3">Rice Variety</th>
                        <th>Type</th>
                        <th>Province</th>
                        <th>Market</th>
                        <th>Price/kg</th>
                        <th>Change</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prices as $price)
                        <tr>
                            <td class="ps-3 fw-bold">{{ $price->rice_variety }}</td>
                            <td><span class="text-muted small">{{ $price->rice_type }}</span></td>
                            <td>{{ $price->province }}</td>
                            <td>{{ $price->market }}</td>
                            <td class="fw-semibold">${{ number_format($price->price_per_kg, 2) }}</td>
                            <td>
                                @if($price->change_percent >= 0)
                                    <span class="text-success fw-bold">+{{ $price->change_percent }}%</span>
                                @else
                                    <span class="text-danger fw-bold">{{ $price->change_percent }}%</span>
                                @endif
                            </td>
                            <td class="text-end pe-3">
                                <a href="{{ route('admin.market-prices.edit', $price->id) }}"
                                   class="btn btn-sm btn-outline-secondary me-1">
                                    Edit
                                </a>
                                <button type="button"
                                        class="btn btn-sm btn-outline-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deletePriceModal{{ $price->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No market prices found. Click "+ Add New Price" to add one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @foreach($prices as $price)
            <div class="modal fade" id="deletePriceModal{{ $price->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title fw-bold">Delete Price</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center py-5">
                            <p class="fw-bold fs-4 mb-3">Delete this market price?</p>
                            <p class="text-muted fs-6 mb-0">This action cannot be undone.</p>
                        </div>
                        <div class="modal-footer border-0 justify-content-center gap-2">
                            <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('admin.market-prices.destroy', $price->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger px-4">Yes, Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>
@endsection