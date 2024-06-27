@extends('partner.include.master')
@section('style-area')
    <style>
        .container {
            margin-top: 60px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .card {
            display: flex;
            flex-direction: column;
            background-color: white;
            width: 30%;
            height: auto;
            align-items: center;
            padding: 30px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .card-header {
            width: 100%;
            background-color: #bde3eb;
            padding: 0;
            margin: -30px -20px 20px -20px;
            text-align: center;
        }

        .card-header.text-dark {
            padding: 10px 20px;
        }

        .card-body {
            padding: 0 20px 30px 20px;
        }
    </style>
@endsection
@section('content-area')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url()->previous() }}" class="btn forcolor">Back</a>
        </div>
    </div>
    <h2><i class="fas fa-headphones-alt"></i>Help</h2>
    <div class="container">
        @foreach ($helps as $help)
            <div class="card">
                <div class="card-header text-dark">
                    For: {{ $help->for }}
                </div>
                <div class="card-body p-3">
                    <h5 class="card-title"><i class="fas fa-user"></i> {{ $help->name }}</h5>
                    <p class="card-text"><i class="fas fa-headphones"></i> {{ $help->phone_number }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('script-area')
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>
@endsection
