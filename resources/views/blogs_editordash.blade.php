<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blogs Dash</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_res/css/style.css">

    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>

    @include('layouts.editorbar')
    @extends('layouts.app')

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Blogs Management</h2>
        <!-- Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <!-- Card content -->
                    <button id="addBookButton" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Add Blog
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <!-- Card content -->
                    <button id="addBookButton" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Update Blog
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <!-- Card content -->
                    <button class="btn btn-danger">
                        <i class="fas fa-user-minus"></i> Delete Blog
                    </button>
                </div>
            </div>
        </div>
        <div id="formContainer" class="hidden">
            <div class="overlay"></div>
            <div class="book_form" id="addBookForm">
                <form method="POST" action="{{ route('blogadd.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="blog_image" placeholder="Blog Image">
                    <input type="text" name="blog_tag" placeholder="Blog Tag">
                    <input type="text" name="blog_title" placeholder="Blog Title">
                    <input type="text" name="blog_summary" placeholder="Blog Summary">
                    <input type="text" name="blog_message" placeholder="Blog Message">
                    <!--<textarea name="blog_message" form="usrform">Enter text here...</textarea>-->
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <hr class="separator">
        <!-- Book List -->
        <div class="mt-4">
            <ul id="userList">
                <?php
                include 'dbconnect_local.php';
                
                // Query to get book details
                $sql = 'SELECT id, blog_image,blog_title, blog_summary, blog_message, created_at FROM blogs';
                $result = $conn->query($sql);
                
                // Start table with Bootstrap classes
                echo '<table class="table table-bordered table-striped">';
                
                if ($result->num_rows > 0) {
                    // Output column names with Bootstrap classes
                    echo '<thead class="thead-dark"><tr><th>ID</th><th>Blog Image</th><th>Blog Title</th><th>Blog Summary</th><th>Blog Message</th></tr></thead>';
                
                    // Output data of each row with Bootstrap classes
                    echo '<tbody>';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['blog_image'] . '</td>';
                        echo '<td>' . $row['blog_title'] . '</td>';
                        echo '<td>' . $row['blog_summary'] . '</td>';
                        echo '<td>' . $row['blog_message'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                } else {
                    echo '<tr><td colspan="5">0 results</td></tr>';
                }
                
                // End table
                echo '</table>';
                
                echo '</table>';
                
                // Close connection
                $conn->close();
                ?>
            </ul>
        </div>
    </div>

    {{-- PWA --}}
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
    {{-- END OF PWA --}}

    <!-- Include necessary scripts -->
    <script src="admin_res/js/jquery.min.js"></script>
    <script src="admin_res/js/popper.js"></script>
    <script src="admin_res/js/bootstrap.min.js"></script>
    <script src="admin_res/js/main.js"></script>
</body>

</html>
