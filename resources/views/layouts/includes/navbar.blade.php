<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img style="max-height: none;"
                 src="@if (@session('themeMode') == 'dark'){{ asset('img/css-white.png') }} @else {{ asset('img/csslogo.png') }} @endif"
                 width="40" height="40">
            {{ config('app.name', 'Laravel') }}&nbsp;<span class="badge badge-soft-warning">Beta 2</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <div class="navbar-user">
                        <div class="pr-4 d-none d-md-flex" style="border-right: 1px solid #1e3a5c;">
                            @if (@session('themeMode') == 'dark')
                                <a href="/webapi/v0/theme:light"><i style="font-size:20px;"
                                                                    class="fe fe-sun text-warning"></i></a>
                            @else
                                @if(@session('themeMode') == 'light')
                                    <a href="/webapi/v0/theme:dark"><i style="font-size:20px;"
                                                                       class="fe fe-moon text-dark"></i></a>
                                @else
                                    <a href="/webapi/v0/theme:light"><i style="font-size:20px;"
                                                                        class="fe fe-sun text-warning"></i></a>
                                @endif
                            @endif
                        </div>
                        <div class="ml-4 pr-4 d-none d-md-flex dropdown d-none" style="border-right: 1px solid #1e3a5c;">
                            <div class="dropdown d-none d-md-flex">
                                <!-- Toggle -->
                                <a href="#" class="navbar-user-link" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="true">
                                    @if (@session('themeMode') == 'dark')
                                        <i style="font-size: 20px;" class="text-white fe fe-bell"></i>
                                    @else
                                        @if(@session('themeMode') == 'light')
                                            <i style="font-size: 20px;" class="text-dark fe fe-bell"></i>
                                        @else
                                            <i style="font-size: 20px;" class="text-white fe fe-bell"></i>
                                        @endif
                                    @endif

                                </a>

                                <!-- Menu -->
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">

                                                <!-- Title -->
                                                <h5 class="card-header-title">
                                                   Notifikasi
                                                </h5>

                                            </div>
                                            <div class="col-auto">

                                                <!-- Link -->
                                                <a href="#!" class="small">
                                                    Baca Semua
                                                </a>

                                            </div>
                                        </div> <!-- / .row -->
                                    </div> <!-- / .card-header -->
                                    <div class="card-body">

                                        <!-- List group -->
                                        <div class="list-group my-n3">
                                            @for($ltest=0; $ltest < 100; $ltest++)
                                                <a class="list-group-item text-white pl-3 px-0" href="#!">
                                                    <i class="fas fa-bullhorn"></i> Ini adalah judul notifikasi BARU
                                                </a>
                                                @endfor
                                        </div>

                                    </div>
                                </div> <!-- / .dropdown-menu -->

                            </div>
                        </div>
                        <div class="dropdown ml-4">
                            <!-- Toggle -->
                            <a href="#" class="avatar avatar-sm dropdown-toggle" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->is_avatar_set == false)
                                    <img src="{{asset('img/noavatar.png')}}"
                                         alt="{{Auth::user()->name}} belum mengatur avatar nya"
                                         class="avatar-img rounded-circle">
                                @endif
                            </a>

                            <!-- Menu -->
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ url('/home') }}">{{ __('Dashboard') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/home/edit-profile') }}">{{ __('Edit Profil') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>

                        </div>
                    </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
