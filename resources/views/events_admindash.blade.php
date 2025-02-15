@include('layouts.head')
<title>Events Dash</title>
<link rel="stylesheet" href="admin_res/css/style.css">
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
                <form method="POST" action="/events_admindash" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Name of the Event</label>
                    <input type="text" name="name" id="name">
                    <label for="date">Date of the event</label>
                    <input type="date" name="date" id="date">
                    <label for="registration_link">Registration Link</label>
                    <input type="text" name="registration_link" id="registration_link">
                    <label for="price">Free or Paid?</label> <br>
                    <select name="price" id="">
                        <option value="free">Free</option>
                        <option value="paid">Paid</option>
                    </select> <br><br>
                    <label for="image">Event ArtWork</label>
                    <input type="file" name="image" id="image" placeholder="Event Image">
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <hr class="separator">
        <div class="">
            <ul id="userList">

                @if ($events->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>ArtWork</th>
                                    <th>Registration Link</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td>{{ $event->image }}</td>
                                        <td>{{ $event->registration_link }}</td>
                                        <td>
                                            <a href="/editEvent/{{ $event->id }}"
                                                class="btn btn-warning btn-sm editEventButton">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                style="display: inline-block;" onsubmit="return confirmDelete()">
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
