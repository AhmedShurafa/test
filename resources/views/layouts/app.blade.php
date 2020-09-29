<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dev. Hazem Lababidi</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/transition-animations.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/main-teal.css')}}" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('http://127.0.0.1:8000/'.$user->info->color)}}" type="text/css">
    @if(App::isLocale('ar'))
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @endif
    <style>
        @if(App::isLocale('ar'))
            h1,h2,h3,h4,h5,h6,.site-title{
                font-family: 'Poppins', sans-serif;
            }
        @endif
        footer .copyrights{
            display: block;
            margin-bottom: 12px;
            text-align: center;
            font-size: 12px;
            color: #9e9e9e;
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Loading animation -->
        <div class="preloader">
            <div class="preloader-animation">
                <div class="preloader-spinner">
                </div>
            </div>
        </div>
        <!-- /Loading animation -->

        <!-- Header -->
        <header id="site_header" class="header mobile-menu-hide">
            <div class="header-content">
                <div class="site-title-block mobile-hidden">
                        @if(App::isLocale('en'))
                            <div class="site-title">{{ explode(" ",$user->name)[0]}} <span> {{ explode(" ",$user->name)[1]}}</span>
                        @else
                            <div class="site-title">{{ explode(" ",$user->name_ar)[0]}} <span> {{ explode(" ",$user->name_ar)[1]}}</span>
                        @endif
                    </div>
                </div>

                <div class="secLan">
                    <!-- Main menu -->
                    <ul class="language screen">
                        <li>
                            <a class="lang"  href="{{ route('lang','en') }}">EN </a>
                        </li>
                        <li class="slash ml-1 mr-1"> / </li>
                        <li>
                            <a class="lang"  href="{{ route('lang','ar') }}"> ع</a>
                        </li>

                    </ul>
                </div>

                <!-- Navigation -->
                <div class="site-nav">
                    <!-- Main menu -->
                    <ul id="nav" class="site-main-menu">
                        <li>
                            <a class="pt-trigger" href="#home">{{__('message.home')}}</a>
                        </li>
                        <li>
                            <a class="pt-trigger" href="#resume">{{__('message.resume')}}</a>
                        </li>
                        <li>
                            <a class="pt-trigger" href="#services">{{__('message.services')}}</a>
                        </li>
                        <li>
                            <a class="pt-trigger" href="#portfolio">{{__('message.portfolio')}}</a>
                        </li>
                        <li>
                            <a class="pt-trigger" href="#contact">{{__('message.content')}}</a>
                        </li>
                        @if(Auth::check())
                            <li class="red">
                                <a class="dropdown-item red mr-3" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endif
                    </ul>
                    <!-- /Main menu -->
                </div>
                <!-- Navigation -->
            </div>
        </div>
        </header>
        <!-- /Header -->

    <!-- Mobile Header -->
    <div class="mobile-header mobile-visible">
        <div class="mobile-logo-container">
                <div class="mobile-site-title">Hazem Lababidi
                </div>

                <div class="secLan mobile">
                    <!-- Main menu -->
                    <ul class="language">
                        <li>
                            <a class="lang"  href="{{ route('lang','en') }}">En </a>
                        </li>
                        <li class="slash ml-1 mr-1"> / </li>
                        <li>
                            <a class="lang"  href="{{ route('lang','ar') }}"> Ar</a>
                        </li>

                    </ul>
                </div>

                <a class="menu-toggle mobile-visible">
                    <i class="fa fa-bars"></i>
                </a>
        </div>
    </div>
    <!-- /Mobile Header -->

        <!-- Main Content -->
        <div id="page" class="page">


        <!-- Main Content -->
        <div id="main" class="site-main">
            <!-- Page changer wrapper -->
            <div class="pt-wrapper">
                <!-- Subpages -->
                <div class="subpages">

                    @yield('content')

                </div>
            </div>
        </div>
        <!-- End  Main Content -->
        <footer>
            <div class="copyrights">{{__('message.copy')}}</div>
        </footer>

    </div>
    </div>
    <div class="modal" id="CV">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('message.code') }}</h4>
                    <button type="button" class="closeModel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="addUserForm" method="POST" action="{{ route('file') }}">

                        @csrf

                        <div class="form-group">
                            <p for="code">{{ __('message.EnterCode') }}</p>
                            <input type="text" id="code" class="form-control" name="code" placeholder="{{ __('message.EnterCode') }}" />
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button name="submit" type="submit" id="add" class="btn btn-primary float-left">
                                    {{ __('message.send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/jquery-2.1.3.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/modernizr.custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/pages-switcher.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/validator.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.shuffle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/masonry.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.hoverdir.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
</body>
</html>
