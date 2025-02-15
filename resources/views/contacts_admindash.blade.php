@extends('layouts.adminbar')
@include('layouts.head')
</head>
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

@include('layouts.foot')

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
