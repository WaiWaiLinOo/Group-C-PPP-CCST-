<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HealthIsWealth</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/library/fontawesome.all.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/frontend_style/common.css')}}"> 
  <link rel="stylesheet" href="{{asset('css/frontend_style/modal.css')}}">
 
  <script src="{{ asset('js/library/jquery3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/library/chart.min.js') }}"></script>
  <script src="{{asset('js/graph.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{ asset('js/modalbox.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

  <header class="header">

    <a href="#" class="logo">Health_<span>is</span>_Wealth</a>

    <nav class="navbar">
      <a href="/">Home</a>
      @guest
      <li class="registers"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
      <li class="login"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
      @else
      <li class="nav-item dropdown pure-menu-item ">

        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->user_name }} <span class="caret"></span>
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
    </nav>
    <div class="icons">
      <i class="fas fa-bars" id="menu-bars"></i>
      <i class="fas fa-search" id="search-icon"></i>
    </div>

    <form action="{{ route('searchPost')}}" class="search-form">
      <input type="search" name="search" placeholder="search post here..." id="search-box" required>
      <button type="submit">
        <label for="search-box" class="fas fa-search"></label>
      </button>
    </form>
  </header>
  <section class="container auth-container" id="posts">
    <div class="m-login">
      <div class="register">
        <div class="cardHeader">Login</div>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="editform">
            <div class="form-group">
              <label for="email">Email:</label>
              <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                  &nbsp;{{ __('Remember Me') }}
                </label>
              </div>
            </div>
            <div class="form-group mb-0">
              <button type="submit" class="btns">
                {{ __('Login') }}
              </button>
              @if (Route::has('password.request'))
              <a class="forget" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
              @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <section class="footer">

    <div class="follow">
      <a href="#" class="fab fa-facebook-f"></a>
      <a href="#" class="fab fa-twitter"></a>
      <a href="#" class="fab fa-instagram"></a>
      <a href="#" class="fab fa-linkedin"></a>
    </div>

    <div class="credit">created by <span>Group-C</span> | all rights reserved</div>

  </section>


  <!-- footer section ends -->
</body>

</html>
