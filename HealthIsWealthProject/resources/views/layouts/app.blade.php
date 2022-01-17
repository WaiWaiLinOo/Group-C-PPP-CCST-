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
</head>

<body>

  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          Health Is Wealth
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto"></ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="home"><a class="nav-link" href="" class="active">HOME</a></li>
            <li class="about"><a class="nav-link" href="">ABOUT US</a></li>
            <li class="product"><a class="nav-link" href="">OUR POST</a></li>
            <li class="contact"><a class="nav-link" href="">CONTACT US</a></li>
            <!-- Authentication Links -->
  
            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
              </div>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>
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
          <ul>
            <li><i class="far fa-envelope"></i> health@info.com</li>
            <li><i class="fas fa-phone-volume"></i>09-67890322</li>
            <li><i class="fas fa-location-arrow"></i>Yangon,Myanmar</li>
          </ul>

        </div>
        <div class="company">
          <h4>About The Company</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, animi modi vitae sequi laboriosam ea exercitationem.</p>
        </div>
        <div class="company">
          <h4>Health is Wealth</h4>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">Sign up</span>
          </div>

        </div>
      </div>
    </div>
  </section>
</body>

</html>