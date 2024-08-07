<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- PWA  -->
        <meta name="theme-color" content="#fff" />
        <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('login_res/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('login_res/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('login_res/vendor/animate/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('login_res/vendor/css-hamburgers/hamburgers.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('login_res/vendor/select2/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('login_res/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('login_res/css/main.css') }}">
    </head>

    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                        <a href="{{ url('/') }}"><img src="{{ asset('login_res/images/logo-white2.png') }}"
                                alt="IMG"></a>
                    </div>

                    <form class="login100-form validate-form" method="POST"
                        action="{{ route('verification.resend') }}">
                        @csrf
                        <span class="login100-form-title">
                            Verify Your Email Address
                        </span>

                        <div class="wrap-input100">
                            Before proceeding, please check your email for a verification link.
                            If you did not receive the email,
                            <button type="submit" class="button p-2 m-3 align-baseline">click here to request
                                another</button>.
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- PWA --}}
        <script src="{{ asset('/sw.js') }}"></script>
        <script>
            if ("serviceWorker" in navigator) {
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

        <!-- Scripts -->
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
    </body>

</html>
