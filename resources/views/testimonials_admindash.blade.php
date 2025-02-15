@include('layouts.head')
<title>Testimonials Dash</title>
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
                <h3>Add Testimonials</h3>
                <div class="book_form" id="addBookForm">
                    <form method="POST" action="/addTestimonial" enctype="multipart/form-data">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name">
                        <label for="image">Image</label>
                        <input type="file" name="image">
                        <!--<input type="text" name="blog_summary" placeholder="Blog Summary">-->
                        @include('layouts.editor') <br>
                        <button type="submit">Add Testimonial</button>
                    </form>
                </div>
            </div>

            <div>
                <h3>Testimonials</h3>
                <div class="mt-4">
                    @if ($testimonials->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Content</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($testimonials->count() > 0)
                                        @foreach ($testimonials as $testimonial)
                                            <tr>
                                                <td>{{ $testimonial->name }}</td>
                                                <td>{{ $testimonial->image }}</td>
                                                <td>{{ strip_tags($testimonial->content) }}</td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editTestimonialModal{{ $testimonial->id }}">
                                                        Edit
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="editTestimonialModal{{ $testimonial->id }}" tabindex="-1"
                                                        role="dialog"
                                                        aria-labelledby="editTestimonialModalLabel{{ $testimonial->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editTestimonialModalLabel{{ $testimonial->id }}">
                                                                        Edit Testimonial</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" id="addBookForm">
                                                                    <form
                                                                        action="{{ route('testimonial.update', $testimonial->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <label for="name">Name</label>
                                                                        <input type="text"
                                                                            value="{{ $testimonial->name }}"
                                                                            name="name" id="" required>
                                                                        <label for="image">Image</label>
                                                                        <input type="file" name="image" required>
                                                                        <label for="content">Content</label><br>
                                                                        <textarea name="content" required>{{ strip_tags($testimonial->content) }}</textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                        </div>
                        </td>
                        <td>
                            <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No testimonials available.</td>
                    </tr>
                    @endif
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
