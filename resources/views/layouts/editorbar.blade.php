<html>
<head>
    <title>Editor Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_res/css/style.css">
</head>
<div class="container d-flex align-items-stretch">
    <!-- New UI Sidebar -->
    <nav id="sidebar" class="img" style="background-image: url(admin_res/images/bg_1.jpg);">
        <div class="p-4">
            <a href="index.html"><img class="logo" src="admin_res/images/logo-white3.png" alt=""></a><span><br>Editor Dashboard</span>              
            <ul class="list-unstyled components mb-5 flex-container">
                <li class="active">
                    <a href="{{ url('/blogs_editordash') }}"><span class="fa fa-user mr-3"></span> Blogs Management</a>
                </li>
                <li>
                    <a href="{{ url('/books_editordash') }}"><span class="fa fa-book mr-3"></span> Books Management</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-cogs mr-3"></span> Account Management</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <span class="fa fa-sign-out mr-3"></span> Logout
                    </a>
                
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <!-- New Menu Item -->
            </ul>
        </div>
    </nav>
</html>
