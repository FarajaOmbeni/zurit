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

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


    <style>
        .ck-editor__editable {
            min-height: 200px;
            max-height: 250px;
            max-width: 55em;
            overflow-y: auto;
        }
    </style>
</head>

<body>

    @extends('layouts.adminbar')
    @include('layouts.app')

    <div class="col-md-8 offset-md-2" style="position: relative;">
        <div id="content" class="p-md-5 pt-5">
            <h2 class="mb-4">Blogs Management</h2>
            <div class="book_form" id="addBookForm">
                <form method="POST" action="{{ route('blogedit.update', $blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    <label for="blog_image">Blog Image</label>
                    <input type="file" name="blog_image" id="blog_image" required>
                    <label for="blog_tag">Blog Tag</label>
                    <input value="{{ $blog->blog_tag }}" type="text" name="blog_tag" id="blog_tag" required>
                    <label for="blog_title">Blog Title</label>
                    <input value="{{ $blog->blog_title }}" type="text" name="blog_title" id="blog_title" required>
                    <label for="blog_message">Blog Message</label>
                    <textarea id="editor" name="content" required>{{ $blog->blog_message }}</textarea>
                    <button type="submit">Submit</button>
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

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
