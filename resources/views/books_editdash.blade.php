@include('layouts.head')
<title>Blogs Dash</title>
<link rel="stylesheet" href="{{ asset('admin_res/css/style.css') }}?v={{ time() }}">
</head>

<body>

    @extends('layouts.adminbar')


    <div class="col-md-8 offset-md-2" style="position: relative;">
        <div id="content" class="p-md-5 pt-5">
            <h2 class="mb-4">Edit Book</h2>
            <div class="book_form" id="addBookForm">
                <form method="POST" action="{{ route('bookedit.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="book_image">Book Image</label>
                    <input type="file" name="book_image" id="book_image">
                    <label for="book_name">Book Name</label>
                    <input value="{{ $book->book_name }}" type="text" name="book_name" id="book_name" required>
                    <label for="description">Book Description</label>
                    <input value="{{ $book->description }}" type="text" name="description" id="description" required>
                    <label for="current_price">Current Price</label>
                    <input value="{{ $book->current_price }}" type="number" name="current_price" id="current_price"
                        required>
                    <label for="previous_price">Previous Price</label>
                    <input value="{{ $book->previous_price }}" type="number" name="previous_price" id="previous_price"
                        required>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
        <hr class="separator">
    </div>

    @includes('layouts.foot')
</body>

</html>
