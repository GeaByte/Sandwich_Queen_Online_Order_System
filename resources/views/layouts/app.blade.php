<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <title>@yield('title','Online Store')</title>
</head>
<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-1">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}"><img id="logo" src="{{ asset('/img/logo.webp') }}" alt="Sandwich Queen Logo">Sandwich Queen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                    <a class="nav-link active" href="{{ route('product.index') }}">Product</a>
                    <a class="nav-link active" href="{{ route('home.about') }}">About</a>
                    <!-- auth part -->
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @auth
                    <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user.index') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('order.index') }}">Order</a></li>
                        </ul>
                    </li>
                    @if(auth()->user()->isAdmin())
                    <a class="nav-link active" href="{{ route('admin.home.index') }}">Admin</a>
                    @endif
                    @endauth
                    @guest
                    <a class="nav-link active" href="{{ route('login') }}">Login</a>
                    <a class="nav-link active" href="{{ route('register') }}">Register</a>
                    @else
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="nav-link active" id="logout" onclick="getElementById('logout').submit();">Logout</a>
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'Queen of Sandwiches, Ruler of Flavors')</h2>
        </div>
    </header>
    <!-- header -->

    <div class="container my-4">
        @yield('content')
    </div>

    <!-- footer -->
    @include('layouts.footer')
    @yield('footer')

    <!-- footer -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</body>
</html>