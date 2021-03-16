@extends('layouts.front')

@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
        <div class="container">

            <div class="navbar-left">
                <button class="navbar-toggler" type="button">&#9776;</button>
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img class="logo-dark" src="{{ asset('/img/logo-dark.png') }}" alt="logo">
                    <img class="logo-light" src="{{ asset('/img/logo-light.png') }}" alt="logo">
                </a>
            </div>

            <section class="navbar-mobile">
                <span class="navbar-divider d-mobile-none"></span>

                <ul class="nav nav-navbar">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users <span class="arrow"></span></a>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="{{route('users.index')}}">List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" target="_blank" href="{{route('users.create')}}">Create</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->full_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

            </section>
        </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h1>Birthdays</h1>
                    <p class="lead-2 opacity-90 mt-6">
                        {{ __('You have ') }} {{ $celebrated->count() }} {{ Str::plural('birthday', $celebrated->count()) . __(' today') }}
                    </p>

                </div>
            </div>

        </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">

        <section class="section bg-gray p-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-xl-9 mx-auto">

                        @foreach($celebrated as $user)
                            <div class="card hover-shadow-7 my-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="blog-single.html"><img class="fit-cover position-absolute h-100" src="{{asset('storage/users/' . $user->picture)}}" alt="..."></a>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="p-7">
                                            <h4>{{ $user->fullName }}</h4>
                                            <p>{{ $user->age }} {{ Str::plural('year', $user->age) }} old</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row gap-y align-items-center">

                <div class="col-6 col-lg-3">
                    <a href="{{ route('welcome') }}"><img src="{{ asset('/img/logo-dark.png') }}" alt="logo"></a>
                </div>

                <div class="col-6 col-lg-3 text-right order-lg-last">
                    <div class="social">
                        <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                        <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                        <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
                        <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
                    </div>
                </div>

                <div class="col-lg-6"></div>

            </div>
        </div>
    </footer><!-- /.footer -->
@endsection
