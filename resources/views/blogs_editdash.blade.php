@include('layouts.head')
<title>Blogs Dash</title>
<link rel="stylesheet" href="{{ asset('admin_res/css/style.css') }}?v={{ time() }}">


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

    @include('layouts.foot')


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
