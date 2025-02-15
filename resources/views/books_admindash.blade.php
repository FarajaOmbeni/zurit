@include('layouts.head')
<title>Books Dash</title>
<link rel="stylesheet" href="admin_res/css/style.css">
</head>

<body>

    @extends('layouts.adminbar')


    <div class="col-lg-8 offset-lg-2">
        <div id="content" class="p-md-5 pt-5">
            <h2 class="mb-4">Book Management</h2>
            @if (session('success'))
                <div class="alert alert-success" id="success-alert">
                    @if (is_array(session('success')))
                        {{ implode(', ', session('success')) }}
                    @else
                        {{ session('success') }}
                    @endif
                </div>

                <script>
                    setTimeout(function() {
                        $('#success-alert').fadeOut('fast');
                    }, 3000);
                </script>
            @endif
            <!-- Cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <!-- Card content -->
                        <button id="addBookButton" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add Book
                        </button>
                    </div>
                </div>
            </div>
            <div id="formContainer" class="hidden">
                <div class="overlay"></div>
                <div class="book_form" id="addBookForm">
                    <form method="POST" action="{{ route('bookadd.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="book_image" placeholder="Book Image">
                        <input type="text" name="book_name" placeholder="Book Name">
                        <input type="text" name="description" placeholder="Book Description">
                        <input type="number" name="current_price" placeholder="Current Price">
                        <input type="number" name="previous_price" placeholder="Previous Price">
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <hr class="separator">

            <div class="mt-4">
                <ul id="userList">
                    @php
                        $books = \App\Models\Book::all();
                    @endphp

                    @if ($books->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Book Image</th>
                                        <th>Book Title</th>
                                        <th>Description</th>
                                        <th>Current Price</th>
                                        <th>Previous Price</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->book_image }}</td>
                                            <td>{{ $book->book_name }}</td>
                                            <td>{{ $book->description }}</td>
                                            <td>{{ $book->current_price }}</td>
                                            <td>{{ $book->previous_price }}</td>
                                            <td>
                                                <a href="/editbook/{{ $book->id }}"
                                                    class="btn btn-warning btn-sm editEventButton">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('bookdelete', ['id' => $book->id]) }}"
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

    @include('layouts.foot')
</body>

</html>
