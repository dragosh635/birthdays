@extends('layouts.front')


@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">

            <div class="navbar-left mr-4">
                <button class="navbar-toggler" type="button">&#9776;</button>
                <a class="navbar-brand" href="#">
                    <img class="logo-dark" src="{{ asset('/img/logo-dark.png') }}" alt="logo">
                    <img class="logo-light" src="{{ asset('/img/logo-light.png') }}" alt="logo">
                </a>
            </div>

            <section class="navbar-mobile">
                @if (Route::has('login'))
                    <div class="d-flex align-items-center ml-auto">
                        @auth
                            <a class="btn btn-sm btn-link text-dark ml-lg-5 mr-2" href="{{ url('/home') }}">Birthdays</a>
                        @else
                            @if (Route::has('register'))
                                <a class="btn btn-sm btn-success" href="{{ route('register') }}">Sign up</a>
                            @endif

                            <a class="btn btn-sm btn-link text-dark ml-lg-5 mr-2" href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                @endif
            </section>

        </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    <header class="header h-fullscreen" style="background-image: linear-gradient(135deg, #f9f7ff 0%, #fff 50%, #f6f3ff 100%);">
        <div class="container">
            <div class="row align-items-center h-100">
                <div class="col-lg-7">
                    <h1 class="fw-600">Birthday <span class="text-warning">Reminder.</span><br><span class="text-info">Never</span> forget the important days.</h1>
                    <p class="lead mt-5 mb-4">Get notified about the birthdays of your loved ones on a daily basis</p>
                    <p class="gap-xy">
                        @auth
                            <a class="btn btn-round btn-outline-secondary mw-200" href="{{ route('home') }}">Go to birthdays</a>
                        @else
                            <a class="btn btn-round btn-primary mw-200" href="{{ route('register') }}">Sign up</a>
                        @endauth
                    </p>
                </div>
            </div>
        </div>
    </header><!-- /.header -->



    <!-- Footer -->
    <footer class="footer bg-gray py-9">
        <div class="container">
            <div class="row gap-y">

                <div class="col-md-6 col-xl-4">
                    <p><a href="#"><img src="{{ asset('/img/logo-dark.png') }}" alt="logo"></a></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis mi ut ex congue gravida. </p>
                </div>
            </div>
        </div>
    </footer><!-- /.footer -->

    <!-- Cookie notification -->
    <div id="popup-cookie-3" class="popup text-white bg-dark col-10 py-4 border-0" data-position="bottom-center" data-animation="slide-up" data-autoshow="2000">
        <div class="row gap-y align-items-center">
            <div class="col-md">
                This website uses cookies to ensure you get the best experience on our website. <a href="#">Lean more</a>
            </div>

            <div class="col-md-auto">
                <button class="btn btn-sm btn-outline-light" data-dismiss="popup">Got it</button>
            </div>
        </div>
    </div>
@endsection
