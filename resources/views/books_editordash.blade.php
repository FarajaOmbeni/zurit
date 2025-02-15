@include('layouts.head')
<title>Books Dash</title>
<link rel="stylesheet" href="admin_res/css/style.css">
</head>

<body>

    @include('layouts.editorbar')


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
            <div class="col-md-6">
                <div class="card">
                    <!-- Card content -->
                    <button class="btn btn-danger">
                        <i class="fas fa-user-minus"></i> Delete Book
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
                    echo '<thead class="thead-dark"><tr><th>ID</th><th>Book Image</th><th>Name</th><th>Description</th><th>Current Price</th><th>Previous Price</th><th> </th><th> </th></tr></thead>';
                
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
                
                        // Add Edit button/link
                        echo '<td><a href="' . route('user.edit', ['user' => $row['id']]) . '">Edit</a></td>';
                
                        // Add Delete button/link
                        echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
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

    @include('layouts.foot')
</body>

</html>
