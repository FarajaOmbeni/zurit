<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Advisory</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('advisory_res/css/style.css') }}">

    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>

    <nav class="navbar nav-dark navbar-expand-lg fixed-top py-3">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('img/logo-white3.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/about') }}">About us</a>
                    </li>
                    <li class="nav-item dropdown d-md-inline">
                        <a class="nav-link dropdown-toggle" href="#" id="prosperityToolsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Prosperity Tools
                        </a>
                        <div class="dropdown-menu" aria-labelledby="prosperityToolsDropdown">
                            <a class="dropdown-item" href="{{ url('budgetplanner') }}">Budget Planner</a>
                            <a class="dropdown-item" href="{{ url('networthcalculator') }}">Networth Calculator</a>
                            <a class="dropdown-item" href="{{ url('debtmanager') }}">Debt Manager</a>
                            <a class="dropdown-item" href="{{ url('investmentplanner') }}">Investment Planner</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('training') }}">Training</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('advisory') }}">Advisory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contactus') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('books') }}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('blogs') }}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('login') }}"><button class="btn-item">Join Us</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="light-section2">
        <div class="solutions_heading">
            <h2>Advisory Solutions</h2>
        </div>
        <div class="container-fluid mt-custom">
            <div class="row">
                <div class="col-md-6 corporates-section">
                    <h3>Corporates</h3>
                    <ul>
                        <li>Wealth planning & Management – Goal setting, Debt ,Management, Retirement Planning , Estate
                            Planning, Insurance Planning</li>
                        <li>Strategy preparation</li>
                        <li>Investment Execution</li>
                    </ul>
                </div>
                <div class="col-md-6 individuals-section">
                    <h3>Individuals</h3>
                    <ul>
                        <li>Transactional Advisory and Fund Raising</li>
                        <li>Business Review and Re-Engineering</li>
                        <li>Business Support</li>
                        <li>Strategy preparation and review</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5">
        <div class="container">
            <div class="row">
                <div class="footer-item col-md-3">
                    <!--<img src="img/logo-white3.png" style="width: 100%; height: 80%;"alt="">-->
                    <p>Address: Zuidier Complex</p>
                    <p>Ngumo, Off Mbagathi Road</p>
                    <p>Nairobi, KE </p>
                    <p>Phone: 254-7000000</p>
                    <p>Email: info@zuritconsulting.com</p>
                </div>
                <div class="footer-item col-md-3">
                    <p class="footer-item-title">Services</p>
                    <p class="footer-text">Budget Management:</p>
                    <p>Financial Training</p>
                    <p>Investment Advisory</p>
                    <p>Debt Management</p>
                </div>
                <div class="footer-item col-md-3">
                    <p class="footer-item-title">Links</p>
                    <a href="">About Us</a>
                    <a href="">Home</a>
                    <a href="">Training</a>
                    <a href="">Contact Us</a>
                </div>
                <div class="footer-item col-md-3">
                    <p class="footer-item-title">Get In Touch</p>
                    <form action="{{ route('subscribe') }}" method="post">
                        @csrf
                        <div class="mb-3 pb-3">
                            <label for="exampleInputEmail1" class="form-label pb-3">Enter your email and we'll send
                                you more information.</label>
                            <input type="email" name="email" placeholder="Your Email" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
                <div class="copyright pt-4 text-center text-muted">
                    <p>&copy; 2024 ZURIT CONSULTING</p>

                </div>
            </div>
    </footer>
    <div class="fb2022-copy">©️ 2024 copyright</div>

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
