@extends('layouts.app')

@section('content')
    <h1>Edit Location Facility Record</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('wastes_location.update', $facility->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="facility_id" class="form-label">Facility ID</label>
            <input type="text" class="form-control" id="facility_id" name="facility_id" value="{{ $facility->facility_id }}" required>
        </div>

        <div class="mb-3">
            <label for="facility_name" class="form-label">Facility Name</label>
            <input type="text" class="form-control" id="facility_name" name="facility_name" value="{{ $facility->facility_name }}" required>
        </div>

        <div class="mb-3">
            <label for="facility_address" class="form-label">Facility Address</label>
            <input type="text" class="form-control" id="facility_address" name="facility_address" value="{{ $facility->facility_address }}" required>
        </div>

        <div class="mb-3">
            <label for="facility_description" class="form-label">Facility Description</label>
            <textarea class="form-control" id="facility_description" name="facility_description" rows="3">{{ $facility->facility_description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="facility_status" class="form-label">Facility Status</label>
            <select class="form-select" id="facility_status" name="facility_status" required>
                <option value="Active" {{ $facility->facility_status === 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Under Maintenance" {{ $facility->facility_status === 'Under Maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                <option value="Under Renovation" {{ $facility->facility_status === 'Under Renovation' ? 'selected' : '' }}>Under Renovation</option>
                <option value="Temporarily Closed" {{ $facility->facility_status === 'Temporarily Closed' ? 'selected' : '' }}>Temporarily Closed</option>
                <option value="Permanently Closed" {{ $facility->facility_status === 'Permanently Closed' ? 'selected' : '' }}>Permanently Closed</option>
                <option value="Demolished" {{ $facility->facility_status === 'Demolished' ? 'selected' : '' }}>Demolished</option>
            </select>
        </div>

        <button type="submit" class="btn-blue">Update Location Facility Record</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('wastes_location.index') }}" class="btn btn-secondary">Return</a>
    </div>
@endsection
