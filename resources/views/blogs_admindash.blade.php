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
</head>

<body>

    @extends('layouts.adminbar')
    @include('layouts.app')

    <div class="col-md-8 offset-md-2">
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Blogs Management</h2>
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
            <!-- Cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <button id="addBookButton" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i> Add Blog
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
                        <!--<input type="text" name="blog_summary" placeholder="Blog Summary">-->
                        <textarea id="blog_message" name="blog_message" placeholder="Blog Message"></textarea>
                        <!--<textarea name="blog_message" form="usrform">Enter text here...</textarea>-->
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <hr class="separator">
            <!-- Book List -->
            <div class="table-responsive">
                <div class="mt-4">
                    <ul id="userList">
                        <?php
                        // Database connection details
                        $hostname = 'localhost';
                        $username = 'root';
                        $password = '';
                        $database = 'zurit';
                        
                        // Create connection
                        $conn = new mysqli($hostname, $username, $password, $database);
                        
                        // Check connection
                        if ($conn->connect_error) {
                            die('Connection failed: ' . $conn->connect_error);
                        }
                        
                        // Query to get book details
                        $sql = 'SELECT id, blog_image,blog_title,  blog_message, created_at FROM blogs';
                        $result = $conn->query($sql);
                        
                        // Start table with Bootstrap classes
                        echo '<table class="table table-bordered table-striped">';
                        
                        if ($result->num_rows > 0) {
                            // Output column names with Bootstrap classes
                            echo '<thead class="thead-dark"><tr><th>ID</th><th>Blog Image</th><th>Blog Title</th><th>Blog Message</th><th></th><th></th></tr></thead>';
                        
                            // Output data of each row with Bootstrap classes
                            echo '<tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['blog_image'] . '</td>';
                                echo '<td>' . $row['blog_title'] . '</td>';
                                echo '<td>' . substr($row['blog_message'], 0, 100) . '...</td>';
                        
                                // Add Edit button/link with Bootstrap styling
                                echo '<td><a href="' . route('blogedit', ['id' => $row['id']]) . '" class="btn btn-warning btn-sm">Edit</a></td>';
                        
                                // Add Delete button/link with Bootstrap styling
                                echo '<td>
                                                    <form action="' .
                                    route('blogdelete', ['id' => $row['id']]) .
                                    '" method="POST">
                                                        ' .
                                    csrf_field() .
                                    '
                                                        ' .
                                    method_field('DELETE') .
                                    '
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>';
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
        </div>
    </div>

    <!-- Include necessary scripts -->
    <script src="admin_res/js/jquery.min.js"></script>
    <script src="admin_res/js/popper.js"></script>
    <script src="admin_res/js/bootstrap.min.js"></script>
    <script src="admin_res/js/main.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('blog_message');
    </script>
</body>

</html>
