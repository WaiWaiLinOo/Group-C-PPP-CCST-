<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel 8 User Roles and Permissions Tutorial') }}</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/library/fontawesome.all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
  <section class="header">
    <div class="header-ttl clearfix">
      <div class="logo">
        <h1><a href="index.html">Health is Wealth</a></h1>
      </div>
      <div class="nav-inner">
        <ul class="menu-blk clearfix">
          <li class="home"><a class="nav-link" href="" class="active">HOME</a></li>
          <li class="about"><a class="nav-link" href="">ABOUT US</a></li>
          <li class="product"><a class="nav-link" href="">OUR POST</a></li>
          <li class="contact"><a class="nav-link" href="">CONTACT US</a></li>
          <!-- Authentication Links -->
          @guest
          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" style="color: #000000" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
    <div class="logo-img">
      <img src="{{ asset('image/health_01.jpg') }}" alt="">
    </div>
  </section>
  <main class="py-4">
    <div class="container">
      @yield('content')
    </div>
  </main>
  </div>
  <section class="footer">
    <div class="container">
      <div class="footer-sub">
        <div class="company">
          <h4 id="health">Health is Wealth</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quae dolores est assumenda inventore perspiciatis dolorem! Magnam rerum quo expedita doloribus dolore quae minus vel eos. Libero maiores aspernatur ea!</p>
          <i class="far fa-envelope"> health@info.com</i>
          <i class="fas fa-phone-volume">09-67890322</i>
          <i class="fas fa-location-arrow">Yangon,Myanmar</i>
        </div>
      </div>
    </div>
  </section>
  <section class="footer-nav">
    <div class="footer-bar">
      <div class="footer-left">
        <p>Copyright@2022 | Health_is_wealth</p>
      </div>
      <div class="footer-right">
        <p><a href="{{route('register')}}">Sign Up here</a></p>
      </div>
    </div>
  </section>
</body>

</html>