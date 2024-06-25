<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin_res/css/style.css') }}?v={{ time() }}">

    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>

    @extends('layouts.adminbar')
    @include('layouts.app')

    <div class="col-md-8 offset-md-2" style="position: relative;">
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">User Management</h2>
            <div class="book_form" id="editUserForm">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <label for="name" class="label">Name:</label>
                    <input value="{{ $user->name }}" type="text" name="name" id="name" class="input" required>

                    <label for="email" class="label">Email:</label>
                    <input value="{{ $user->email }}" type="email" name="email" id="email" class="input" required>

                    <label for="phone" class="label">Phone:</label>
                    <input value="{{ $user->phone }}" type="text" name="phone" id="phone" class="input" required>

                    <label for="role" class="label">Role:</label>
                    <input value="{{ $user->role }}" type="text" name="role" id="role" class="input" required>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        <hr class="separator">
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
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script></script>
</body>

</html>
