<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="login_res/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="login_res/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="login_res/vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="login_res/vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="login_res/vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="login_res/css/util.css">
        <link rel="stylesheet" type="text/css" href="login_res/css/main.css">
        <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
        <!-- PWA  -->
        <meta name="theme-color" content="#fff" />
        <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">
    </head>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <a href="{{ url('/') }}"><img src="login_res/images/logo-white2.png" alt="IMG"></a>
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @if (session('success'))
                        <div class="alert alert-success" id="success-alert">
                            {{ session('success')['message'] }}
                        </div>

                        <script>
                            setTimeout(function() {
                                $('#success-alert').fadeOut('fast');
                            }, {{ session('success')['duration'] }});
                        </script>
                    @endif
                    @if (session('errors'))
                        @if (session('errors')->has('password'))
                            <div class="alert alert-danger">
                                {{ session('errors')->first('password') }}
                            </div>
                        @endif
                        @if (session('errors')->has('email'))
                            <div class="alert alert-danger">
                                {{ session('errors')->first('email') }}
                            </div>
                        @endif
                    @endif
                    @csrf
                    <span class="login100-form-title">
                        User Registration
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Your full name">
                        <input class="input100 @error('name') is-invalid @enderror" id="name" type="text"
                            name="name" placeholder="Name" value="{{ old('name') }}" autocomplete=off>
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


                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100 @error('email') is-invalid @enderror" type="text" name="email"
                            placeholder="Email" value="{{ old('email') }}">
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

                    <div class="wrap-input100 validate-input" data-validate = "Enter your phone number">
                        <input class="input100 @error('phone') is-invalid @enderror" id="phone" type="text"
                            name="phone" placeholder="Telephone"
                            oninput="javascript: if (this.value.match(/[^0-9]/g)) this.value = this.value.replace(/[^0-9]/g, ''); if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength = "10" value="{{ old('phone') }}" autocomplete=off>
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

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                            placeholder="Password">
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

                    <div class="wrap-input100 validate-input" data-validate = "Password does not match">
                        <input class="input100 @error('password_confirmation') is-invalid @enderror"
                            id="password-confirm" type="password" name="password_confirmation"
                            placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('password_confirmation'))
                            <span class="error-message">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            By signing up you agree to our
                        </span>
                        <a class="txt2" href="{{ route('termsandconditions') }}">
                            Terms and Conditions
                        </a>
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

    {{-- PWA --}}
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
    {{-- END OF PWA --}}

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
