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
@include('layouts.navbar')

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

@include('layouts.footer')
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