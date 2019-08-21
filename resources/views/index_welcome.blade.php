<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//use.fontawesome.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
    <!-- Styles -->
    @if (@session('themeMode') == 'dark')
        <link href="{{ asset('css/app.css') }}" rel="preload" as="style" onload="this.rel='stylesheet'">
    @else
        @if(@session('themeMode') == 'light')
            <link href="{{ asset('css/app-light.css') }}" rel="preload" as="style" onload="this.rel='stylesheet'">
        @else
            <link href="{{ asset('css/app.css') }}" rel="preload" as="style" onload="this.rel='stylesheet'">
        @endif
    @endif
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flatpickr.css') }}" rel="stylesheet">
</head>
<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">



<!-- CONTENT
================================================== -->
<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-6 col-lg-6 col-xl-4 px-lg-6 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                CSS-X
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                Computer Science Smasta X E-Assignment Platform
            </p>

            <h1 class="text-center mb-5">
                @if (Auth::guest())
                    <p>Mohon login untuk memulai submisi</p>
                    <a class="btn btn-primary btn-block" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a class="btn btn-primary btn-block" href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <img src="" style="height: 100px; width: 100px;" alt="..." class="avatar-img rounded-circle">
                    <br> <br>
                    <p>Selamat datang, {{Auth::user()->name}}</p>
                <div class="mb-4"></div>
                    <a class="btn btn-primary btn-block" href="{{ url('/home') }}">Dashboard anda</a>
                @endif
            </h1>
            @if (@session('themeMode') == 'dark')
                <p>
                    Artwork: <i>Cloud Triangle</i>, <br>
                    &copy; <a href="https://instagram.com/simple_vann"><i class="fab fa-instagram"></i> simple_vann</a>.
                </p>
            @else
                @if(@session('themeMode') == 'light')
                    <link href="{{ asset('css/app-light.css') }}" rel="preload" as="style" onload="this.rel='stylesheet'">
                @else
                    <link href="{{ asset('css/app.css') }}" rel="preload" as="style" onload="this.rel='stylesheet'">
                @endif
            @endif
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xl-8 d-none d-lg-block">
            <div class="bg-cover vh-100 mt-n1 mr-n3" style="background-image: url({{asset('img/ct.jpg')}});"></div>
            <!-- Image -->

        </div>
    </div> <!-- / .row -->
</div>


<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/list.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>
