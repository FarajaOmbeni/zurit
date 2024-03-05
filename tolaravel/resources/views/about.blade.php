<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <title>Zurit_about</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="about_res/style.css">
    <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
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
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('about') }}">About us</a>
                </li>
                <li class="nav-item dropdown d-md-inline {{ Request::is('budgetplanner', 'networthcalculator', 'debtmanager', 'investmentplanner') ? 'active' : '' }}">
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
                <li class="nav-item {{ Request::is('training') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('training') }}">Training</a>
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
      <div class="container mainmargin">
    <div class="row">
        <div class="main col-md-8">
            <h2 class="text-center pb-4">Our History</h2>
            <p class="text-gray">
                At Zurit Financial Consulting, we have a rich history of helping individuals and businesses achieve their financial goals. Our journey began with a vision to provide tailored financial solutions, and we have stayed true to that mission.
            </p>
            <h4>Why Choose Us:</h4>
            <ul class="text-list">
                <li>Experienced Financial Experts</li>
                <li>Customized Financial Strategies</li>
                <li>Unwavering Commitment to Your Prosperity</li>
            </ul>
            <p class="text-gray">
                We take pride in our experienced team of financial experts who provide personalized solutions to meet your unique financial challenges. Our commitment to your financial prosperity drives us to work tirelessly to help you achieve your goals.
            </p>
            <div class="team-wrapper text-center">
                <h2>Meet Our Team</h2>
                <div class="team">
                <div class="col-12 team-item text-center">
                <div class="photo" style="position: relative; margin: auto;"><img src="img/Liz.webp" alt="Elizabeth Nkukuu" style="position: absolute; left: -10%;"></div>
                    <div class="text-center">
                        <strong><span>Elizabeth Nkukuu</span></strong>
                        <span><br>Founder - Team Leader</span>
                    </div>
                </div>
                <div class="team-item">
                    <div class="photo"><img class="uniform-img" src="img/Brian.webp" alt="Brian Salau" style="width: 100%; height: auto;"></div>
                    <span class="name d-block">Brian Salau</span>
                    <span class="position">Manager</span>
                </div>
                    <div class="team-item">
                        <div class="photo"><img class="uniform-img" src="img/Noel.webp" alt="Noel Jentrix" style="width: 100%; height: auto; margin-top:-80px;"></div>
                        <span class="name d-block">Noel Jentrix</span>
                        <span class="position">Client Relations</span>
                    </div>
                    <div class="team-item">
                        <div class="photo"><img class="uniform-img" src="img/Davis.webp" alt="Davis Otao" style="width: 100%; height: auto;"></div>
                        <span class="name d-block">Davis Otao</span>
                        <span class="position">Developer</span>
                    </div>
                    <div class="team-item">
                        <div class="photo"><img class="uniform-img" src="img/Bramwel.webp" alt="Bramwel Tum" style="width: 100%; height: auto;"></div>
                        <span class="name d-block">Bramwel Tum</span>
                        <span class="position">Developer</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar col-md-4">
            <!--<div class="input-group input-group-sm mt-4">
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                <div class="input-group-append">
                    <span class="input-group-text color" id="inputGroup-sizing-sm">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>-->
            <div class="recent-post">
    <h4>Who We Are</h4>
    <p>
        We are a bespoke Wealth Management Company focused on both individuals and corporates looking at growing wealth sustainably.
    </p>
    <h4>Our Vision</h4>
    <p>
        Making financial prosperity the norm.
    </p>
    <h4>Mission</h4>
    <p>
        Deliver simple efficient Financial Trainings and Advisory Solutions which form the cornerstone of thriving investments.
    </p>
    <h4>Our Values</h4>
    <ul class="text-list">
        <li>Excellence</li>
        <li>Innovation</li>
        <li>Collaboration</li>
        <li>Accountability</li>
        <li>Impact</li>
    </ul>
</div>
  <div class="sidebar-benefits-items pt-5">
    <h4>Why Choose Our Tools</h4>            
    <div class="sidebar-benefits-item">
        <div class="sidebar-benefits-item-title d-flex">
            <div class="icon"><img src="img/debt.jpg" alt="Debt Manager Icon"></div>
            <p class="title">Debt Manager</p>
        </div>
        <div class="text-gray">
            <p>
              Our Debt Manager tool provides a comprehensive solution to track, organize, and optimize your debt repayment strategy.
            </p>
        </div>
    </div>

    <!-- Investment Planner Benefits -->
    <div class="sidebar-benefits-item">
        <div class="sidebar-benefits-item-title d-flex">
            <div class="icon"><img src="img/invest.jpg" alt="Investment Planner Icon"></div>
            <p class="title">Investment Planner</p>
        </div>
        <div class="text-gray">
            <p>
              Receive personalized investment strategies and insights to help you achieve your financial goals and build wealth over time.
            </p>
        </div>
    </div>

    <!-- Net Worth Calculator Benefits -->
    <div class="sidebar-benefits-item">
        <div class="sidebar-benefits-item-title d-flex">
            <div class="icon"><img src="img/networth.jpg" alt="Net Worth Calculator Icon"></div>
            <p class="title">Net Worth Calculator</p>
        </div>
        <div class="text-gray">
            <p>
              Our Net Worth Calculator provides a clear snapshot of your assets and liabilities, helping you make informed financial decisions.
            </p>
        </div>
    </div>

    <!-- Budget Planner Benefits -->
    <div class="sidebar-benefits-item">
        <div class="sidebar-benefits-item-title d-flex">
            <div class="icon"><img src="img/budget.jpg" alt="Budget Planner Icon"></div>
            <p class="title">Budget Planner</p>
        </div>
        <div class="text-gray">
            <p>
              Plan and manage your finances effectively, set realistic spending goals, and gain control over your expenses for a more secure financial future.
            </p>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-5">
          <div class="container">
            <div class="row">
              <div class="footer-item col-md-3">
              <!--<img src="img/logo-white3.png" style="width: 50% height: 50%"alt="">-->
                <p>Address: Zuidier Complex</p>
                <p>Ngumo, Off Mbagathi Road</p>
                <p>Nairobi, KE </p>
                <p>Phone: +254 759 092 412</p>
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
                      <label for="exampleInputEmail1" class="form-label pb-3">Enter your email and we'll send you more information.</label>
                      <input type="email" name="email" placeholder="Your Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Subscribe</button>
              </form>
              </div>
              <div class="copyright pt-4 text-center text-muted">
              <p>&copy; {{ date('Y') }} ZURIT CONSULTING</p>
                
            </div>
          </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/addshadow.js"></script>
</body>
</html>