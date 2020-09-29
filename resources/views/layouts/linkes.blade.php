<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dev. Hazem Lababidi</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/transition-animations.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" type="text/css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/main-teal.css')}}" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .form-control, .form-control:focus, .has-error .form-control, .has-error .form-control:focus{
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            padding: 10px 0px 10px 13px;
        }

        .form-group label{
            opacity: 1;
            margin-left: 20px;
            top:-2px;
        }
        .form-horizontal .form-input{
            position: relative;
            border: 0;
            border-bottom: 1px solid #e0e0e0;
            border-radius: 0;
            display: block;
            font-size: 0.9em;
            margin: 0;
            padding: 10px 0 10px 0;
            width: 100%;
            background: transparent;
            text-align: left;
            color: inherit;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            outline: none;
            font-family: 'Roboto', Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <main class="m-5">
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

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
    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
</body>
</html>
