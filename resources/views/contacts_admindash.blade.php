@include('layouts.app')
@extends('layouts.adminbar')

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="col-lg-8 offset-lg-2">
    <div id="content" class="p-md-5 pt-5">
        <h1>Contact Messages</h1>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->userMessage }}</td>
                            <td>{{ $contact->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
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

<!-- Include necessary scripts -->
<script src="{{ asset('admin_res/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin_res/js/popper.js') }}"></script>
<script src="{{ asset('admin_res/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_res/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".edit-button").on("click", function() {
            var userId = $(this).data("user-id");
            $("#editUserForm").attr("action", "{{ url('/users') }}" + "/" + userId);

            $.get("{{ url('/users') }}" + "/" + userId + "/edit", function(user) {
                $("#name").val(user.name);
                $("#email").val(user.email);
                $("#phone").val(user.phone);
                $("#role").val(user.role);
                // Set other fields as necessary
            });
        });
    });
</script>
</div>
