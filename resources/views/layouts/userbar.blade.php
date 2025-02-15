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
        <!-- Hamburger Icon -->
        <div id="hamburger-menu">
            <i class="fa fa-bars"></i>
        </div>

        <!-- Sidebar (hidden by default for small screens) -->
        <div id="mobile-sidebar" class="sidebar-hidden">
            <ul class="list-unstyled components mb-5">
                <li class="{{ Request::is('user_budgetplanner') ? 'active' : '' }}">
                    <a href="{{ url('/user_budgetplanner') }}"><i class="fa fa-pie-chart" aria-hidden="true"
                            style="margin-right: 8px"></i> Budget
                        Planner</a>
                </li>
                <li class="{{ Request::is('user_debtcalc') ? 'active' : '' }}">
                    <a href="{{ url('/user_debtcalc') }}"><i class="fa fa-money" aria-hidden="true"
                            style="margin-right: 8px"></i> Debt Manager</a>
                </li>
                <li class="{{ Request::is('user_goalsetting') ? 'active' : '' }}">
                    <a href="{{ url('user_goalsetting') }}"><i class="fa fa-bullseye" aria-hidden="true"
                            style="margin-right: 8px"></i> Goal
                        Setting</a>
                </li>
                <li class="{{ Request::is('user_investmentplanner') ? 'active' : '' }}">
                    <a href="{{ url('/user_investmentplanner') }}"><i class="fa fa-line-chart" aria-hidden="true"
                            style="margin-right: 8px"></i>
                        Investment Planner</a>
                </li>
                <li class="{{ Request::is('user_networthcalc') ? 'active' : '' }}">
                    <a href="{{ url('/user_networthcalc') }}"><i class="fa fa-balance-scale" aria-hidden="true"
                            style="margin-right: 8px"></i> Networth
                        Calculator</a>
                </li>
                <li class="{{ Request::is('user_calculators') ? 'active' : '' }}">
                    <a href="{{ url('/user_calculators') }}"><i class="fa fa-calculator" aria-hidden="true"
                            style="margin-right: 8px"></i>Calculators</a>
                </li>
                <li class="{{ Request::is('account_userdash') ? 'active' : '' }}">
                    <a href="{{ url('/account_userdash') }}"><i class="fa fa-user" aria-hidden="true" style="margin-right: 8px"></i> Account Management</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="fa fa-sign-out mr-3"></span> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <div class="d-flex toggled" id="wrapper">
            <nav id="sidebar" class="img" style="background-image: url(admin_res/images/bg_1.jpg);">
                <div class="p-4">
                    <a href="/"><img class="logo" src="admin_res/images/logo-white3.png"
                            alt=""></a><span><br>User Dashboard</span>
                    <ul class="list-unstyled components mb-5 flex-container">
                        <li class="{{ Request::is('user_budgetplanner') ? 'active' : '' }}">
                            <a href="{{ url('/user_budgetplanner') }}"><i class="fa fa-pie-chart" aria-hidden="true"
                                    style="margin-right: 8px"></i>
                                Budget Planner</a>
                        </li>
                        <li class="{{ Request::is('user_debtcalc') ? 'active' : '' }}">
                            <a href="{{ url('/user_debtcalc') }}"><i class="fa fa-money" aria-hidden="true"
                                    style="margin-right: 8px"></i> Debt
                                Manager</a>
                        </li>
                        <li class="{{ Request::is('user_goalsetting') ? 'active' : '' }}">
                            <a href="{{ url('user_goalsetting') }}"><i class="fa fa-bullseye" aria-hidden="true"
                                    style="margin-right: 8px"></i>
                                Goal Setting</a>
                        </li>
                        <li class="{{ Request::is('user_investmentplanner') ? 'active' : '' }}">
                            <a href="{{ url('/user_investmentplanner') }}"><i class="fa fa-line-chart"
                                    aria-hidden="true" style="margin-right: 8px"></i> Investment Planner</a>
                        </li>
                        <li class="{{ Request::is('user_networthcalc') ? 'active' : '' }}">
                            <a href="{{ url('/user_networthcalc') }}"><i class="fa fa-balance-scale" aria-hidden="true"
                                    style="margin-right: 8px"></i>
                                Networth Calculator</a>
                        </li>
                        <li class="{{ Request::is('user_calculators') ? 'active' : '' }}">
                            <a href="{{ url('/user_calculators') }}"><i class="fa fa-calculator" aria-hidden="true"
                                    style="margin-right: 8px"></i>Calculators</a>
                        </li>
                        <li class="{{ Request::is('account_userdash') ? 'active' : '' }}">
                            <a href="{{ url('/account_userdash') }}"><i class="fa fa-user" aria-hidden="true" style="margin-right: 8px"></i> Account Management</a>
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
        document.getElementById('hamburger-menu').addEventListener('click', function() {
            const sidebar = document.getElementById('mobile-sidebar');
            if (sidebar.classList.contains('sidebar-visible')) {
                sidebar.classList.remove('sidebar-visible');
            } else {
                sidebar.classList.add('sidebar-visible');
            }
        });
    </script>
</body>

</html>
