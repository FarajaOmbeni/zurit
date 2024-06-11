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
                    <a href="/"><img class="logo" src="admin_res/images/logo-white3.png" alt=""></a><span><br>User Dashboard</span>
                    <ul class="list-unstyled components mb-5 flex-container">
                            <li class="{{ Request::is('user_goalsetting') ? 'active' : '' }}">
                                <a href="{{ url('user_goalsetting') }}"><span class="fa fa-bullseye icon-class"></span>
                                    Goal Setting</a>
                            </li>
                            <li class="{{ Request::is('user_budgetplanner') ? 'active' : '' }}">
                                <a href="{{ url('/user_budgetplanner') }}"><span class="bi bi-wallet icon-class"></span>
                                    Budget Planner</a>
                            </li>
                            <li class="{{ Request::is('user_investmentplanner') ? 'active' : '' }}">
                                <a href="{{ url('/user_investmentplanner') }}"><span
                                        class="bi bi-building icon-class"></span> Investment Planner</a>
                            </li>
                            <li class="{{ Request::is('user_networthcalc') ? 'active' : '' }}">
                                <a href="{{ url('/user_networthcalc') }}"><span
                                        class="bi bi-calculator icon-class"></span> Networth Calculator</a>
                            </li>
                            <li class="{{ Request::is('user_debtcalc') ? 'active' : '' }}">
                                <a href="{{ url('/user_debtcalc') }}"><span class="bi bi-bank icon-class"></span> Debt
                                    Manager</a>
                            </li>
                            <li class="{{ Request::is('account_userdash') ? 'active' : '' }}">
                                <a href="{{ url('/account_userdash') }}"><span class="fa fa-book mr-3"></span> Account
                                    Management</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="fa fa-sign-out mr-3"></span> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
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
