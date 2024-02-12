@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-semibold mb-4">Waste Table</h1>

    <!-- Display success or error messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Button to create new entry -->
    <a href="{{ route('waste.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md mb-4">Create New Entry</a>

    <!-- Table to display waste entries -->
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border px-4 py-2">Waste ID</th>
                <th class="border px-4 py-2">Waste Name</th>
                <th class="border px-4 py-2">Waste Type</th>
                <!-- Add other columns as needed -->
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wastes as $waste)
                <tr>
                    <td class="border px-4 py-2">{{ $waste->WasteID }}</td>
                    <td class="border px-4 py-2">{{ $waste->WasteName }}</td>
                    <td class="border px-4 py-2">{{ $waste->WasteType }}</td>
                    <!-- Add other columns as needed -->

                    <!-- Actions column with edit and delete links -->
                    <td class="border px-4 py-2">
                        <a href="{{ route('waste.edit', $waste->id) }}" class="text-blue-500">Edit</a>
                        |
                        <form action="{{ route('waste.destroy', $waste->id) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
