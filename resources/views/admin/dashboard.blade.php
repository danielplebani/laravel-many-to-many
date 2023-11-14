@extends('layouts.admin')

@section('content')
    <div class="container-md dashboard">
        <div class="row mb-3">
            <div class="col d-flex align-items-center mt-4">
                <h1 style="font-family: 'Kanit', sans-serif;" class="text-white flex-grow-1 m-0">
                    {{ __('Dashboard') }}
                </h1>
            </div>
        </div>

        <div class="row justify-content-center g-4">

            <div class="col-12 col-md-6">
                <div class="card">
                    <h6 class="card-header text-uppercase">PROGETTI</h6>
                    <div class="card-body">
                        <strong>NUMERO PROGETTI:</strong> {{ $total_projects }}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <h6 class="card-header text-uppercase">UTENTI</h6>
                    <div class="card-body">
                        <strong>NUMERO UTENTI REGISTRATI:</strong> {{ $total_users }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
