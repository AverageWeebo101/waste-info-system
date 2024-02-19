<!-- resources/views/wastes_location/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Location Facility Details</h1>

    <div class="mb-3">
        <a href="{{ route('wastes_location.index') }}" class="btn btn-secondary">Return</a>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <th>Facility ID</th>
                <td>{{ $facility->facility_id }}</td>
            </tr>
            <tr>
                <th>Facility Name</th>
                <td>{{ $facility->facility_name }}</td>
            </tr>
            <tr>
                <th>Facility Address</th>
                <td>{{ $facility->facility_address }}</td>
            </tr>
            <tr>
                <th>Facility Description</th>
                <td>{{ $facility->facility_description }}</td>
            </tr>
            <tr>
                <th>Facility Status</th>
                <td>{{ $facility->facility_status }}</td>
            </tr>
            <tr>
                <th>Last Updated</th>
                <td>{{ $facility->updated_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            <tr>
                <th>Date Added</th>
                <td>{{ $facility->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        </tbody>
    </table>
@endsection
