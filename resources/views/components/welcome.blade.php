@extends('layouts.app')

@section('content')

        <div class="container flex justify-center items-center h-screen">
        <h1 class="text-4xl font-bold mb-4">Welcome back</h1>
        <p class="text-gray-600">Placeholder Text</p>
        <a href="{{ route('wastes.index') }}" class="btn btn-primary mt-4">Access Waste Table</a>

    </div>
@endsection