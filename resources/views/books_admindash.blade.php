<!DOCTYPE html>
<html lang="en">

<head>
    <title>Books Dash</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_res/css/style.css">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>

    @extends('layouts.adminbar')
    @include('layouts.app')

    <div class="col-lg-8 offset-lg-2">
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Book Management</h2>
            <!-- Cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <!-- Card content -->
                        <button id="addBookButton" class="btn btn-primary">
                            <i class="fas fa-user-plus"></i> Add Book
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
                        $sql = 'SELECT id,book_image,book_name,description, current_price,previous_price FROM books';
                        $result = $conn->query($sql);
                        
                        // Start table with Bootstrap classes
                        echo '<table class="table table-bordered table-striped">';
                        
                        if ($result->num_rows > 0) {
                            // Output column names with Bootstrap classes
                            echo '<thead class="thead-dark"><tr><th>ID</th><th>Book Image</th><th>Name</th><th>Description</th><th>Current Price</th><th>Previous Price</th><th>Edit</th><th>Delete</th></tr></thead>';
                        
                            // Output data of each row with Bootstrap classes
                            echo '<tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['book_image'] . '</td>';
                                echo '<td>' . $row['book_name'] . '</td>';
                                echo '<td>' . $row['description'] . '</td>';
                                echo '<td>' . $row['current_price'] . '</td>';
                                echo '<td>' . $row['previous_price'] . '</td>';
                        
                                // Add Edit button/link with Bootstrap styling
                                echo '<td><a href="' . route('user.edit', ['user' => $row['id']]) . '" class="btn btn-warning btn-sm">Edit</a></td>';
                        
                                // Add Delete button/link with Bootstrap styling
                                echo '<td><a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Delete</a></td>';
                        
                                echo '</tr>';
                            }
                            echo '</tbody>';
                        } else {
                            // Display a message with colspan if there are no results
                            echo '<tr><td colspan="6">0 results</td></tr>';
                        }
                        
                        // End table
                        echo '</table>';
                        
                        // Close connection
                        $conn->close();
                        ?>
                    </ul>
                </div>
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
