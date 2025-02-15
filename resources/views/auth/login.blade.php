<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Login</title>
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

            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title">
                    User Login
                </span>

                @if ($errors->any())
                    <div class="alert alert-danger" id="error-alert">
                        {{ $errors->first() }}
                    </div>

                    <script>
                        setTimeout(function() {
                            $('#error-alert').fadeOut('fast');
                        }, 3000); // Set the duration to 3 seconds
                    </script>
                @endif
                @if (session('status'))
                    <div class="alert alert-success" id="status-alert">
                        {{ session('status') }}
                    </div>

                    <script>
                        setTimeout(function() {
                            $('#status-alert').fadeOut('fast');
                        }, 3000); // Set the duration to 3 seconds
                    </script>
                @endif

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
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

                <!-- <div class="container-login100-form-btn">
                        <a href="{{ url('auth/google') }}" class="login100-form-btn">
                            <i class="fa fa-google" style="margin-right:20px; font-size:30px;"></i> Google Sign In
                        </a>
                    </div> -->

                <div class="text-center">
                    <a class="txt2" href="{{ url('register') }}">
                        <span class="txt1">
                            Not registered?
                        </span> Click Here to Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="{{ route('password.request') }}">
                        Username / Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Additional Styles and Scripts -->
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

</html>
