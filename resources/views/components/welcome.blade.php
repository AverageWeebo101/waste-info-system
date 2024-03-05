@extends('layouts.app')

@section('content')
<style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .text-6xl {
            font-size: 3rem; 
            margin-top: 1rem; 
        }

        .mb-8 {
            margin-bottom: 1rem; 
        }

        .text-center {
            text-align: center;
        }

        .box-container {
            display: flex;
            flex-direction: column; 
            gap: 2rem; 
        }

        .box {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn-with-image {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            width: 100%; 
        }

        .button-image {
            width: 100%; 
            max-width: 227px; 
            height: auto;
            margin-bottom: 0.5rem; 
        }

        .last-access {
            margin-top: 0.5rem; 
            color: #666; 
        }

        @media (min-width: 768px) {
            .btn-with-image {
                max-width: 300px; 
            }

            .button-image {
                max-width: 100%; 
            }s
        }
    </style>

    <div class="container">
        <h1 class="text-6xl font-bold mb-8 text-center">Welcome Back!!</h1>

        <div class="box-container">
            <div class="box">
                <a href="{{ route('wastes.index') }}" class="btn btn-primary btn-with-image">
                    <img src="{{ asset('images/tableclipart1.png') }}" alt="Waste Table" class="button-image">
                    Access Waste Table
                </a>
            </div>

            <div class="box">
                <a href="{{ route('wastes_location.index') }}" class="btn btn-primary btn-with-image">
                    <img src="{{ asset('images/tableclipart1.png') }}" alt="Location Facilities Table" class="button-image">
                    Access Location Facilities Table
                </a>
            
            </div>
        </div>
    </div>
@endsection
