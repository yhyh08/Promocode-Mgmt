@extends('layouts.authLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <img src="{{ asset('img/sitelogo.png') }}" class="img-fluid img-size pl-0" alt="">
                    <h2 class="pl-0 pt-2">{{ __('Login') }}</h2>
                    <p class="pl-0">Don't have an account? 
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    </p>
                    
                    <div class="p-0 mb-4">
                        <a href={{url('auth/google')}} class="btn text-left border border-primary login-google">
                            <img src="{{ asset('img/google.png') }}" width="40px" class="img-fluid" alt="">
                            <strong>Login With Google</strong>
                        </a> 
                    </div>

                    <label for="email" class="col-form-label pl-0">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br><br>
                    <label for="password" class="col-form-label pl-0">{{ __('Password') }}</label>
                    
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="row pl-0 py-2">
                        <div class="col-lg-6 col-md-12 col-sm-12 pt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-lg-end">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link fp" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                
                    <div class="pl-0">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
