@include('layouts.head')
<title>Events Dash</title>
<link rel="stylesheet" href="admin_res/css/style.css">
</head>

<body>

    @extends('layouts.adminbar')


    <div class="col-md-8 offset-md-2" style="position: relative;">
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Manage Videos</h2>
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
            <div class="book_form" id="addBookForm">
                <form method="POST" action="/post_video">
                    @csrf
                    <label for="video_link">Insert Video Link</label>
                    <input type="text" name="video_link" id="name">
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.foot')

    <script>
        CKEDITOR.replace('blog_message');

        function confirmDelete() {
            var confirmation = confirm("Are you sure you want to delete this event?");
            if (confirmation) {
                alert("Event deleted successfully.");
            }
            return confirmation;
        }
    </script>
</body>

</html>
