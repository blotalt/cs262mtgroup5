@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Market Price</h2>

    <form action="{{ route('admin.market-prices.update', $marketPrice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Rice Variety</label>
            <input type="text" name="rice_variety"
                   value="{{ $marketPrice->rice_variety }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Rice Type</label>
            <input type="text" name="rice_type"
                   value="{{ $marketPrice->rice_type }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Province</label>
            <input type="text" name="province"
                   value="{{ $marketPrice->province }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Market</label>
            <input type="text" name="market"
                   value="{{ $marketPrice->market }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price per kg</label>
            <input type="number" step="0.01"
                   name="price_per_kg"
                   value="{{ $marketPrice->price_per_kg }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Change %</label>
            <input type="number" step="0.01"
                   name="change_percent"
                   value="{{ $marketPrice->change_percent }}"
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-warning">
            Update
        </button>
    </form>
</div>
@endsection