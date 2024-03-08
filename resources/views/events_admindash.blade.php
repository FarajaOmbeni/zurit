<!DOCTYPE html>
<html lang="en">
<head>
    <title>Events Dash</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_res/css/style.css">
</head>
<body>

@extends('layouts.adminbar')
@include('layouts.app')

<div class="col-md-8 offset-md-2">
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Events Management</h2>
    <div class="book_form" id="addBookForm">
        <form method="POST" action="/events_admindash" enctype="multipart/form-data">
        @csrf
        <label for="name">Name of the Event</label>
        <input type="text" name="name" id="name">
        <label for="date">Date of the event</label>
        <input type="date" name="date" id="date">
        <label for="image">Event ArtWork</label>
        <input type="file" name="image" id="image" placeholder="Event Image">
        <button type="submit">Submit</button>
    </form>
    </div>
</div>
        <hr class="separator">
        <div class="mt-4">
            <ul id="userList">

                @if ($events->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Event Name</th>
                                <th>Date</th>
                                <th>ArtWork</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td>{{ $event->image }}</td>
                                    <td>
                                    <button type="button" class="btn btn-warning btn-sm editUserButton" data-toggle="modal" data-target="#editUserModal" data-userid="{{ $event->id }}">Edit</button>                                        
                                    </td>
                                    <td>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                              style="display: inline-block;">
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
                    <tr><td colspan="5">0 results</td></tr>
                @endif
            </ul>
        </div>
</div>



<!-- Include necessary scripts -->
<script src="admin_res/js/jquery.min.js"></script>
<script src="admin_res/js/popper.js"></script>
<script src="admin_res/js/bootstrap.min.js"></script>
<script src="admin_res/js/main.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'blog_message' );
</script>
</body>
</html>