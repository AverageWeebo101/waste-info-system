<!-- resources/views/wastes_location/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create New Location Facility Record</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('wastes_location.store') }}">
        @csrf

        <div class="mb-3">
            <label for="facility_id" class="form-label">Facility ID</label>
            <input type="text" class="form-control" id="facility_id" name="facility_id" required>
        </div>

        <div class="mb-3">
            <label for="facility_name" class="form-label">Facility Name</label>
            <input type="text" class="form-control" id="facility_name" name="facility_name" required>
        </div>

        <div class="mb-3">
            <label for="facility_address" class="form-label">Facility Address</label>
            <input type="text" class="form-control" id="facility_address" name="facility_address" required>
        </div>

        <div class="mb-3">
            <label for="facility_description" class="form-label">Facility Description</label>
            <textarea class="form-control" id="facility_description" name="facility_description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="facility_status" class="form-label">Facility Status</label>
            <select class="form-select" id="facility_status" name="facility_status" required>
                <option value="Active">Active</option>
                <option value="Under Maintenance">Under Maintenance</option>
                <option value="Under Renovation">Under Renovation</option>
                <option value="Temporarily Closed">Temporarily Closed</option>
                <option value="Permanently Closed">Permanently Closed</option>
                <option value="Demolished">Demolished</option>
            </select>
        </div>

        <!-- Add more fields as needed -->

        <button type="submit" class="btn btn-primary">Create Location Facility Record</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('wastes_location.index') }}" class="btn btn-secondary">Return</a>
    </div>
@endsection
