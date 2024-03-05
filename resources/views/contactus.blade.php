<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <title>Contact @ Zurit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
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
    <section class="contact-us" id="contact-us">
  <div class="container">
    <h2>Contact Us</h2>
    <div class="contact-content d-flex flex-column flex-lg-row">
      <div class="map mb-4 mb-lg-0">
        <!-- Embed your map here -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.772966870618!2d36.79918977496576!3d-1.3116021986759463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f139a2af6edab%3A0xa6fa99525e66f680!2sZuidier%20Ltd.!5e0!3m2!1sen!2ske!4v1699780330698!5m2!1sen!2ske" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="contact-form">
      <form action="{{ route('contact.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Your Name">
        <input type="email" name="email" placeholder="Your Email">
        <textarea name="userMessage" placeholder="Your Message"></textarea>
        <button type="submit">Send Message</button>
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
</section> 
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
    <div class="fb2022-copy">Fbee 2022 copyright</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/addshadow.js"></script>
</body>
</html>