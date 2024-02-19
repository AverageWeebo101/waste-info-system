@extends('layouts.app')

@section('content')
    <div class="container flex justify-center items-center h-screen">
        <h1 class="text-4xl font-bold mb-4">Welcome back</h1>

        <div class="box-container">
            <div class="box">
                <a href="{{ route('wastes.index') }}" class="btn btn-primary btn-with-image">
                    <img src="{{ asset('waste_table_image.jpg') }}" alt="Waste Table" class="button-image">
                    Access Waste Table
                </a>
            </div>

            <div class="box">
                <a href="{{ route('wastes_location.index') }}" class="btn btn-primary btn-with-image">
                    <img src="{{ asset('location_facilities_image.jpg') }}" alt="Location Facilities Table" class="button-image">
                    Access Location Facilities Table
                </a>
            </div>
            <!--
            <div class="box">
                <a href="/" class="btn btn-primary btn-with-image">
                    <img src="{{ asset('garbage_collection_vehicles_image.jpg') }}" alt="Garbage Collection Vehicles Table" class="button-image">
                    Garbage Collection Vehicles Table
                </a>
            </div>
            -->
        </div>
    </div>
@endsection
