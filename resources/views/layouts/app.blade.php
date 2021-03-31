<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->      
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav id="nav-top" class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-nav text-point" href="{{ url('/') }}">                    
                   expo
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (!Auth::check() && (!isset($authgroup) || !Auth::guard($authgroup)->check()) )                                                                                                                                   
                            <li class="nav-item">
                                @isset($authgroup)
                                <a class="nav-link" href="{{ url("login/$authgroup") }}">{{ __('Login') }}</a>
                                @else
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @endisset
                            </li>

                            @isset($authgroup)
                                @if (Route::has("$authgroup-register"))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route("$authgroup-register") }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                            @endisset

                        @else    
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @isset($authgroup)
                                    {{ Auth::guard($authgroup)->user()->name }} <span class="caret"></span>
                                    @else
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                    @endisset
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="bg-main">
            @yield('content')
        </main>

        <div id="footer" class="bg-second d-flex align-items-center">

            <div class="container-fluid text-center">

                <h1><a class="text-point" href="#">expo</a></h1>

                <nav role="footer-nav" class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid d-flex justify-content-center">                                    
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                        </ul>
                    </div>                                
                </nav>

                <nav role="social-icon-nav" class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid d-flex justify-content-center">                                    
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fab fa-twitter fa-2x rounded rounded-circle bg-main
                                p-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fab fa-twitter fa-2x rounded rounded-circle bg-main
                                p-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fab fa-twitter fa-2x rounded rounded-circle bg-main
                                p-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fab fa-twitter fa-2x rounded rounded-circle bg-main
                                p-2"></i>
                            </a>
                        </li>
                        </ul>
                    </div>                                
                </nav>

                <small>&copy;haruto All rights Resved</small>

            </div>

        </div>




    </div>
</body>
</html>
