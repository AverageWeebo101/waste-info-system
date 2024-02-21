<!-- Work in Progress -->

@extends('layouts.app')

@section('content')
    <h1>Edit Waste Record</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('wastes.update', $waste->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="WasteID" class="form-label">Waste ID</label>
            <input type="text" class="form-control" id="WasteID" name="WasteID" value="{{ $waste->WasteID }}" required>
        </div>

        <div class="mb-3">
            <label for="WasteName" class="form-label">Waste Name</label>
            <input type="text" class="form-control" id="WasteName" name="WasteName" value="{{ $waste->WasteName }}" required>
        </div>
        <div class="mb-3">
            <label for="WasteType" class="form-label">Waste Type</label>
            <input type="text" class="form-control" id="WasteType" name="WasteType" value="{{ $waste->WasteType }}" required>
        </div>

        <div class="mb-3">
            <label for="TimeCollected" class="form-label">Time Collected</label>
            <input type="datetime-local" class="form-control" id="TimeCollected" name="TimeCollected" value="{{ \Carbon\Carbon::parse($waste->TimeCollected)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="MassCollected" class="form-label">Mass Collected</label>
            <input type="number" class="form-control" id="MassCollected" name="MassCollected" value ="{{ $waste-> MassCollected }}" required>
        </div>

        <div class="mb-3">
            <label for="AreaCollected" class="form-label">Area Collected</label>
            <input type="text" class="form-control" id="AreaCollected" name="AreaCollected" value = "{{ $waste-> AreaCollected }}" required>
        </div>

        <div class="mb-3">
            <label for="DisposalLocation" class="form-label">Disposal Location</label>
            <input type="text" class="form-control" id="DisposalLocation" name="DisposalLocation" value = "{{ $waste-> DisposalLocation }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Solid" name="Solid" value="1" {{ $waste->Solid ? 'checked' : '' }}>
            <label class="form-check-label" for="Solid">Solid</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Liquid" name="Liquid" value="1" {{ $waste->Liquid ? 'checked' : '' }}>
            <label class="form-check-label" for="Liquid">Liquid</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Biodegradable" name="Biodegradable" value="1" {{ $waste->Biodegradable ? 'checked' : '' }}>
            <label class="form-check-label" for="Biodegradable">Biodegradable</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="NonBiodegradable" name="NonBiodegradable" value="1" {{ $waste->NonBiodegradable ? 'checked' : '' }}>
            <label class="form-check-label" for="NonBiodegradable">Non-Biodegradable</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Recyclable" name="Recyclable" value="1" {{ $waste->Recyclable ? 'checked' : '' }}>
            <label class="form-check-label" for="Recyclable">Recyclable</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Hazardous" name="Hazardous" value="1" {{ $waste->Hazardous ? 'checked' : '' }}>
            <label class="form-check-label" for="Hazardous">Hazardous</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Corrosive" name="Corrosive" value="1" {{ $waste->Corrosive ? 'checked' : '' }}>
            <label class="form-check-label" for="Corrosive">Corrosive</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Ignitable" name="Ignitable" value="1" {{ $waste->Ignitable ? 'checked' : '' }}>
            <label class="form-check-label" for="Ignitable">Ignitable</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Reactive" name="Reactive" value="1" {{ $waste->Reactive ? 'checked' : '' }}>
            <label class="form-check-label" for="Reactive">Reactive</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Toxic" name="Toxic" value="1" {{ $waste->Toxic ? 'checked' : '' }}>
            <label class="form-check-label" for="Toxic">Toxic</label>
        </div>
        <div class="mb-3">
            <label for="WasteCategory" class="form-label">Waste Category</label>
            <input type="text" class="form-control" id="WasteCategory" name="WasteCategory" value="{{ $waste->WasteCategory }}">
        </div>

        <div class="mb-3">
            <label for="OtherDescription" class="form-label">Other Description</label>
            <input type="text" class="form-control" id="OtherDescription" name="OtherDescription" value="{{ $waste->OtherDescription }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Waste Record</button>
    </form>

    <a href="{{ route('wastes.index') }}" class="btn btn-secondary mt-3">Back to Waste Records</a>
@endsection
