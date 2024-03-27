<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_res/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div id="content">
        <div class="d-flex toggled" id="wrapper">
            <button class="btn btn-primary menu-button" id="menu-toggle"><i class="fa fa-bars"></i></button>
            <nav id="sidebar" class="img" style="background-image: url(admin_res/images/bg_1.jpg);">
                <div class="p-4">
                    <a href="/"><img class="logo" src="{{ asset('admin_res/images/logo-white3.png') }}" alt=""></a><span><br>Admin Dashboard</span>
                    <ul class="list-unstyled components mb-5 flex-container">
                        <li class="{{ Request::is('admin') ? 'active' : '' }}">
                            <a href="{{ url('/admin') }}"><span class="fa fa-home mr-3"></span> User Management</a>
                        </li>
                        <li class="{{ Request::is('blogs_admindash') ? 'active' : '' }}">
                            <a href="{{ url('/blogs_admindash') }}"><span class="fa fa-user mr-3"></span> Blogs Management</a>
                        </li>
                        <li class="{{ Request::is('books_admindash') ? 'active' : '' }}">
                            <a href="{{ url('/books_admindash') }}"><span class="fa fa-book mr-3"></span> Books Management</a>
                        </li>
                        <li class="{{ Request::is('events_admindash') ? 'active' : '' }}">
                            <a href="{{ url('/events_admindash') }}"><span class="fa fa-money mr-3"></span> Events Management</a>
                        </li>
                        <li class="{{ Request::is('insights_admindash') ? 'active' : '' }}">
                            <a href="{{ url('/insights_admindash') }}"><span class="fa fa-sticky-note mr-3"></span> System Insights</a>
                        </li>
                        <li class="{{ Request::is('contacts_admindash') ? 'active' : '' }}">
                            <a href="{{ url('/contacts_admindash') }}"><span class="fa fa-phone mr-3"></span> Contacts Dash</a>
                        </li>
                        <li class="{{ Request::is('subscription_admindash') ? 'active' : '' }}">
                            <a href="{{ url('/subscription_admindash') }}"><span class="fa fa-envelope mr-3"></span> Subscriptions Dash</a>
                        </li>
                        <li class="{{ Request::is('marketing_admindash') ? 'active' : '' }}">
                            <a href="{{ url('/marketing_admindash') }}"><span class="fa fa-cogs mr-3"></span> Marketing emails</a>
                        </li>
                        <li class="{{ Request::is('account_admindash') ? 'active' : '' }}">
                            <a href="{{ url('/account_admindash') }}"><span class="fa fa-cogs mr-3"></span> Account Details</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="fa fa-sign-out mr-3"></span> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");

            if ($("#wrapper").hasClass("toggled")) {
                $("#content").removeClass("blur-effect");
            } else {
                $("#content").addClass("blur-effect");
            }
        });
    </script>
</body>

</html>
