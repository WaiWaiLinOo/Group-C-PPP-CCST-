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
        @auth
        @role('User|SubAdmin')
        <a href="{{route('home')}}">Home</a>
        <a href="{{route('contactUs')}}">contact Us</a>
        @endrole
        @endauth
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

<!-- header section ends -->

<!-- banner section starts  -->
<section class="banner" id="banner">

</section>
<section class="container" id="posts">

    <div class="sidebar">

        @auth
        @role('User|SubAdmin')
        <div class="box">
            <h3 class="title">about us</h3>
            <div class="about">
                <img src="{{asset('images/image/user.png')}}" alt="">
                <h3>Our Service</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, officia.</p>

            </div>
        </div>
        @endrole
        @endauth

        @auth
        @role('Admin')
        <div class="box">
            <h3 class="title">Controls</h3>
            <div class="category">
                <a class="nav-link" href="{{ route('customers.index') }}" class="pure-menu-link"><i class="fas fa-home"></i> &nbsp;Dashboard</a>
                <a class="nav-link" href="{{ route('roles.index') }}" class="pure-menu-link"><i class="fas fa-chart-line"></i> &nbsp;Statistics</a>
                <a class="nav-link" href="{{ route('customers.index') }}" class="pure-menu-link"><i class="fas fa-users"></i> &nbsp;Users</a>
                <a class="nav-link" href="{{ route('roles.index') }}" class="pure-menu-link"><i class="fas fa-edit"></i> &nbsp;Roles</a>
            </div>
        </div>
        @endrole
        @endauth

        @auth
        <div class="box">
            <h3 class="title">Actions</h3>
            <div class="category">
                @hasanyrole('Admin|SubAdmin')
                <a class="nav-link" href="{{ route('posts.index') }}"><i class="fas fa-edit"></i> &nbsp;Post</a>
                @endhasanyrole
                @role('Admin')
                <a class="nav-link" href="{{ route('categories.index') }}" class="pure-menu-link"><i class="fas fa-edit"></i> &nbsp;Category</a>
                <a class="nav-link" href="{{ route('contact.index') }}" class="pure-menu-link"><i class="fas fa-edit"></i> &nbsp;Contact </a>
                @endrole
                
            </div>
        </div>
        @endauth

        <div class="box">
            <h3 class="title">categories</h3>
            <div class="category" id="categoryList">
                {{--
                @foreach ($item->Category as $item)--}}
                {{--<a href="#">{{$item->Category->name}}</a>--}}
                {{--@endforeach--}}
            </div>
        </div>
    </div>

    @yield('content')               
</section>



<!-- contact section ends -->

<!-- footer section starts  -->

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