@extends('layout')

@section('hero')
    <div class="bg-header-green text-white pb-5 pt-4">
        <div class="container mt-0">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="section-label">Live Data · Updated Today</span>
                    <h1 class="display-5 fw-bold mt-1 mb-2" style="font-family: Georgia, serif;">Market Prices</h1>
                    <p class="text-white-50 lead fs-6">Track daily Cambodian rice prices from provincial markets, farmers markets, and more...</p>
                </div>
            </div>
        </div>  
    </div>
@endsection

@section('content')
<section class="prices-section py-5">
    <div class="container">
        <h2 class="fw-bold mb-1">Latest Market Prices</h2>
        <p class="text-muted mb-4">Updated daily from 25 provincial markets</p>

        <div class="price-table-wrapper rounded-3 shadow-sm overflow-hidden">
            <table class="table table-hover price-table mb-0">
                <thead>
                    <tr>
                        <th>Rice Variety</th>
                        <th>Province</th>
                        <th>Market</th>
                        <th>Price / kg</th>
                        <th>Change</th>
                        <th>Updated</th>
                    </tr>
                </thead>

                <tbody>
@forelse($prices as $price)
    <tr>
        <td>
            <div class="rice-name">{{ $price->rice_variety }}</div>
            <div class="rice-type">{{ $price->rice_type }}</div>
        </td>
        <td>{{ $price->province }}</td>
        <td>{{ $price->market }}</td>
        <td class="price-value">${{ $price->price_per_kg }}</td>
        <td class="{{ $price->change_percent >= 0 ? 'price-up' : 'price-down' }}">
            {{ $price->change_percent >= 0 ? '+' : '' }}{{ $price->change_percent }}%
        </td>
        <td>Today</td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">No prices available yet.</td>
    </tr>
@endforelse
</tbody>
            </table>
        </div>
    </div>
</section>
@endsection