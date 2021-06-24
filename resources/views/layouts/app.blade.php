<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ネットショップの商品を実際の店舗に置いてもらう事を可能にします。買う人が商品を手にとって確かめてもらいながらもネットショップで販売する事ができます。リアルとインターネットをつなげたサービスです。">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="CoShop"/>
    <meta property="og:description" content="手に取るように、ネットショプの商品を手にっとってみよう！" />
    <meta property="og:type" content="WEBサービス" />
    <meta property="og:url" content="https://laravel-coshop.herokuapp.com/" />
    <meta property="og:image" content="{{ asset('/img/2.jpg') }}"/>
    <meta property="og:site_name" content="CoShop" />
    <meta property="og:locale" content="ja_JP"/>

    <title>CoShop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src='https://www.googletagmanager.com/gtag/js?id={{config('google_maps_api')}}'></script>

    @if(config("app.google_analytics"))
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ config("app.google_analytics") }}');
    </script>
    @endif

    <!-- Fonts -->
    <link rel="canonical" href="https://laravel-coshop.herokuapp.com">
    <link rel="icon" href="https://res.cloudinary.com/delvmfnei/image/upload/v1623767157/favicon_1_l6wb5i.ico" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav id="nav-top" class="navbar navbar-expand-md navbar-light -sm">
            <div class="container">
                @if(Auth::check() || Auth::guard('store_owner')->check())
                    <a class="navbar-nav text-point" href="{{ route('welcome.index') }}">                    
                @else
                    <a class="navbar-nav text-point" href="{{ url('/') }}">                    
                @endif
                    CoShop
                </a>
                <button id="login_nav" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                        @elseif(Auth::guard("user")->check())
                                            <i class="text-second fas fa-search"></i>　お店を探す
                                        @endif     
                                    </a>  
                                @else                                                                                                   
                                        @if(Auth::guard('store_owner')->check())                                      
                                            <a class="btn bg-point text-second" href="{{ route('stores.index',['store_owner' => Auth::guard('store_owner')->user()->id])}}">
                                                <i class="fas fa-store-alt text-second"></i>　プロフィールへ
                                            </a>
                                        @elseif(Auth::guard("user")->check())
                                            <a class="btn bg-point text-second" href="{{ route('items.index', ['user' => Auth::user()->id])}}">
                                                <i class="far fa-user-circle"></i>　プロフィールへ
                                            </a>                            
                                        @endif                                                               
                                @endif                
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::guard('store_owner')->check())
                                    {{ Auth::guard('store_owner')->user()->name }}
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-second border none" aria-labelledby="navbarDropdown">
                                    @if(Auth::guard('user')->check())
                                    <a class="dropdown-item boder none rounded  mb-3 bg-point text-main text-center" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @elseif(Auth::guard('store_owner')->check())
                                        <a class="dropdown-item boder rounded  mb-3 bg-point text-main text-center" href="{{ route('store_owner.logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                            {{ __('ログアウト') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('store_owner.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endif
                                </div>
                            </li>
                        
                        @else
                        {{-- ===logout　中=== --}}                            

                                       {{-- as Users --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>ユーザー</a>

                                <div class="dropdown-menu dropdown-menu-right bg-main shadow border noen p-3" aria-labelledby="navbarDropdown">
                                    {{-- login --}}
                                    <a class="dropdown-item boder rounded mb-3" href="{{ route('login') }}">
                                        {{ __('ログイン') }}
                                    </a>
                                    <hr class="bg-second">
                                    {{-- register --}}
                                    <a class="dropdown-item boder rounded" href="{{ route("register") }}">                                        
                                        {{ __('新規登録') }}
                                    </a>                                 
                                </div>

                            </li> 
                            
                            {{-- as store owner auth --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>ストアオーナー</a>

                                <div class="dropdown-menu dropdown-menu-right bg-main border none shadow p-3" aria-labelledby="navbarDropdown">
                                    {{-- login --}}
                                    <a class="dropdown-item boder rounded  mb-3" href="{{ route('store_owner.login') }}">                                        
                                        {{ __('ログイン（ストア）') }}
                                    </a>
                                    <hr class="bg-second">
                                    {{-- register --}}
                                    <a class="dropdown-item boder rounded " href="{{ route("store_owner.register") }}">                                       
                                       {{ __('新規登録（ストア）') }}
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

        <div id="footer" class="bg-second d-flex align-items-center jsutify-content-around">

            <div class="container-fluid text-center">

                <h1><a class="text-point" href="#">CoShop</a></h1>

                <nav role="footer-nav" class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid d-flex justify-content-center">                                    
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">開発者について</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">サービスの趣旨</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <nav role="social-icon-nav" class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid d-flex justify-content-center">                                    
                        <ul class="navbar-nav d-flex flex-row">
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="https://twitter.com/creationH1" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-twitter fa-2x rounded rounded-circle bg-main
                                    p-2"></i>
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="https://www.instagram.com/harutopcp/" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-instagram fa-2x rounded rounded-circle bg-main
                                    p-2"></i>
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="https://www.facebook.com/ino.haruto.3" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-facebook fa-2x rounded rounded-circle bg-main
                                    p-2"></i>
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="https://github.com/seohayam" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-github fa-2x rounded rounded-circle bg-main
                                    p-2"></i>
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="https://www.linkedin.com/in/haruto-ino-87251519b/" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-linkedin fa-2x rounded rounded-circle bg-main
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
