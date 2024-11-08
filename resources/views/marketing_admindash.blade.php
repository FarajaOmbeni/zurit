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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QZMJCGHRR4"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-QZMJCGHRR4');
</script>

<body>
    @include('layouts.app')
    @extends('layouts.adminbar')

    <div class="col-lg-5 offset-lg-3 mt-5">
        <div class="content">
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
            @if (session('error'))
                <div class="alert alert-success" id="success-alert">
                    {{ session('error')['message'] }}
                </div>

                <script>
                    setTimeout(function() {
                        $('#success-alert').fadeOut('fast');
                    }, {{ session('success')['duration'] }});
                </script>
            @endif

            <div>
                <form id="messageForm">
                    @csrf
                    <textarea name="message" placeholder="Enter Message" id="messageContent" cols="30" rows="10"></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>

            <div>
                <h3>Send Marketing Email</h3>
                <div class="book_form" id="addBookForm">
                    <form method="POST" action="/sendMessage" enctype="multipart/form-data">
                        @csrf
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Title">
                        <!--<input type="text" name="blog_summary" placeholder="Blog Summary">-->
                        @include('layouts.editor') <br>
                        <button type="submit">Send Email to All</button>
                    </form>
                </div>
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


</body>

</html>
