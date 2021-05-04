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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- map --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCC05dInZBrIvVs5I4iAzTdGOqT2TExrEY&callback=initMap" async defer></script> --}}
    {{-- <script src="js/bootstrap.min.js"></script> --}}

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
                    CoShop
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
                        @if (Auth::check() || Auth::guard('store_owner')->check())

                        {{-- ===login　中=== --}}

                            <li class="nav-item mr-3">
                                @if(!Route::is('welcome.index'))     
                                    <a class="btn bg-point text-second" href="{{ route('welcome.index')}}">                                                                   
                                        @if(Auth::guard('store_owner')->check())                                        
                                            <i class="text-second fas fa-search"></i>　商品を探す
                                        @else
                                            <i class="text-second fas fa-search"></i>　お店を探す
                                        @endif     
                                    </a>  
                                @else                                                                                                   
                                        @if(Auth::guard('store_owner')->check())                                      
                                            <a class="btn bg-point text-second" href="{{ route('stores.index',['store_owner' => Auth::guard('store_owner')->user()->id])}}">
                                                <i class="far fa-user-circle"></i>　プロフィールへ
                                            </a>
                                        @else
                                            <a class="btn bg-point text-second" href="{{ route('items.index', ['user' => Auth::user()->id])}}">
                                                <i class="far fa-user-circle"></i>　プロフィールへ
                                            </a>                            
                                        @endif                                                               
                                @endif                
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::guard('store_owner')->check())
                                    {{ Auth::guard('store_owner')->user()->name }} (Store Owner)
                                @else
                                    {{ Auth::user()->name }} (User)
                                @endif
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
                        
                        @else
                        {{-- ===logout　中=== --}}                            

                                       {{-- as Users --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>USER</a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- login --}}
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        {{ __('Login as User') }}
                                    </a>
                                    {{-- register --}}
                                    <a class="dropdown-item" href="{{ route("register") }}">                                        
                                        {{ __('Register as User') }}
                                    </a>                                 
                                </div>

                            </li> 
                            
                            {{-- as store owner auth --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>STORE OWNER</a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- login --}}
                                    <a class="dropdown-item" href="{{ route('store_owner.login') }}">                                        
                                        {{ __('Login as Store Owner') }}
                                    </a>
                                    {{-- register --}}
                                    <a class="dropdown-item" href="{{ route("store_owner.register") }}">                                       
                                       {{ __('Register as Store Owner') }}
                                    </a>                                                                        
                                </div>

                            </li>                            

                        @endif

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

    @yield('js')
    <script src="{{ mix('/js/smooth.js') }}"></script>
</body>
</html>
