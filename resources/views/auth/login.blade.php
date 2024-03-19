<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Login</title>
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

            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title">
                    User Login
                </span>

                @if ($errors->any())
                    <div class="alert alert-danger" id="error-alert">
                        {{ $errors->first('message') }}
                    </div>

                    <script>
                        setTimeout(function() {
                            $('#error-alert').fadeOut('fast');
                        }, {{ $errors->first('duration') }});
                    </script>
                @endif

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <label for="email" class="label-input100">Email Address</label>
                    <input id="email" type="text" class="input100" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>
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

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <label for="password" class="label-input100">Password</label>
                    <input id="password" type="password" class="input100" name="password" required
                        autocomplete="current-password">
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

                <div class="wrap-input100">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="{{ route('password.request') }}">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{ url('register') }}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Additional Styles and Scripts -->


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
<script src="login_res/js/main.js"></script>

</html>
