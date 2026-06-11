@extends('layout')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manage Market Prices</h2>

        <a href="{{ route('admin.market-prices.create') }}" class="btn btn-success">
            + Add New Price
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Rice Variety</th>
                <th>Type</th>
                <th>Province</th>
                <th>Market</th>
                <th>Price/kg</th>
                <th>Change %</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($prices as $price)
                <tr>
                    <td>{{ $price->rice_variety }}</td>
                    <td>{{ $price->rice_type }}</td>
                    <td>{{ $price->province }}</td>
                    <td>{{ $price->market }}</td>
                    <td>${{ $price->price_per_kg }}</td>
                    <td>{{ $price->change_percent }}%</td>

                    <td>
                        <a href="{{ route('admin.market-prices.edit', $price->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.market-prices.destroy', $price->id) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this record?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        No market prices found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection