@extends('layouts.app')

@section('content')
    <h1>Waste Records</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('wastes.create') }}" class="btn btn-primary">Create New Waste Record</a>
        <button class="btn btn-danger" onclick="deleteSelected()">Delete Selected</button>
    </div>

    <table class="table" id="wasteTable">
        <thead>
            <tr>
                <th>Select</th>
                <th>Waste ID</th>
                <th>Waste Name</th>
                <th>Waste Type</th>
                <th>Time Collected</th>
                <th>Mass Collected</th>
                <th>Area Collected</th>
                <th>Disposal Location</th>
                <th>Waste Category</th>
                <th>Other Description</th>
                <th>Remarks</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($waste as $record)
                <tr>
                    <td><input type="checkbox" name="selected[]" value="{{ $record->id }}"></td>
                    <td>{{ $record->WasteID }}</td>
                    <td contenteditable="true" data-id="{{ $record->id }}" data-field="WasteName" class="editable">{{ $record->WasteName }}</td>
                    <td>{{ $record->WasteType }}</td>
                    <td>{{ $record->TimeCollected }}</td>
                    <td>{{ $record->MassCollected }} kg</td>
                    <td>{{ $record->AreaCollected }}</td>
                    <td>{{ $record->DisposalLocation }}</td>
                    <td>{{ $record->WasteCategory }}</td>
                    <td>{{ $record->OtherDescription }}</td>
                    <td>
                        @if($record->Solid) Solid, @endif
                        @if($record->Liquid) Liquid, @endif
                        @if($record->Biodegradable) Biodegradable, @endif
                        @if($record->NonBiodegradable) Non-Biodegradable, @endif
                        @if($record->Recyclable) Recyclable, @endif
                        @if($record->Hazardous) Hazardous, @endif
                        @if($record->Corrosive) Corrosive, @endif
                        @if($record->Ignitable) Ignitable, @endif
                        @if($record->Reactive) Reactive, @endif
                        @if($record->Toxic) Toxic, @endif
                    </td>
                    <td>
                        <a href="{{ route('wastes.show', $record->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('wastes.edit', $record->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="deleteRecord({{ $record->id }})">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12">No waste records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Include your JavaScript scripts at the end of the file --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Your JavaScript code here...
    </script>
@endsection
