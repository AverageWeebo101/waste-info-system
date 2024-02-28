@extends('layouts.app')

@section('content')
    <h1>Waste Record Details</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('wastes.edit', $waste->id) }}" class="btn btn-warning">Edit Waste Record</a>
        <a href="{{ route('wastes.index') }}" class="btn btn-primary">Back to Waste Records</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Waste ID</td>
                <td>{{ $waste->WasteID }}</td>
            </tr>
            <tr>
                <td>Waste Name</td>
                <td>{{ $waste->WasteName }}</td>
            </tr>
            <tr>
                <td>Waste Type</td>
                <td>{{ $waste->WasteType }}</td>
            </tr>
            <tr>
                <td>Time Collected</td>
                <td>{{ $waste->TimeCollected }}</td>
            </tr>
            <tr>
                <td>Mass Collected</td>
                <td>{{ $waste->MassCollected }}</td>
            </tr>
            <tr>
                <td>Area Collected</td>
                <td>{{ $waste->AreaCollected }}</td>
            </tr>
            <tr>
                <td>Disposal Location</td>
                <td>{{ $waste->DisposalLocation }}</td>
            </tr>
            <tr>
                <td>Solid</td>
                <td>{{ $waste->Solid ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Liquid</td>
                <td>{{ $waste->Liquid ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Biodegradable</td>
                <td>{{ $waste->Biodegradable ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Non-Biodegradable</td>
                <td>{{ $waste->NonBiodegradable ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Recyclable</td>
                <td>{{ $waste->Recyclable ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Hazardous</td>
                <td>{{ $waste->Hazardous ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Corrosive</td>
                <td>{{ $waste->Corrosive ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Ignitable</td>
                <td>{{ $waste->Ignitable ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Reactive</td>
                <td>{{ $waste->Reactive ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Toxic</td>
                <td>{{ $waste->Toxic ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Disposal Location</td>
                <td>{{ $waste->DisposalLocation }}</td>
            </tr>
            <tr>
                <td>Other Description</td>
                <td>{{ $waste->OtherDescription }}</td>
            </tr>
            <tr>
                <td>Created At</td>
                <td>{{ $waste->created_at }}</td>
            </tr>
            <tr>
                <td>Updated At</td>
                <td>{{ $waste->updated_at }}</td>
            </tr>
            <!-- Add more fields as needed -->
        </tbody>
    </table>
@endsection
