<!DOCTYPE html>
<html lang="en">

<head>
    <title>Events Dash</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin_res/css/style.css') }}?v={{time()}}">
</head>

<body>

    @extends('layouts.adminbar')
    @include('layouts.app')

    <div class="col-md-8 offset-md-2" style="position: relative;">
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Events Management</h2>
            <div class="book_form" id="addBookForm">
                <form method="POST" action="/editEvent/{{$event->id}}" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Name of the Event</label>
                    <input value="{{$event->name}}" type="text" name="name" id="name" required>
                    <label for="date">Date of the event</label>
                    <input {{$event->date}} type="date" name="date" id="date" required>
                    <label for="registration_link">Registration Link</label>
                    <input value="{{$event->registration_link}}"" type="text" name="registration_link" id="registration_link" required>
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



    <!-- Include necessary scripts -->
    <script src="admin_res/js/jquery.min.js"></script>
    <script src="admin_res/js/popper.js"></script>
    <script src="admin_res/js/bootstrap.min.js"></script>
    <script src="admin_res/js/main.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
    </script>
</body>

</html>
