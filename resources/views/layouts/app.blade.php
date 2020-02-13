<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Your_Taxi') }}</title>

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
    <header>

    <nav class="navbar navbar-expand-md">
        <div class="container">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}">
                    <a class="navbar-link ml-4" href="{{ route('index') }}">Titulinis</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'article.index' ? 'active' : '' }}">
                    <a class="navbar-link ml-4" href="{{ route('article.index') }}">Atsiliepimai</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item {{ Route::currentRouteName() == 'login' ? 'active' : '' }}">
                        <a class="navbar-link" href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item {{ Route::currentRouteName() == 'register' ? 'active' : '' }}">
                            <a class="navbar-link" href="{{ route('register') }}">{{ __('Registruotis') }}</a>
                        </li>
                    @endif
                @else
                    {{--  only for admin part         --}}
                    @if(Auth::user()->isAdmin())
                        <li class="{{ Route::currentRouteName() == 'article.create' ? 'active' : '' }}">
                            <a class="navbar-link ml-4" href="{{ route('article.create') }}">Sukurti straipsnį</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'admin' ? 'active' : '' }}">
                            <a href="{{ route('admin') }}" class="navbar-link">Admin</a>
                        </li>
                    @endif
                    {{--        end of admin        --}}

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="navbar-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    </header>

    <main class="">
        @yield('content')
    </main>
</div>
<footer class="d-flex justify-content-center align-items-center">
    <p>&copy; Inga Vaitiekūnienė, all rights reserved</p>
</footer>
</body>
</html>
