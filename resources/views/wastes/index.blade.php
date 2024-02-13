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
    <script src="{{ asset('jquery-3.7.1.js') }}"></script>
    <script>
         var sortOrder = {};

         // Sort table on header click
        $('table th').on('click', function() {
            var column = $(this).data('sort');
            if (!sortOrder[column]) {
                sortOrder[column] = 'asc';
            } else {
                sortOrder[column] = sortOrder[column] === 'asc' ? 'desc' : 'asc';
            }

            sortTable(column, sortOrder[column]);
        });

        // Sort table function
        function sortTable(column, order) {
            var rows = $('table tbody tr').get();

            rows.sort(function(a, b) {
                var keyA = $(a).children('td').eq(getColumnIndex(column)).text();
                var keyB = $(b).children('td').eq(getColumnIndex(column)).text();

                if (order === 'asc') {
                    return (keyA > keyB) ? 1 : -1;
                } else {
                    return (keyA < keyB) ? 1 : -1;
                }
            });

            $.each(rows, function(index, row) {
                $('table tbody').append(row);
            });
        }

        // Get column index by name
        function getColumnIndex(columnName) {
            var index = -1;
            $('table th').each(function(i) {
                if ($(this).data('sort') === columnName) {
                    index = i;
                    return false;
                }
            });
            return index;
        }

        // Sort table function
        function sortTable(column, order) {
            var rows = $('table tbody tr').get();

            rows.sort(function(a, b) {
                var keyA = $(a).children('td').eq(getColumnIndex(column)).text();
                var keyB = $(b).children('td').eq(getColumnIndex(column)).text();

                if (order === 'asc') {
                    return (keyA > keyB) ? 1 : -1;
                } else {
                    return (keyA < keyB) ? 1 : -1;
                }
            });

            $.each(rows, function(index, row) {
                $('table tbody').append(row);
            });
        }

        // Get column index by name
        function getColumnIndex(columnName) {
            var index = -1;
            $('table th').each(function(i) {
                if ($(this).data('sort') === columnName) {
                    index = i;
                    return false;
                }
            });
            return index;
        }

        // Delete selected records
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
                    url: '{{ route('wastes.deleteSelected') }}',
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

        // Delete individual record
        function deleteRecord(WasteID) {
            if (confirm('Are you sure you want to delete this record?')) {
                $.ajax({
                    url: '/wastes/' + WasteID,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Error deleting the record.');
                    }
                });
            }
        }
    </script>
    <script>
        $(document).ready( function () {
            $('#wasteTable').DataTable();
    });
    </script>
@endsection
