@include('layouts.head')
<title>Blogs Dash</title>
<link rel="stylesheet" href="admin_res/css/style.css">
</head>

<body>

    @extends('layouts.adminbar')

    <div class="col-md-8 offset-md-2 pl-5">
        <div id="content">
            <h2 class="mb-4">Blogs Management</h2>
            @if (session('success'))
                <div style="display: flex; justify-content: center; align-items: center;">
                    <div class="alert alert-success" id="success-alert" style="width: 50%;">
                        {{ session('success')['message'] }}
                    </div>
                </div>

                <script>
                    setTimeout(function() {
                        $('#success-alert').fadeOut('fast');
                    }, {{ session('success')['duration'] }});
                </script>
            @endif
            @if (session('error'))
                <div style="display: flex; justify-content: center; align-items: center;">
                    <div class="alert alert-danger" id="error-alert">
                        {{ session('error')['message'] }}
                    </div>
                </div>

                <script>
                    setTimeout(function() {
                        $('#error-alert').fadeOut('fast');
                    }, {{ session('error')['duration'] }});
                </script>
            @endif
            <!-- Cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <button id="addBookButton" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add Blog
                        </button>
                    </div>
                </div>
            </div>
            <div id="formContainer" class="hidden">
                <div class="overlay"></div>
                <div class="book_form" id="addBookForm">
                    <form method="POST" action="/blogadd" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="blog_image" placeholder="Blog Image">
                        <input type="text" name="blog_tag" placeholder="Blog Tag">
                        <input type="text" name="blog_title" placeholder="Blog Title">
                        <!--<input type="text" name="blog_summary" placeholder="Blog Summary">-->
                        @include('layouts.editor')
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <hr class="separator">

            <div class="mt-4">
                <ul id="userList">
                    @php
                        $blogs = \App\Models\Blog::all();
                    @endphp

                    @if ($blogs->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Blog Image</th>
                                        <th>Blog Title</th>
                                        <th>Blog Message</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->id }}</td>
                                            <td>{{ $blog->blog_image }}</td>
                                            <td>{{ $blog->blog_title }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($blog->blog_message, 100, '...') }}
                                            </td>
                                            <td>
                                                <a href="/editblog/{{ $blog->id }}"
                                                    class="btn btn-warning btn-sm editEventButton">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('blogdelete', ['id' => $blog->id]) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <tr>
                            <td colspan="5">0 results</td>
                        </tr>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    </div>
    @include('layouts.foot')


</body>

</html>
