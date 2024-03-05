<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="login_res/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="login_res/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="login_res/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="login_res/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="login_res/css/util.css">
    <link rel="stylesheet" type="text/css" href="login_res/css/main.css">
    <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
</head>

@extends('layouts.app')

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <a href="{{ url('/') }}"><img src="login_res/images/logo-white2.png" alt="IMG"></a>
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title">
                        User Registration
                    </span>

                    <div class="wrap-input100 validate-input">
                        <label for="name" class="label-input100">{{ __('Name') }}</label>
                        <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="wrap-input100 validate-input">
                        <label for="email" class="label-input100">{{ __('Email') }}</label>
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input">
                        <label for="phone" class="label-input100">{{ __('Phone') }}</label>
                        <input id="phone" type="text" class="input100 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input">
                        <label for="password" class="label-input100">{{ __('Password') }}</label>
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input">
                        <label for="password-confirm" class="label-input100">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                           Already have an account?
                        </span>
                        <a class="txt2" href="{{ route('login') }}">
                            Sign in
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
   

    <script src="login_res/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="login_res/vendor/bootstrap/js/popper.js"></script>
    <script src="login_res/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="login_res/vendor/select2/select2.min.js"></script>
    <script src="login_res/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="js/main.js"></script>

