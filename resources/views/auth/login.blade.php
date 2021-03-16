@extends('layouts.front')

@section('content')
    <!-- Main Content -->
    <div class="layout-centered bg-img layout-container" style="background-image: url({{ asset('img/4.jpg') }});">
        <main class="main-content">

            <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
                <h5 class="mb-7">Sign into your account</h5>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                    </div>

                    <div class="form-group flexbox py-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label">Remember me</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="text-muted small-2" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Login</button>
                    </div>
                </form>

                <div class="divider">Or Login With</div>
                <div class="text-center">
                    <a class="btn btn-circle btn-sm btn-facebook mr-2" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="btn btn-circle btn-sm btn-google mr-2" href="#"><i class="fa fa-google"></i></a>
                    <a class="btn btn-circle btn-sm btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
                </div>

                <hr class="w-30">

                <p class="text-center text-muted small-2">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>

        </main><!-- /.main-content -->
    </div>

@endsection
