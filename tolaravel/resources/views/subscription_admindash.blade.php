@include('layouts.app')
@extends('layouts.adminbar')

<div class="col-lg-8 offset-lg-2">
    <div id="content" class="p-4 p-md-5 pt-5">
    <h1>Subscription Emails</h1>

<table class="table">
    <thead>
        <tr>
            <th>Email</th>
            <th>Subscription Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subscriptions as $subscription)
            <tr>
                <td>{{ $subscription->email }}</td>
                <td>{{ $subscription->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
    

        <!-- Include necessary scripts -->
        <script src="{{ asset('admin_res/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin_res/js/popper.js') }}"></script>
        <script src="{{ asset('admin_res/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin_res/js/main.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function () {
                $(".edit-button").on("click", function () {
                    var userId = $(this).data("user-id");
                    $("#editUserForm").attr("action", "{{ url('/users') }}" + "/" + userId);

                    $.get("{{ url('/users') }}" + "/" + userId + "/edit", function (user) {
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
