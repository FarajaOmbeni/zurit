@include('layouts.head')
<title>Blogs Dash</title>
<link rel="stylesheet" href="admin_res/css/style.css">
</head>

<body>

    @include('layouts.editorbar')


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

    @include('layouts.foot')
</body>

</html>
