<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content=en http-equiv=Content-Language>
    <title>
        @yield('title')
    </title>
    <link href="{{ asset('imgs/favicon.png') }}"rel=icon sizes=16x16 type=image/gif>
    <style>
        /* nav bar */
        .bg-pink {
            background-color: #c9b0ea;
        }

        .navbar-nav .nav-link {
            color: #835886;
            font-weight: 700;
            font-size: large;
            background-color: #c9b0ea;
            border-radius: 30px;
            border: 1px solid #c9b0ea;
            padding: 5px 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #f8faf9;
            background-color: #835886;
            border-radius: 30px;
            border: 1px solid #835886;
            /* padding: 5px 15px; */
        }

        /* footer */
        .fab {
            color: beige;
        }

        .bg-pi-dk {
            background-color: #8563b9;
        }

        .bg-pi-li {
            background-color: #c9b0ea;
        }

        footer {
            color: #835886;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/welcome/welcome.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css"
        integrity="sha512-oAvZuuYVzkcTc2dH5z1ZJup5OmSQ000qlfRvuoTTiyTBjwX1faoyearj8KdMq0LgsBTHMrRuMek7s+CxF8yE+w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    {{-- nav bar starts --}}
    <nav class="navbar navbar-expand-lg fixed-top bg-pink navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img id="MDB-logo" src="{{ asset('imgs/logo.png') }}" alt="alphau-logo" draggable="false"
                    height="30" />
            </a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    {{-- <li class="nav-item">
                        <a class="nav-link mx-2" href="/messenger">
                            Messenger
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/programs">
                            Programs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/3d-radio">
                            3D Radio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/blog">
                            Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="/about-us">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        |
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    {{-- nav bar ends --}}
    @yield('welcomebody')
    {{-- footer starts --}}
    <footer class="text-center bg-pi-li text-lg-start text-muted footer_style">

        <section class="">
            <div class="container text-center text-md-start p-2">
                <div class="row">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">National Institute of Education
                        </h6>
                        {{-- <p>
                            Here you can use rows and columns to organize your footer
                            content. Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                        </p> --}}
                    </div>
                    {{-- <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Products</h6>
                        <p>
                            <a href="#!" class="text-reset">
                                Angular
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                React
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                Vue
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                Laravel
                            </a>
                        </p>
                    </div> --}}
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                        {{-- <p>
                            <a href="#!" class="text-reset">
                                Messenger
                            </a>
                        </p> --}}
                        <p>
                            <a href="#!" class="text-reset">
                                Programs
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                3D Radio
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                Blog
                            </a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">
                                Contact Us
                            </a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p>
                            <i class="fas fa-home me-3"></i> P.O. Box 21, High Level Rd, Maharagama, Sri Lanka
                        </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            alphau@nie.edu.lk
                        </p>
                        <p>
                            <i class="fas fa-phone me-3"></i> +94 117 601 601
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <div class="text-center p-4">
            Copyright © 2023 - National Institute of Education -
            <a class="text-reset fw-bold" href="#">
                Designed and Implemented by Yuwan Audio Visuals
            </a>
            <a class="text-reset fw-bold" href="https://realit.lk">
                - Developed By Real IT PVT LTD
            </a>
        </div>
    </footer>
    {{-- footer ends --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
<script src="
https://cdn.jsdelivr.net/npm/howler@2.2.4/dist/howler.min.js
"></script>
</body>


</html>
