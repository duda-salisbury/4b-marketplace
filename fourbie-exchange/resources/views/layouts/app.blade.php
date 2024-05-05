<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title') -  Fourbie Exchange
    </title>
    <link rel="icon" href="fourbie_circle.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @yield('styles')

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- oswald font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&display=swap">
    <!-- Red Hat Display font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;700&display=swap">


    <!-- quattrocento font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quattrocento:wght@400;700&display=swap">

    <!-- font yellowtail -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap">
    <!-- bs icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- HTMX CDN -->
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@1.5.0/dist/htmx.min.js"></script>
</head>

<body class="bg-dark">

    <nav class="navbar fixed-top navbar-expand-lg bg-white">
        <div class="container">
            <a class="px-2 navbar-brand bg-fe-dark" href="#">Fourbie.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="/listings">Listings</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('listings.create') }}">Create Listing</a>
                    </li>

                    <!-- single listing -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('listings.show')}}">Single Listing</a>
                    </li>

                    <!-- premium listing -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('listings.premium')}}">Premium Listing</a>
                    </li>

                    <!-- create seller -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sellers.create')}}">Create Seller</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sellers')}}">All Sellers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Sell</a>
                    </li>
                </ul>


                <!-- account stuff -->
                <div class="dropdown mx-4">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="accountDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        @if ( !Auth::check() )
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @endif

                        @if ( Auth::check() )
                            <li><h6 class="dropdown-header">Welcome {{ Auth::user()->name }}</h6></li>
                            <li><a class="dropdown-item" href="#">My Account</a></li>
                            <li><a class="dropdown-item" href="#">My Classifieds</a></li>
                            <li><a class="dropdown-item" href="#">My Messages</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a></li>
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </nav>

        @yield('content')

    <!-- Bootstrap 5.3 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

</body>

</html>
