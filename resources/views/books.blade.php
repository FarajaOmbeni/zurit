<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <title>Books Zurit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="books_res/css/style.css">
    <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznB1U5Y0Uc6J0JpY4+Hc1c4b+D2tp9qUeJ6N7lN4y4gx5nU4w2f4Z+d5GDK6bj7f" crossorigin="anonymous"></script>
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
<h1 class="book-heading">Books</h1>

      <div class="row">
            @foreach ($books as $book)
                <div class="col-md-6 mb-4">
                    <div class="card book_card custom-card">
                        <img class="card-img-top card-img" src="{{ asset('books_res/img/' . $book->book_image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->book_name }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                            <p class="fw-bold">Price: Kshs {{ $book->current_price }}</p> 
                        </div>
                        <div class="card-footer text-center">
                        <button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#myModal" data-img="{{ asset('books_res/img/' . $book->book_image) }}" data-id="{{ $book->id }}" data-name="{{ $book->book_name }}" data-description="{{ $book->description }}" data-price="{{ $book->current_price }}">
                            Get a Copy
                        </button>
                        </div>
                    </div>
                </div>
            @endforeach
      </div>
            <!-- End of Bootstrap Card -->

        <!--Get a copy modal-->
        <div class="card" id="myModal" style="display: none;width: 50%; margin: 0 auto; position: fixed; top: 60%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;">
            <button type="button" class="close close-card" style="position: absolute; right: 10px; top: 10px;">&times;</button>
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img id="bookImage" src="" class="card-img" alt="Book Image">
                </div>
                <div class="col-md-6">
                <div class="card-body" style="margin-top: 50px;">
                        <h2 class="card-title" id="modalBookName"></h2>
                        <p class="card-text" id="modalBookDescription"></p>
                        <p class="fw-bold" id="modalBookPrice"></p> 
                        <div id="bookType" style="margin-top: 20px;">
                            <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="bookType" id="soft" value="soft" checked> Soft copy
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="bookType" id="hard" value="hard"> Hard copy
                                </label>
                            </div> -->
                        </div>
                        <div style="margin-top: 20px;">
                            <img src="{{ asset('books_res/img/mpesa.png') }}" alt="Lipa na M-Pesa details" style="width: 100%; height: auto;">
                        </div>
                        <!-- <button class="btn btn-success mt-3" id="mpesaButton">Pay with M-Pesa</button>
                        <form action="{{ url('/stkpush') }}" method="post" id="paymentForm">
                            @csrf
                            <input type="hidden" id="bookName" name="bookName">
                            <input type="hidden" id="bookPrice" name="bookPrice">
                            <div class="input-group mt-3" id="phoneGroup" style="display: none;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+254</span>
                                </div>
                                <input type="tel" id="phone" name="phone" class="form-control" autocomplete="off" placeholder="712345678" onkeypress="return onlyNumberKey(event)">
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>

<div id="backdrop"></div>
  <!--End of get a copy modal-->

            
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

    <script>
        $(document).ready(function() {
            //loading book details in modal
            $('.open-modal').click(function() {
                $('#bookImage').attr('src', $(this).data('img'));
                $('#modalBookName').text($(this).data('name'));
                $('#modalBookDescription').text($(this).data('description'));
                $('#modalBookPrice').text('Price: Kshs ' + $(this).data('price'));
                $('#myModal').show();
                $('#backdrop').show(); // Show the backdrop
            });
        
            $('.close-card').click(function() {
                $('#myModal').hide();
                $('#backdrop').hide(); // Hide the backdrop
                $('#phone').hide();
            });
        
            // Close the modal when clicking outside of it
            $('#backdrop').click(function() {
                $('#myModal').hide();
                $('#backdrop').hide(); // Hide the backdrop
            });
        
            //switching btwn hard and soft copy
            $('.btn-group-toggle .btn').click(function() {
                $('.btn-group-toggle .btn').removeClass('active');
                $(this).addClass('active');
            });
        
            //Phone Number details
            $('#mpesaButton').click(function(e) {
                e.preventDefault();
                $('#phoneGroup').show();
                var phone = $('#phone').val();
                var bookPrice = $('#bookPrice').val();
                var bookName = $('#bookName').val(); 
            
                $.ajax({
                    url: '/stkpush',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        phone: phone,
                        bookPrice: bookPrice,
                        bookName: bookName
                    },
                    success: function(response) {
                        // Handle the response here
                        if (response.ResponseCode == '0') {
                        alert('Payment successful!');
                    } else {
                        alert('Payment failed: ' + response.ErrorMessage);
                    }
                    }
                });
            });
        
            $('#phone').on('input', function() {
                // When the phone number has been entered, submit the form
                if ($(this).val().length === 9) {
                    $('#paymentForm').submit();
                }
            });
        });

        function onlyNumberKey(evt) { 
            // Only ASCII charactar in that range allowed 
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
                return false; 
            return true; 
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/addshadow.js"></script>
</body>
</html>