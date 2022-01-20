<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>Health Is Wealth</title>
    <link rel="stylesheet" href="{{asset('css/ui/pure-min.css')}}">
    <link rel="stylesheet" href="{{asset('css/ui/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/ui/ui.js')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <div id="layout">
        <!-- Menu toggle -->
        <a href="#menu" id="menuLink" class="menu-link">
            <!-- Hamburger icon -->
            <span></span>
        </a>

        <div id="menu">
            <div class="pure-menu ">
                <h5>Medic Care
                    <span>Health Specilist</span>
                </h5>
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="#home" class="pure-menu-link">Home</a></li>
                    <li class="pure-menu-item"><a href="#about" class="pure-menu-link">About</a></li>
                    <li class="pure-menu-item"><a href="#contact" class="pure-menu-link">Contact</a></li>
                    <li class="pure-menu-item"><a href="{{ route('customers.index') }}"  class="pure-menu-link">Manage Users</a></li>
                    <li class="pure-menu-item"><a href="{{ route('roles.index') }}"  class="pure-menu-link">Manage Role</a></li>
                </ul>
            </div>
        </div>

        <div id="main">
            <div class="header">
                <a class="pure-menu-heading" href="#company">Health is Wealth</a>
            </div>
            <div class="pure-menu-lists clearfix">
                @guest
                <li class="pure-menu-item "><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                <li class="pure-menu-item" ><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                <li class="nav-item dropdown pure-menu-item ">

                  <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="" style="color: #000000" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>

                @endguest
            </div>

            @yield('content')
        </div>



    </div>
</body>

</html>
