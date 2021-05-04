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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
          integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="menu">
{{--            <div class="line">--}}
{{--                <div class="spans"></div>--}}
{{--            </div>--}}
            <svg width="25" height="13">
                <line
                    x1="0" y1="10%" x2="100%" y2="10%"
                    stroke="rgba(29, 33, 41, 0.8)" stroke-width="2"
                />
                <line
                    x1="0" y1="50%" x2="100%" y2="50%"
                    stroke="rgba(29, 33, 41, 0.8)" stroke-width="2"
                />
                <line
                    x1="0" y1="90%" x2="100%" y2="90%"
                    stroke="rgba(29, 33, 41, 0.8)" stroke-width="2"
                />
            </svg>
            <div class="hr_vert"></div>
            <h1>SCHOOL<span>LEARN</span></h1>
        </div>
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="user_profiles">
                            @if($user['first_name'])
                                <p>{{$user['first_name']}}</p>
                            @endif
                            <div class="img avatar">
                                @if($user['avatar'])
                                    <img src="{{$user['avatar']}}" alt="">
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown d-none">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        <div class="comment">
            <aside class="left_menu">
                @include('layouts.nav')
            </aside>
            @yield('content')
        </div>
    </main>
    <script src="{{ asset('js/calendar.js') }}"></script>
</div>
</body>
</html>
