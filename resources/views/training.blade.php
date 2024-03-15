<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Trainings_Zurit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('training_res/css/style.css') }}">
    <link rel="icon" href="{{ asset('img/ico_logo.webp') }}?v={{time()}}">
</head>

<body>
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top py-1">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('img/logo-white3.webp') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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

    <!--Training Section-->
    <section class="training_section">
        <div class="training_text">
            <h1>Our <br><span>Training Categories</span></h1>
        </div>

        <div class="category_btn_container">
            <button id="individual" class="category_btn"> Individual <span>no.</span></button>
            <button id="quarterly" class="category_btn"> Quarterly <span>no.</span></button>
            <button id="corporate" class="category_btn"> Corporate <span>no.</span></button>
            <button id= "wealth_wave" class="category_btn"> Wealth Wave <span>no.</span></button>
        </div>

        <div class="category_cards_container">
            <div class="category_card individual">
                <img src="{{ asset('training_res/img/prosperity.jpg') }}" alt="">
                <div class="category_card_desc">
                    <p class="card_title">PROSPERITY <span>FUNDAMENTALS</span></p>    
                    <p class="card_desc">Your guide to financial Prosperity</p> 
                    <button class="brochure_btn" type="button" data-toggle="modal" data-target="#modal_prosperity">Learn more</button>
                </div>
                
            </div>

            <div class="category_card quarterly">

                <div class="category_card_desc">
                <button class="brochure_btn">Learn more</button>
                </div>
                
            </div>

            <div class="category_card quarterly">

                <div class="category_card_desc">
                <button class="brochure_btn">Learn more</button>
                </div>
                
            </div>

            <div class="category_card corporate">

                <div class="category_card_desc">
                <button class="brochure_btn">Learn more</button>
                </div>
                
            </div>
            
            <div class="category_card corporate">

                <div class="category_card_desc">
                <button class="brochure_btn">Learn more</button>
                </div>
                
            </div>

            <div class="category_card corporate">

                <div class="category_card_desc">
                <button class="brochure_btn">Learn more</button>
                </div>
                
            </div>

            <div class="category_card wealth_wave">

                <div class="category_card_desc">
                <button class="brochure_btn">Learn more</button>
                </div>
                
            </div>

            <div class="category_card wealth_wave">

                <div class="category_card_desc">
                <button class="brochure_btn">Learn more</button>
                </div>
                
            </div>

            <div class="category_card wealth_wave">

                <div class="category_card_desc">
                <button class="brochure_btn">Learn more</button>
                </div>
                
            </div>

        </div>

    </section>


        <!-- prosperity Modal -->
        <div class="modal fade" id="modal_prosperity" tabindex="-1" role="dialog" aria-labelledby="modal_prosperity" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="modal_prosperity">Prosperity Fundamentals</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <p>This masterclass is a <span class="gold_text">10-week</span> program
              tailored to individuals, covering the
              fundamentals of personal finance and
              investments.<br><p>

              <b>We impart our clients with practical knowledge on:</b> 
              <ol>
                <li>Wealth building principles.</li>
                <li>Best practices for building wealth.</li>
                <li>How and where to invest</li>
                <li>How to systemize your investment processes.</li>
              </ol>

              <p><b>Who should attend?</b></p>
              <p>Individuals who are looking to build a solid financial foundation and grow their wealth.</p>
              <span style="font-size:20px;"><b>Price:</b> Kshs 15,000<br></span>
              <span style="font-size:20px;"><b>Duration:</b> 10 weeks<br></span>
              </div>
              <div class="modal-footer">
              <a href="" class="btn btn-secondary">Download Brochure</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                            <label for="exampleInputEmail1" class="form-label pb-3">Enter your email and we'll
                                send
                                you more information.</label>
                            <input type="email" name="email" placeholder="Your Email" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
                <div class="copyright pt-4 text-center text-muted">
                    <p>&copy; {{ date('Y') }} ZURIT CONSULTING</p>

                </div>
            </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="training_res/js/script.js"></script>

    <script>
        $(document).ready(function () {
            $(".category_btn").click(function () {
                // Remove active class from all buttons
                $(".category_btn").removeClass("active");
            
                // Add active class to clicked button
                $(this).addClass("active");
            
                var category = $(this).attr("id");
                $(".category_card").hide();
                $("." + category).show();
            });
        
            // Trigger click event on individual button
            $("#individual").click();
        });
    </script>


</body>