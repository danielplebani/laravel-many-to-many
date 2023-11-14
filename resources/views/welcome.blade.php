@extends('layouts.app')

@section('content')
    @guest
        <div id="welcome_page" class="container d-flex flex-column align-items-center">
            <h1 class="text-center mt-5">EFFETUA IL LOGIN</h1>

            @include('partials.carousel-welcome-page')

            <h1 class="mt-2">OPPURE REGISTRATI</h1>
        </div>
    @else
        <div id="welcome_page" class="container d-flex flex-column align-items-center">
            <h1 class="text-center mt-5">BENVENUTO NEL TUO PORTFOLIO</h1>

            @include('partials.carousel-welcome-page')
        </div>
    @endguest
@endsection
