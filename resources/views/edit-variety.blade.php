@extends('layout')

@section('content')
<div class="container py-5" style="max-width: 600px;">
    <div class="card p-4 shadow-sm border-0 rounded-4 bg-white">
        <h2 class="fw-bold mb-1">Edit Variety Portfolio</h2>
        <p class="text-muted mb-4 small">Modify properties for record collection: <strong>{{ $variety->name }}</strong></p>

        <form action="/edit-variety/{{ $variety->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label small fw-bold">Variety Name</label>
                <input type="text" class="form-control" name="name" value="{{ $variety->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold">Khmer Writing</label>
                <input type="text" class="form-control" name="khmer_name" value="{{ $variety->khmer_name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold">Classification Profile</label>
                <select class="form-select" name="type" required>
                    <option value="Jasmine" {{ $variety->type == 'Jasmine' ? 'selected' : '' }}>Jasmine</option>
                    <option value="Black Rice" {{ $variety->type == 'Black Rice' ? 'selected' : '' }}>Black Rice</option>
                    <option value="Whole-grain" {{ $variety->type == 'Whole-grain' ? 'selected' : '' }}>Whole-grain</option>
                    <option value="Glutinous" {{ $variety->type == 'Glutinous' ? 'selected' : '' }}>Glutinous</option>
                    <option value="Brown Rice" {{ $variety->type == 'Brown Rice' ? 'selected' : '' }}>Brown Rice</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold">Cultivation Location</label>
                <input type="text" class="form-control" name="location" value="{{ $variety->location }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold">Description Details</label>
                <textarea class="form-control" name="description" rows="3">{{ $variety->description }}</textarea>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md-4">
                    <label class="form-label small fw-bold">Yield</label>
                    <input type="text" class="form-control" name="yield" value="{{ $variety->yield }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold">Cycle</label>
                    <input type="text" class="form-control" name="cycle" value="{{ $variety->cycle }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold">Season</label>
                    <input type="text" class="form-control" name="season" value="{{ $variety->season }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold">Market Demand</label>
                <select class="form-select" name="demand" required>
                    <option value="Very High" {{ $variety->demand == 'Very High' ? 'selected' : '' }}>Very High</option>
                    <option value="High" {{ $variety->demand == 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ $variety->demand == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ $variety->demand == 'Low' ? 'selected' : '' }}>Low</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label small fw-bold d-block">Media Cover Image (Leave blank to keep current)</label>
                <input type="file" class="form-control" name="image" accept="image/*">
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-gold px-4 fw-bold">Save Dynamic Matrix</button>
                <a href="/manage-varieties" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection