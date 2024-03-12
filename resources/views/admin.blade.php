@include('layouts.app')
@extends('layouts.adminbar')

<div class="col-lg-8 offset-lg-2">
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">User Management</h2>

        <hr class="separator">

        <div class="mt-4">
            <ul id="userList">
                @php
                $users = \App\Models\User::all();
                @endphp

                @if ($users->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                    <button type="button" class="btn btn-warning btn-sm editUserButton" data-toggle="modal" data-target="#editUserModal" data-userid="{{ $user->id }}">Edit</button>                                        
                                    </td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                              style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
</div>
                @else
                    <tr><td colspan="5">0 results</td></tr>
                @endif
            </ul>
        </div>

        <!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="editUserForm" method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Telephone:</label>
                        <input type="text" class="" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="role">Role:</label>
                        <input type="text" class="" id="role" name="role">
                    </div>

                    <!-- Add other fields as necessary -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
            $(".editUserButton").on("click", function () {
                var userId = $(this).data("userid");
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
        
        $(document).ready(function() {
            $('#editUserModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var userId = button.data('userid'); // Extract info from data-* attributes
            
                // Fetch user details
                $.get('/user/' + userId, function(user) {
                    // Populate form fields
                    $('#editUserForm #name').val(user.name);
                    $('#editUserForm #email').val(user.email);
                    $('#editUserForm #phone').val(user.phone);
                    $('#editUserForm #role').val(user.role);
                
                    // Update form action
                    $('#editUserForm').attr('action', '/user/' + userId);
                });
            });
        });


        </script>
    </div>
