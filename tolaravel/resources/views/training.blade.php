<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <title>Training_Zurit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="training_res/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
      <!-- End Navbar -->

      <div class="carousel_section">
      <div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false">
        <!-- Left Control -->
        <a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <div class="carousel-inner" role="listbox">
            <!-- First training item -->
            <div class="carousel-item active">
                <div id="home" class="first-section" style="background-image:url('training_res/img/training.jpg');background-size: cover;
                background-position: center;">
                    <div class="dtab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <div class="big-tagline">
                                        <h2 data-animation="animated zoomInRight">Prosperity Blue Print</h2>
                                        <p class="lead">This masterclass is a 10-week program tailored to individuals, covering the fundamentals of personal finance and investments.</p>
                                        <p>We impart our clients with practical knowledge on:</p>
                                        <ul>
                                            <li>Wealth building principles.</li>
                                            <li>Best practices for building wealth.</li>
                                            <li>How and where to invest</li>
                                            <li>How to systemize your investment processes.</li>
                                        </ul>
                                        <a href="{{ url('contactus') }}" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div><!-- end container -->
                    </div>
                </div><!-- end section -->
            </div>
            <!-- End of first training item -->

            <!-- Second training item -->
            <div class="carousel-item">
                <div id="home" class="first-section" style="background-image:url('training_res/img/business.jpg');background-size: cover;
                background-position: center;">
                    <div class="dtab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <div class="big-tagline">
                                        <h2 data-animation="animated zoomInRight">Business Structuring Masterclass</h2>
                                        <p class="lead" data-animation="animated fadeInLeft">This masterclass is a 10-week program tailored to SMEs, imparting them with skills crucial in building resilient and sustainable businesses.</p>
                                        <p>We impart our clients with practical knowledge on:</p>
                                        <ul>
                                            <li>How to track business financial performance.</li>
                                            <li>How to streamline an organization's processes.</li>
                                            <li>This program accords the clients an opportunity to expand their networks.</li>
                                        </ul>
                                        <a href="contact.html" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div id="home" class="first-section" style="background-image:url('training_res/img/trustee.jpg');background-size: cover;
                background-position: center;">
                    <div class="dtab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <div class="big-tagline">
                                        <h2 data-animation="animated zoomInRight">Fundamentals of Investments-Trustees</h2>
                                        <p class="lead" data-animation="animated fadeInLeft">This is a three-day intense training for pension trustees focused on grounding them</p>
                                        <p>We impart our clients with practical knowledge on:</p>
                                        <ul>
                                            <li>Understand the operations of the Various asset classes</li>
                                            <li>Know how to create winning portfolios for schemes and the individuals</li>
                                            <li>Get a free consultation for the trustees</li>
                                        </ul>
                                        <a href="contact.html" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 

<div class="carousel_section">
    <h2 class="text-center" style="color: #F2AE30;">Our Solutions</h2>

    <div id="secondCarouselControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false">
        <!-- Left Control -->
        <a class="new-effect carousel-control-prev" href="#secondCarouselControls" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <!-- Right Control -->
        <a class="new-effect carousel-control-next" href="#secondCarouselControls" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <div class="carousel-inner" role="listbox">
            <!-- Chama Investment Solution (CIS) -->
            <div class="carousel-item active">
                <div id="home" class="first-section" style="background-image:url('training_res/img/Self-help-Group-Chama.jpg');background-size: cover; background-position: center;">
                    <div class="dtab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <div class="big-tagline">
                                        <h2 data-animation="animated zoomInRight">Chama Investment Solution (CIS)</h2>
                                        <p class="lead">We have many people in organized groups, and we know that the next growth part is in the corporatization of Chama’s. To help with this, we have a solution aimed specifically for this group.</p>
                                        <p>The Solution comprises of:</p>
                                        <ul>
                                            <li>Member Trainings</li>
                                            <li>Preparation of the Investment Policy Statement/Business plans and Strategy</li>
                                            <li>Investment Performance Review</li>
                                        </ul>
                                        <a href="{{ url('contactus') }}" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div><!-- end container -->
                    </div>
                </div><!-- end section -->
            </div>
            
            <!-- Trustees Investment Solution (TIS) -->
            <div class="carousel-item">
                <div id="home" class="first-section" style="background-image:url('training_res/img/people.jpg');background-size: cover; background-position: center;">
                    <div class="dtab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <div class="big-tagline">
                                        <h2 data-animation="animated zoomInRight">Trustees Investment Solution (TIS)</h2>
                                        <p class="lead">The Trustees owe their members duty of care and they need to work with professionals to offer these services. We work with the trustees in:</p>
                                        <ul>
                                            <li>Preparation and review of Investment Policy Statements</li>
                                            <li>Preparation and Review of the Investment Strategy</li>
                                            <li>Investment Advisory</li>
                                            <li>Independent Trusteeship</li>
                                            <li>Investment Training</li>
                                        </ul>
                                        <a href="{{ url('contactus') }}" class="hover-btn-new"><span>Contact Us</span></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="contact-us" id="contact-us">
  <div class="container">
    <h2 style= "color:#F2AE30;">Book an appointment with us Today!</h2>
    <div class="contact-content d-flex flex-column flex-lg-row">
      <div class="map mb-4 mb-lg-0">
        <!-- Rate Card -->
        <img src="training_res/img/rate-card.png" alt="Rate Card" style="width: 100%; height: 500px">
      </div>
      <div class="contact-form">
      <form action="{{ route('booking.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="datetime-local" name="booking_datetime" placeholder="Booking Date and Time" required>
        <textarea name="additional_information" placeholder="Additional Information"></textarea>
        <button type="submit">Book Now</button>
      </form>
          <div class="contact-icons">
          <div class="contact-icon">
              <i class="fas fa-phone"></i>
              <p>+254 759 092 412</p>
          </div>
          <div class="contact-icon">
              <i class="fas fa-map-marker-alt"></i>
              <p>Zuidier Complex, <br>Mbagathi Hospital Road<br>Off Mbagathi Way</p>
          </div>
          <div class="contact-icon">
              <i class="fas fa-envelope"></i>
              <p>info@zuritconsulting.com</p>
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
      
</body>    
    