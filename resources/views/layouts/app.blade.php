<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ImDB') }}</title>

    <!-- Styles -->

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'ImDB') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="nav-item ">
                                {{ Auth::user()->name }}
                            </li>
                                <li class="nav-item">
                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        <span><i class="mdi mdi-logout"></i></span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
       <div class="container-fluid  top-menu">
           @include('layouts.nav-menu')
       </div>
        <main class="cont">
            <div class="row">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
