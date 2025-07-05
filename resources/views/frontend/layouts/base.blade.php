<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Scripts -->
    <script src="{{mix('js/app.js')}}"></script>
</head>
<body>
    <header>
        <div id="fejlec">
            <!--<img id="logo" src="images/Logo_vKrisztian.png" alt="weboldal_logoja">-->
            <div class="hamburger kitoltes">&#9776;
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <a href="https://monthlydrop.lemp228.test/"><h1 id="fejlec_cim">{{ config('app.name', 'Laravel') }}</h1></a>

            @guest
                @if(Route::has('register') || Route::has('login'))
                    <div id="ikon_div">
                        <i class="bi bi-person-circle" id="ikon"></i>
                        <div id="login">
                            @if (Route::has('register'))
                                <a class="nav-link entrance" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif

                            @if (Route::has('login'))
                                <a class="nav-link entrance" href="{{ route('login') }}">{{ __('Login') }}</a>
                           @endif
                        </div>
                    </div>
                @endif
            @else
                <div id="ikon_div">
                    <a id="navbarDropdown" class="nav-link"> {{ Auth::user()->name }}</a>
                    <div id="login">
                        <a  class="dropdown-item" href="{{ route('kosar.home') }}">{{ __('Basket') }}</a>
                        <a  class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
        <div id="fejlec_csik"></div>
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer>
        <div id="footercontainer">
            <div class="footer-content">
                <div class="footer-section">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <div class="footer-section">
                    <h2>Contact Us</h2>
                    <p>Email: info@example.com</p>
                    <p>Phone: 123-456-7890</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p></p>
            </div>
        </div>
    </footer>
    <div class="csillag-wrapper">
        <svg id="eltunes_1" class="csillagok" width="100%" height="100%" preserveAspectRatio="none">
        </svg>
        <svg id="eltunes_2" class="csillagok" width="100%" height="100%" preserveAspectRatio="none">
        </svg>
    </div>
    <script src="{{mix('js/csillag.js')}}"></script>
    <script src="{{mix('js/ikon.js')}}"></script>
    <script src="{{mix('js/termek_fooldal_kepek.js')}}"></script>
</body>
</html>

