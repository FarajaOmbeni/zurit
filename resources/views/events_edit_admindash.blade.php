@include('layouts.head')
<title>Events Dash</title>
<link rel="stylesheet" href="{{ asset('admin_res/css/style.css') }}?v={{ time() }}">
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


    <div class="col-md-8 offset-md-2" style="position: relative;">
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Events Management</h2>
            <div class="book_form" id="addBookForm">
                <form method="POST" action="/editEvent/{{ $event->id }}" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Name of the Event</label>
                    <input value="{{ $event->name }}" type="text" name="name" id="name" required>
                    <label for="date">Date of the event</label>
                    <input {{ $event->date }} type="date" name="date" id="date" required>
                    <label for="registration_link">Registration Link</label>
                    <input value="{{ $event->registration_link }}"" type="text" name="registration_link"
                        id="registration_link" required>
                    <label for="price">Free or Paid?</label> <br>
                    <select name="price" id="" required>
                        <option value="free">Free</option>
                        <option value="paid">Paid</option>
                    </select> <br><br>
                    <label for="image">Event ArtWork</label>
                    <input type="file" name="image" id="image" placeholder="Event Image" required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <hr class="separator">
    </div>

    @include('layouts.foot')
</body>

</html>
