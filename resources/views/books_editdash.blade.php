<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blogs Dash</title>
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

    @extends('layouts.adminbar')
    @include('layouts.app')

    <div class="col-md-8 offset-md-2" style="position: relative;">
        <div id="content" class="p-md-5 pt-5">
            <h2 class="mb-4">Edit Book</h2>
            <div class="book_form" id="addBookForm">
                <form method="POST" action="{{ route('bookedit.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="book_image">Book Image</label>
                    <input type="file" name="book_image" id="book_image">
                    <label for="book_name">Book Name</label>
                    <input value="{{ $book->book_name }}" type="text" name="book_name" id="book_name" required>
                    <label for="description">Book Description</label>
                    <input value="{{ $book->description }}" type="text" name="description" id="description" required>
                    <label for="current_price">Current Price</label>
                    <input value="{{ $book->current_price }}" type="number" name="current_price" id="current_price"
                        required>
                    <label for="previous_price">Previous Price</label>
                    <input value="{{ $book->previous_price }}" type="number" name="previous_price" id="previous_price"
                        required>
                    <button type="submit">Update</button>
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
</body>

</html>
