<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Add Contacts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <!-- Link your CSS files -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="admin_res/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- PWA  -->
        <meta name="theme-color" content="#fff" />
        <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">
    </head>

    <body>

        @extends('layouts.adminbar')

        <div class="col-md-8 offset-md-2">
            <div id="content" class="p-md-5 pt-5">
                <h2 class="mb-4">Add Marketing Contacts</h2>
                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(function() {
                            $('#success-alert').fadeOut('fast');
                        }, 3000);
                    </script>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <div class="border px-1 py-4 mb-4">
                    <h3 class="mb-4"> Add one Contact</h3>
                    <form action="/add_one_contact" method="post">
                        @csrf
                        <label for="email">Email </label>
                        <input type="email" name="email" id="email" required><br>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" required><br>
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" required><br>
                        <button type="submit" class="btn btn-primary">Add Contact</button>
                    </form>
                </div>

                <div class="border px-1 py-4 mb-4">
                    <h3>Upload Contacts from CSV</h3>
                    <form action="/upload_contacts" method="post">
                        @csrf
                        <input type="file" name="contacts" id="contacts" required>
                        <button class="btn btn-primary">Upload Contacts</button>
                    </form>
                </div>

                <div class="border px-1 py-4 mb-4">
                    <h3>Uploaded Contacts</h3>
                    <table>
                        <thead>
                            <th class="border">Email</th>
                            <th class="border">Name</th>
                            <th class="border">Phone Number</th>
                        </thead>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td class="border">{{ $contact->email }}</td>
                                <td class="border">{{ $contact->name }}</td>
                                <td class="border">{{ $contact->phone }}</td>
                            </tr>
                        @endforeach
                    </table>
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

    </body>

</html>
