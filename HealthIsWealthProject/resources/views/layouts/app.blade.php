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


          <li class="pure-menu-item  {{ Route::currentRouteNamed( 'homeside' ) ?  'active' : '' }}"><a href="{{route('homeside')}}" class="pure-menu-link ">Home</a></li>
          <li class="pure-menu-item {{ Route::currentRouteNamed( 'aboutUs' ) ?  'active' : '' }}"><a href="{{route('aboutUs')}}" class="pure-menu-link ">About</a></li>
          <li class="pure-menu-item {{ Route::currentRouteNamed( 'contactUs' ) ?  'active' : '' }}"><a href="{{route('contactUs')}}" class="pure-menu-link">Contact</a></li>
         
          @auth
          @role('Admin')
          <li class="pure-menu-item"><a href="{{ route('customers.index') }}" class="pure-menu-link">Manage Users</a></li>
          <li class="pure-menu-item"><a href="{{ route('roles.index') }}" class="pure-menu-link">Manage Role</a></li>
          <li class="pure-menu-item"><a href="{{ route('categories.index') }}" class="pure-menu-link">Manage Category</a></li>
          @endrole
          @hasanyrole('Admin|SubAdmin')
          <li><a class="nav-link" href="{{ route('posts.index') }}">Manage Post</a></li>
          @endhasanyrole
         @endauth
        </ul>
      </div>
    </div>

    <div id="main">
      <div class="header">
        <a class="pure-menu-heading" href="#company">Health is Wealth</a>
      </div>
      <div class="auth-list clearfix">
        @guest
        <li class="register"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
        <li class="login"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        @else
        <li class="nav-item dropdown pure-menu-item ">

          <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" style="color: #000000" href="{{ route('profileshows', Auth::user()->id) }}">
              {{ __('Profile') }}
            </a>
            <a class="dropdown-item" style="color: #000000;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
