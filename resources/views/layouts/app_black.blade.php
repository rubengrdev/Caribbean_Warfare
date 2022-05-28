<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('media/img/logo/caribbean_warfaresvg_logo_ship_color_white.png') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
    <link href="{{ asset('css/inventory.css') }}" rel="stylesheet">
    <link href="{{ asset('css/partial-main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/leaderboard.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                @if(Auth::user())
                    <a class="anchor-logo" href="{{ url('home') }}">
                    <img class="logo" src="{{ asset('/media/img/logo/caribbean_warfaresvg_logo_ship_color_black.png')}}" />
                    </a>
                @else
                <a class="anchor-logo" href="{{ url('/') }}">
                    <img class="logo" src="{{ asset('/media/img/logo/caribbean_warfaresvg_logo_ship_color_black.png')}}" />
                </a>
                @endif
            </div>
                <div class="list" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto navbar-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link-black" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-black" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                        @else
                        <div class="responsive-nav">
                        <li class="nav-item">
                            <a class="nav-link-black" href="{{ route('inventory.index') }}">{{ __('Inventory') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link-black" href="{{ route('shop.index') }}">{{ __('Shop') }}</a>
                        </li>


                            <span class="separator-layout"></span>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link-black dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="nav-link-black" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        </div>
                        <a>
                            <img class="dropdown-img" src="{{ asset('media/img/icons/desplegablebars.png') }}" title='https://www.flaticon.com/free-icons/open-menu Open menu icons created by Freepik - Flaticon'>
                        </a>
                        @endguest
                    </ul>
                </div>
        </nav>

        @if (Auth::user())
        <div id="dropdown-menu">
            <div class="responsive-dropdown">
                <li class="nav-item">
                    <a class="nav-link-black" href="{{ route('inventory.index') }}">{{ __('Inventory') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link-black" href="{{ route('shop.index') }}">{{ __('Shop') }}</a>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link-black dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="nav-link-black" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </div>
        </div>
        @else

        @endif
        <hr class="bighr">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
<script>
    let dropdown = document.querySelector(".dropdown-img");
    let counter = 0;
    dropdown.addEventListener("click", ()=>{
        let dropmenu = document.querySelector("#dropdown-menu");
        if(counter == 0){
            counter = 1;
            dropmenu.style.display = "flex";
        }else{
            counter = 0;
            dropmenu.style.display = "none";
        }
});
</script>
