<head>
    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
            <a href="{{ url('/') }}"><img src="{{ asset('login_res/images/logo-white2.png') }}" alt="IMG"></a>
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <span class="login100-form-title">
                        Reset Password
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <label for="email" class="label-input100">Email Address</label>
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>
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

                    <div class="wrap-input100">
                        <label for="password-confirm" class="label-input100">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('login_res/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('login_res/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('login_res/vendor/animate/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('login_res/vendor/css-hamburgers/hamburgers.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('login_res/vendor/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('login_res/css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('login_res/css/main.css') }}">

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

<script src="{{ asset('login_res/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('login_res/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('login_res/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('login_res/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('login_res/vendor/tilt/tilt.jquery.min.js') }}"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    });
</script>
<script src="{{ asset('login_res/js/main.js') }}"></script>


