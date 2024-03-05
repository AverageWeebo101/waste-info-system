<div>
    <h1 class="display-3 text-center">Waste Records</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('wastes.create') }}" class="btn btn-primary">Create New Waste Record</a>
        <button class="btn btn-danger" wire:click="deleteSelected" wire:loading.attr="disabled" onclick="return confirm('Are you sure you want to delete selected records?')">Delete Selected</button>
    </div>

    <table class="table" id="wasteTable">
        <thead>
            <tr>
                <th data-sort="WasteID">Select</th>
                <th data-sort="WasteID">Waste ID</th>
                <th data-sort="WasteName">Waste Name</th>
                <th data-sort="WasteType">Waste Type</th>
                <th data-sort="TimeCollected">Time Collected</th>
                <th data-sort="MassCollected">Mass Collected</th>
                <th data-sort="AreaCollected">Area Collected</th>
                <th data-sort="DisposalLocation">Disposal Location</th>
                <th data-sort="WasteCategory">Waste Category</th>
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
                    <td contenteditable="false" data-id="{{ $record->id }}" data-field="WasteName" class="editable">{{ $record->WasteName }}</td>
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
                        <button class="btn btn-danger btn-sm" wire:click="deleteRecord({{ $record->id }})" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12">No waste records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $waste->links() }}

    {{-- Scripts Area --}}
    <script src="{{ asset('jquery-3.7.1.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#wasteTable').DataTable();
        });
    document.addEventListener('livewire:load', function () {
    Livewire.on('recordsDeleted', count => {
        alert(count + ' records deleted successfully!');
        
    });
});
    </script>
</div>
