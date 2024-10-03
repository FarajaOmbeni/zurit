<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_res/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QZMJCGHRR4"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-QZMJCGHRR4');
</script>

<body>

    @extends('layouts.adminbar')
    @include('layouts.app')

    <div class="col-md-8 offset-md-2" style="position: relative;">
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Add Users</h2>
            {{-- Display success message --}}
            @if (session('success'))
                <div style="display: flex; justify-content: center; align-items: center;">
                    <div class="alert alert-success" id="success-alert" style="width: 50%;">
                        {{ session('success')['message'] }}
                    </div>
                </div>

                <script>
                    setTimeout(function() {
                        $('#success-alert').fadeOut('fast');
                    }, {{ session('success')['duration'] }});
                </script>
            @endif

            {{-- Display error message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="book_form" id="addBookForm">
                <form method="POST" action="/add_users">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone">
                    <button type="submit">Add User</button>
                </form>
            </div>
            <div class="book_form" id="addBookForm" style="margin-top: 50px">
                <h2 class="mt-2">Add Multiple Users</h2>
                <div class="alert alert-warning">
                    The Excel file should contain the following columns: name, email, phone.
                </div>

                <form method="POST" action="/import" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Choose Excel File</label>
                        <input type="file" name="file" id="file" class="form-control" accept=".xlsx, .xls">
                    </div>

                    <!-- Table to display the preview -->
                    <div id="review-section" style="display:none;">
                        <h4>Review Data Before Uploading</h4>
                        <table id="preview-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <!-- Add more columns as needed -->
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submit-btn" disabled>Import</button>
                </form>
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
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('blog_message');

        function confirmDelete() {
            var confirmation = confirm("Are you sure you want to delete this event?");
            if (confirmation) {
                alert("Event deleted successfully.");
            }
            return confirmation;
        }

        document.getElementById('file').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const reader = new FileReader();

            reader.onload = function(event) {
                const data = new Uint8Array(event.target.result);
                const workbook = XLSX.read(data, {
                    type: 'array'
                });

                // Assume the data is in the first sheet
                const firstSheetName = workbook.SheetNames[0];
                const worksheet = workbook.Sheets[firstSheetName];

                // Convert sheet to JSON
                const jsonData = XLSX.utils.sheet_to_json(worksheet, {
                    header: 1
                });

                // Render only the first 5 data rows (excluding the header)
                const tableBody = document.querySelector("#preview-table tbody");
                tableBody.innerHTML = ''; // Clear existing rows

                // Limit the rows to a maximum of 5
                const maxRowsToShow = 5;
                jsonData.slice(1, maxRowsToShow + 1).forEach((row) => {
                    const rowElement = document.createElement('tr');
                    row.forEach((cellData) => {
                        const cell = document.createElement('td');
                        cell.textContent = cellData;
                        rowElement.appendChild(cell);
                    });

                    tableBody.appendChild(rowElement);
                });

                // Show the review section and enable the submit button
                document.getElementById('review-section').style.display = 'block';
                document.getElementById('submit-btn').disabled = false;
            };

            reader.readAsArrayBuffer(file);
        });
    </script>
</body>

</html>
