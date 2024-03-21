<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="admin_res/css/style.css">-->
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>

    @include('layouts.app')
    @extends('layouts.adminbar')

    <div class="col-lg-8 offset-lg-2">
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="row">
                <div class="col-lg-4 col-xlg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ asset('advisory_res/img/user.jpg') }}" class="img-circle rounded-circle mb-3"
                                width="150" />
                            <h4 class="card-title">{{ $user->name }}</h4>
                            <h6 class="card-subtitle">
                                @if ($user->role == 0)
                                    Normal User
                                @elseif($user->role == 1)
                                    Editor
                                @elseif($user->role == 2)
                                    Admin
                                @endif
                            </h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="mdi mdi-account-network"></i>
                                        <font class="font-medium">{{ $user->some_data }}</font>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="mdi mdi-camera"></i>
                                        <font class="font-medium">{{ $user->some_other_data }}</font>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xlg-9">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material mx-2" method="post"
                                action="{{ route('update-adminprofile') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control-plaintext form-control-line"
                                            name="name" value="{{ old('name', $user->name) }}"
                                            style="border-bottom: 1px solid rgba(255, 255, 255, 0.1);" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control-plaintext form-control-line"
                                            name="email" value="{{ old('email', $user->email) }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890"
                                            class="form-control-plaintext form-control-line" name="phone"
                                            value="{{ old('phone', $user->phone) }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
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
    
    <!-- Include necessary scripts -->
    <script src="admin_res/js/jquery.min.js"></script>
    <script src="admin_res/js/popper.js"></script>
    <script src="admin_res/js/bootstrap.min.js"></script>
    <script src="admin_res/js/main.js"></script>
</body>

</html>
