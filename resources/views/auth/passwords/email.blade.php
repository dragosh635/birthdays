@extends('layouts.front')
@section('content')
    <div class="layout-centered bg-img layout-container" style="background-image: url({{ asset('img/4.jpg') }});">
        <!-- Main Content -->
        <main class="main-content">

            <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
                <h5 class="mb-6">Recover your password</h5>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Email Address">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button class="btn btn-lg btn-block btn-primary" type="submit">Reset Password</button>
                </form>

            </div>

        </main><!-- /.main-content -->
    </div>
@endsection
