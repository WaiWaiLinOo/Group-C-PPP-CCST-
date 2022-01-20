<!doctype html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
  <title>HealthIsWealth</title>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/library/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

  <div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
      <!-- Hamburger icon -->
      <span></span>
    </a>

    <div id="menu">
      <div class="pure-menu">
        <a class="pure-menu-heading" href="#company">Health is wealth</a>
        <ul class="pure-menu-list">
          <li><a class="pure-menu-item" href="{{ route('customers.index') }}">Manage Users</a></li>
          <li><a class="pure-menu-item" href="{{ route('roles.index') }}">Manage Role</a></li>
          <li class="pure-menu-item"><a href="#home" class="pure-menu-link">Home</a></li>
          <li class="pure-menu-item"><a href="#contact" class="pure-menu-link">Contact</a></li>
          @guest
          <li><a class="pure-menu-item " href="{{ route('register') }}">{{ __('Register') }}</a></li>
          <li><a class="pure-menu-item" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          @else
          <li class="nav-item dropdown">

            <a id="navbarDropdown" class="pure-menu-item dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu">
              <a class="pure-menu-heading" style="color: #000000" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>

          @endguest
        </ul>
      </div>
    </div>

    <div id="main">
      <div class="header">
        <h1>Health Is Wealth</h1>
      </div>

      @yield('content')
    </div>

    <div class="footer">
      <div class="header">
        <p>Health_Is_Wealth@info.com</p>
        <p>Sign up here</p>
      </div>
    </div>
  </div>



</body>

</html>