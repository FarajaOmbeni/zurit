@include('layouts.head')
<title>Marketing Dash</title>
<link rel="stylesheet" href="admin_res/css/style.css">
</head>

<body>

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

    @include('layouts.foot')


</body>

</html>
