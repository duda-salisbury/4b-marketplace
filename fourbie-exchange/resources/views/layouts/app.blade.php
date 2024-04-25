<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <!-- Bootstrap 5.3 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- HTMX CDN -->
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@1.5.0/dist/htmx.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('listings') }}">Fourbie Exchange</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('listings') }}">Listings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('listings.create') }}">Create Listing</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container pt-4">
        @yield('content')
    </div>

    <!-- Bootstrap 5.3 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


</body>

</html>
