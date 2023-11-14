@extends('layouts.app')
@section('content')

<div class="container">
    <h1 style="font-family: 'Kanit', sans-serif;" class="text-white flex-grow-1 my-4">
        {{ __('Profilo') }}
    </h1>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
