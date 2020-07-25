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
    @stack('css')
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <h1 class="header__logo">
        <a href="/">Task App</a>
      </h1>
      <nav class="header__nav">
        <ul class="g-menu">
          @guest
            <li class="g-menu__item">
              <a class="g-menu__item-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
              <li class="g-menu__item">
                  <a class="g-menu__item-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
          @else
          <li class="g-menu__item d-none d-sm-block">
            <span class="text-white">ようこそ, {{ Auth::user()->name }}さん</span>
          </li>
          <li class="g-menu__item">
            <a href="#" id="logout" class="g-menu__item-link">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
          @endguest
        </ul>
      </nav>
    </div>
  </header>
  <main class="main">
      @yield('content')
  </main>
  @if(Auth::check())
  <script>
      document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
  @endif
  @stack('js')
  
</body>
</html>
