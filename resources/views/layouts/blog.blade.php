<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('img/favicon.png')}}">
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img class="logo-dark" src="{{asset('img/logo-dark.png')}}" alt="logo">
                <img class="logo-light" src="{{asset('img/logo-light.png')}}" alt="logo">
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar">

            </ul>
        </section>

        <a class="btn btn-xs btn-round btn-success"
           href="{{route('login')}}">
            Login
        </a>

    </div>
</nav><!-- /.navbar -->

<!-- Header -->
@yield('header')


<!-- Main Content -->
@yield('content')


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">
            <div class="col-6 col-lg-3">
                <a href="/"><img src="{{asset('img/logo-dark.png')}}" alt="logo"></a>
            </div>
            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a class="social-facebook" href=""><i class="fab fa-facebook"></i></a>
                    <a class="social-twitter" href=""><i class="fab fa-twitter"></i></a>
                    <a class="social-instagram" href=""><i
                                class="fab fa-instagram"></i></a>
                    <a class="social-dribbble" href=""><i class="fab fa-dribbble"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{asset("js/page.min.js")}}"></script>
<script src="{{asset("js/script.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/js/all.min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d057f20e5cc8d00"></script>
</body>
</html>
