<div id="header">
    <nav class="navbar navbar-expand-md navbar-light py-4">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item" id="home-button">
                        <a class="nav-link" href="{{ url('/') }}">
                            <button>
                                <span class="circle1"></span>
                                <span class="circle2"></span>
                                <span class="circle3"></span>
                                <span class="circle4"></span>
                                <span class="circle5"></span>
                                <span class="text-white">Home</span>
                            </button>
                        </a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item me-2 login-register-button">
                            <a class="nav-link" href="{{ route('login') }}">
                                <button class="animated-button">
                                    <span class="text-white">Login</span>
                                    <span></span>
                                </button>
                            </a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item login-register-button">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <button class="animated-button">
                                        <span class="text-white">Registrati</span>
                                        <span></span>
                                    </button>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown pt-1 me-3">
                            <a id="navbarDropdown" class="nav-link name-button" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <button class="button">
                                    {{ Auth::user()->name }} <i class="fa-solid fa-caret-down"></i>
                                </button>
                            </a>

                            <div class="dropdown-menu p-0 text-center rounded-4 border-0" aria-labelledby="navbarDropdown">
                                <a onmouseover="this.classList.add('active','bg-dark')" onmouseout="this.classList.remove('active','bg-dark')" class="border-0 dropdown-item bg-info rounded-top-4" href="{{ url('admin') }}">
                                    {{ __('Dashboard') }}
                                </a>
                                <a onmouseover="this.classList.add('active','bg-dark')" onmouseout="this.classList.remove('active','bg-dark')" class="border-0 dropdown-item bg-info rounded-bottom-4" href="{{ url('profile') }}">
                                    {{ __('Profilo') }}
                                </a>
                            </div>
                        </li>

                        <li class="nav-item me-2 login-register-button">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <button class="animated-button">
                                    <span class="text-white">Logout</span>
                                    <span></span>
                                </button>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
