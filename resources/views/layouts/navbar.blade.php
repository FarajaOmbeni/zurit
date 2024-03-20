<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}?v={{ time() }}">
    <link rel="icon" href="{{ asset('img/ico_logo.webp') }}">
    <!-- <script src="https://www.google.com/recaptcha/enterprise.js?render=6LfFWpgpAAAAAFmqOvRms4BS4Exr58fISintayc7"></script> -->
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
</head>

<body>
    <nav class="navbar nav-dark navbar-expand-lg navbar-dark fixed-top py-1">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('img/logo-white3.webp') }}" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="offcanvas-link"><a href="/">Home</a></div>
                    <div class="nav-menu">
                        <input id="toggle" type="checkbox" checked>
                        <div class="dropdown-title">
                            <a class="tools-link">Services</a>
                            <img class="arrow-icon" src="{{ asset('img/icon/arrow.png') }}" alt="">
                        </div>
                        <ul>
                            <li><a class="dropdown-link" href="{{ url('training') }}">Training</a></li>
                            <li><a class="dropdown-link" href="{{ url('advisory') }}">Advisory</a></li>
                            <li><a class="dropdown-link" href="{{ url('chama') }}">Chama Advisory</a></li>
                            <li><a class="dropdown-link" href="{{ url('trustees') }}">Trustees Advisory</a></li>
                        </ul>
                    </div>
                    <div class="offcanvas-link"><a href="{{ url('books') }}">Books</a></div>
                    <div class="offcanvas-link"><a href="{{ url('blogs') }}">Blogs</a></div>
                    <div class="nav-menu">
                        <input id="toggle" type="checkbox" checked>
                        <div class="dropdown-title">
                            <a class="tools-link">Prosperity Tools</a>
                            <img class="arrow-icon" src="{{ asset('img/icon/arrow.png') }}" alt="">
                        </div>
                        <ul>
                            <li><a class="dropdown-link" href="{{ url('budgetplanner') }}">Budget Planner</a></li>
                            <li><a class="dropdown-link" href="{{ url('networthcalculator') }}">Networth Calculator</a>
                            </li>
                            <li><a class="dropdown-link" href="{{ url('debtmanager') }}">Debt Manager</a></li>
                            <li><a class="dropdown-link" href="{{ url('investmentplanner') }}">Investment Planner</a>
                            </li>
                        </ul>
                    </div>
                    <div class="offcanvas-link"><a href="{{ url('about') }}">About Us</a></div>
                    <div class="offcanvas-link"><a href="{{ url('contactus') }}">Contact Us</a></div>
                    <div class="offcanvas-link"><a href="{{ url('login') }}">Log In</a></div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('about') }}">About us</a>
                    </li>
                    <li
                        class="nav-item dropdown d-md-inline {{ Request::is('budgetplanner', 'networthcalculator', 'debtmanager', 'investmentplanner') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="prosperityToolsDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Prosperity Tools
                        </a>
                        <div class="dropdown-menu" aria-labelledby="prosperityToolsDropdown">
                            <a class="dropdown-item" href="{{ url('budgetplanner') }}">Budget Planner</a>
                            <a class="dropdown-item" href="{{ url('networthcalculator') }}">Networth Calculator</a>
                            <a class="dropdown-item" href="{{ url('debtmanager') }}">Debt Manager</a>
                            <a class="dropdown-item" href="{{ url('investmentplanner') }}">Investment Planner</a>
                        </div>
                    </li>
                    <li
                        class="nav-item dropdown d-md-inline {{ Request::is('budgetplanner', 'networthcalculator', 'debtmanager', 'investmentplanner') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="prosperityToolsDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="prosperityToolsDropdown">
                            <a class="dropdown-item" href="{{ url('training') }}">Training</a>
                            <a class="dropdown-item" href="{{ url('advisory') }}">Advisory</a>
                            <a class="dropdown-item" href="{{ url('chama') }}">Chama Advisory</a>
                            <a class="dropdown-item" href="{{ url('trustees') }}">Trustees Advisory</a>
                        </div>
                    </li>
                    <!--<li class="nav-item {{ Request::is('advisory') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('advisory') }}">Advisory</a>
                </li>-->
                    <li class="nav-item {{ Request::is('books') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('books') }}">Books</a>
                    </li>
                    <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('blogs') }}">Blogs</a>
                    </li>
                    <li class="nav-item {{ Request::is('contactus') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('contactus') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('login') }}"><button class="btn-item">Join Us</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>

</html>