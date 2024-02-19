@extends('layouts.app')

@section('content')
    <h1>Location Facilities Records</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('wastes_location.create') }}" class="btn btn-primary">Create New Location Facility Record</a>
        <button class="btn btn-danger" onclick="deleteSelected()">Delete Selected</button>
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
                    <td><input type="checkbox" name="selected[]" value="{{ $facility->id }}"></td>
                    <td>{{ $facility->facility_id }}</td>
                    <td>{{ $facility->facility_name }}</td>
                    <td>{{ $facility->facility_address }}</td>
                    <td>
                        <span class="@php echo getStatusColorClass($facility->facility_status); @endphp">{{ $facility->facility_status }}</span>
                    </td>
                    <td>
                        <a href="{{ route('wastes_location.show', $facility->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('wastes_location.edit', $facility->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="deleteRecord({{ $facility->id }})">Delete</button>
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
        });

        // Delete Selected 
        function deleteSelected() {
            var selectedIds = $('input[name="selected[]"]:checked').map(function(){
                return $(this).val();
            }).get();

            if (selectedIds.length === 0) {
                alert('Please select at least one record to delete.');
                return;
            }

            if (confirm('Are you sure you want to delete selected records?')) {
                $.ajax({
                    url: '{{ route('wastes_location.deleteSelected') }}',
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "selectedIds": selectedIds
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Error deleting selected records.');
                    }
                });
            }
        }
        //Delete Individual
            function deleteRecord(facilityId) {
        if (confirm('Are you sure you want to delete this record?')) {
            $.ajax({
                url: '{{ route('wastes_location.destroy', ['id' => $facility->id]) }}',
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response); 
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    console.error(xhr); 
                    alert('Error deleting the record.');
                }
            });
        }
    }

        // Function to get status color class
        @php
            function getStatusColorClass($status) {
                switch ($status) {
                    case 'Active':
                        return 'text-success';
                    case 'Under Maintenance':
                        return 'text-warning';
                    case 'Under Renovation':
                        return 'text-info';
                    case 'Temporarily Closed':
                        return 'text-secondary';
                    case 'Permanently Closed':
                        return 'text-danger';
                    case 'Demolished':
                        return 'text-dark';
                    default:
                        return '';
                }
            }
        @endphp
    </script>
@endsection
