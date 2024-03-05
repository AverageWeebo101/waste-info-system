<div> 
    <h1 class="display-3 text-center">Location Facilities Records</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('wastes_location.create') }}" class="btn btn-primary">Create New Location Facility Record</a>
        <button class="btn btn-danger btn-sm" wire:click="deleteSelected" onclick="return confirm('Are you sure you want to delete selected records?')">Delete Selected</button>
        <input type="checkbox" id="selectAll" wire:model="selectAll"> <label for="selectAll">Select All</label>
    </div>

    <table class="table" id="facilityTable">
        <thead>
            <tr>
                <th data-sort="facility_id">Select</th>
                <th data-sort="facility_id">Facility ID</th>
                <th data-sort="facility_name">Facility Name</th>
                <th data-sort="facility_address">Facility Address</th>
                <th data-sort="facility_status">Facility Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($facilities as $facility)
                <tr>
                    <td><input type="checkbox" wire:model="selectedIds" value="{{ $facility->id }}"></td>
                    <td>{{ $facility->facility_id }}</td>
                    <td>{{ $facility->facility_name }}</td>
                    <td>{{ $facility->facility_address }}</td>
                    <td>
                        <span class="{{ getStatusColorClass($facility->facility_status) }}">{{ $facility->facility_status }}</span>
                    </td>
                    <td>
                        <a href="{{ route('wastes_location.show', $facility->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('wastes_location.edit', $facility->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <button class="btn btn-danger btn-sm" wire:click="deleteRecord({{ $facility->id }})" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                       
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No location facility records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

        {{-- Scripts Area --}}
    <script src="{{ asset('jquery-3.7.1.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#facilityTable').DataTable();

            $('#selectAll').change(function () {
                var isChecked = $(this).prop('checked');
                $('input[name="selectedIds"]').prop('checked', isChecked);
                @this.set('selectedIds', isChecked ? @json($facilities->pluck('id')->toArray()) : []);
            });

            Livewire.on('recordsDeleted', count => {
                alert(count + ' records deleted successfully!');
                location.reload();
            });

            Livewire.on('recordDeleted', id => {
                alert('Record with ID ' + id + ' deleted successfully!');
            });
        });
    </script>

</div>
