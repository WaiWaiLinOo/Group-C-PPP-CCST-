<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HealthIsWealth</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="{{asset('css/library/fontawesome.all.min.css')}}">
  <!-- custom css file link  -->
  <link rel="stylesheet" href="{{asset('css/frontend_style/style.css')}}">
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{ asset('js/library/jquery3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/modalbox.js') }}"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

  <!-- header section starts  -->

  <header class="header">

    <a href="#" class="logo">Health_<span>is</span>_Wealth</a>

    <nav class="navbar">
      <a href="{{route('home')}}">Home</a>
      <a href="#contact">contact Us</a>
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

    <form action="" class="search-form">
      <input type="search" name="" placeholder="search here..." id="search-box">
      <label for="search-box" class="fas fa-search"></label>
    </form>

  </header>
  <section class="container" id="posts">
    <div class="m-register">
      <div class="register">
        <div class="cardHeader">Register</div>
        <form method="POST" action="{{ route('registeruser') }}" enctype="multipart/form-data" class="d-flex">
          @csrf
          <div class="register-profile">
            <div>
              <img src="{{ asset('sample/profile.png') }}" alt="">
              <i class="fas fa-edit b-color icon-size"></i>
              <input type="file" placeholder="User Profile" name="profile" id="profile" accept="image/png, image/gif, image/jpeg">
            </div>
            (<small class="text-danger">*We only accept jpeg png gif jpg format</small>)
          </div>
          <div class="editform">
            <div class="form-group">
              <label for="name">Name: </label>
              <input type="text" placeholder="Enter Name" class="form-control" name="user_name" id="user_name" value="{{ old('user_name') }}" autofocus>
              @if ($errors->has('user_name'))
              <span class="text-danger">{{ $errors->first('user_name') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" placeholder="Enter Email" class="form-control" value="{{ old('email') }}" name="email" id="email">
              @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="password">Password: </label>
              <input type="password" placeholder="Enter Password" class="form-control" name="password" value="{{ old('password') }}" id="password">
              @if ($errors->has('password'))
              <span class="text-danger">{{ $errors->first('password') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="date"> Date Of Birth :</label>
              <input type="date" placeholder="Date Of Birth" class="form-control" id="dob" name="dob" value="{{ old('dob') }}">
              @if ($errors->has('dob'))
              <span class="text-danger">{{ $errors->first('dob') }}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="address"> Address:</label>
              <input type="address" placeholder="Enter Address" class="form-control" id="address" name="address" value="{{ old('address') }}">
              @if ($errors->has('address'))
              <span class="text-danger">{{ $errors->first('address') }}</span>
              @endif
            </div>
            <button type="submit" class="btns">Register</button>
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