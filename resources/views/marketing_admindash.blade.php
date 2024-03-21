<!DOCTYPE html>
<html lang="en">

<head>
    <title>Marketing Dash</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_res/css/style.css">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>
    @include('layouts.app')
    @extends('layouts.adminbar')

    <div class="col-lg-8 offset-lg-3 mt-5">
        <div class="container">

            <form action="{{ route('send.message') }}" method="post">
                @csrf
                <div class="form-group-plaintext">
                    <label for="title">Message Title</label>
                    <input type="text" name="title" class="form-control-plaintext" required>
                </div>
                <div class="form-group">
                    <label for="content">Message Content</label>
                    <textarea name="content" id="editor" class="form-control"></textarea>
                </div>
                <div class="form-group-plaintext">
                    <label for="user_ids">Select User</label>
                    <select name="user_ids[]" class="form-control-plaintext" required multiple>
                        @foreach ($subscribedUsers as $user)
                            <option value="{{ $user->id }}">{{ $user->email }} (Subscribed)</option>
                        @endforeach
                        @foreach ($allUsers as $user)
                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Send Email</button>
            </form>
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

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('content');
    </script>
</body>

</html>
