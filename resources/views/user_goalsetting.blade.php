<!DOCTYPE html>
<html lang="en">

<head>
    <title>Goal Setter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('planners_res/style.css') }}?v={{ time() }}"> 
    <link rel="icon" href="your_icon_path/ico_logo.png">
    <!-- PWA -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="your_icon_path/logo-white.png">
    <link rel="manifest" href="your_manifest_path/manifest.json">
</head>

<body>
    <!-- Header -->
    @extends('layouts.userbar')
    @include('layouts.app')

                            
    <div class="container">
    <h2 class="text-center mb-5 pt-3">Goal Setting</h2>

    <!-- Button to open the modal -->
    <button class="button mt-3" style="position:absolute; right:0; left: 580px; top:50px; width:20%;" data-toggle="modal" data-target="#goalModal">Add Goal</button>

    <!-- Alerts -->
@if (session('success'))
    <div style="display: flex; justify-content: center; align-items: center;">
        <div class="alert alert-success" id="success-alert" style="width: 50%;">
            {{ session('success')['message'] }}
        </div>
    </div>

    <script>
        setTimeout(function() {
            $('#success-alert').fadeOut('fast');
        }, {{ session('success')['duration'] }});
    </script>
@endif
@if (session('error'))
    <div style="display: flex; justify-content: center; align-items: center;">
        <div class="alert alert-danger" id="error-alert">
            {{ session('error')['message'] }}
        </div>
    </div>

    <script>
        setTimeout(function() {
            $('#error-alert').fadeOut('fast');
        }, {{ session('error')['duration'] }});
    </script>
@endif

    <!--  -->

    

    <hr class="break mt-3">

    <div class="category_btn_container" style="padding-top: 40px;">
        <button id="short" class="category_btn">Short-Term</button>
        <button id="medium" class="category_btn">Medium-Term</button>
        <button id="long" class="category_btn">Long-Term</button>
    </div>

    <!-- Goal cards -->
    <div class="row mt-4" style="margin-left:150px;">
    @foreach($goals as $goal)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="goal_card">
                <div class="card-header">
                    {{ $goal->title }}
                    <a href="#" class="float-right" data-toggle="modal" data-target="#goalDetailsModal{{ $goal->id }}">View Details</a>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Goal Amount: ${{ $goal->goal_amount }}</h6>
                    <p class="card-text">Current Amount: ${{ $goal->current_amount }}</p>
                    <a href="#" class="button plusIcon"><i class="fa fa-plus"></i></a>

                    <!-- form for additional ammount to current amount -->
                        <div class="addAmount" style="display: none;">
                        <form action="/goals/{{ $goal->id }}/add" method="POST">
                            @csrf
                            <input type="number" name="addedAmount" required>
                            <button type="submit" class="button mt-2">Submit</button>
                        </form>
                    </div>
                    @if (session('success') && array_key_exists('goal_id', session('success')))
                        @foreach ($goals as $goal)
                            @if (session('success')['goal_id'] == $goal->id)
                                <div class="alert alert-success mt-3 success-alert">
                                    {{ session('success')['amount_message'] }}
                                </div>
                                <script>
                                    setTimeout(function () {
                                        $('.success-alert').fadeOut('fast');
                                    }, {{ session('success')['duration'] }});
                                </script>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="card-footer">
                        <div class="progress">
                            @php
                            $progressPercentage = ($goal->current_amount / $goal->goal_amount) * 100;
                            @endphp
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: {{ $progressPercentage }}%" aria-valuenow="{{ $progressPercentage }}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted float-right">{{ $progressPercentage }}%</small>
                    </div>
            </div>
        </div>

        <!-- Goal Details Modal -->
        <div class="modal fade" id="goalDetailsModal{{ $goal->id }}" tabindex="-1" role="dialog" aria-labelledby="goalDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="goalDetailsModalLabel">{{ $goal->title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Category: {{ $goal->category }}</p>
                        <p>Projected Complete Date: {{ $goal->projected_attainment_date }}</p>
                        <p>Current Amount: ${{ $goal->current_amount }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>





<!-- Modal for the goal form -->
<div class="modal fade" id="goalModal" tabindex="-1" role="dialog" aria-labelledby="goalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="goalModalLabel">Add Goal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('storeGoal') }}" method="post" id="customForm">
    @csrf
    <div class="form-group">
        <label for="category">Category</label><br>
        <div class="select-wrapper">
        <select class="form-control" name="category" id="category">
            <option value="financial">Financial and Career</option>
            <option value="mental">Mental and Educational</option>
            <option value="physical">Physical and Health</option>
            <option value="social">Social and Cultural</option>
            <option value="spiritual">Spiritual and Ethical</option>
            <option value="family">Family and Home</option>
        </select>
        <i class="bi bi-chevron-down"></i> 
        </div>

    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
    </div>
    <div class="form-group">
        <label for="goal_amount">Goal Amount</label>
        <input type="number" class="form-control" name="goal_amount" id="goal_amount" placeholder="Enter amount">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description"></textarea>
    </div>
    <div class="form-group">
        <label for="deadline">When do you want achieve the goal?</label>
        <input type="date" class="form-control" name="deadline" id="deadline">
    </div>
    <div class="form-group">
        <label for="current_amount">Would you like to contribute to your goal now? (Leave blank if not)</label>
        <input type="number" class="form-control" name="current_amount" id="current_amount" placeholder="Enter amount">
    </div>
    <button type="submit" class="button mt-3">Set Goal</button>
</form>

            </div>
        </div>
    </div>
</div>


    <!-- Your scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- PWA script -->
    <script src="#"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.category_btn');
                
            // Set the "Short-Term" category as the default active option
            const defaultButton = document.getElementById('short');
            defaultButton.classList.add('active');
                
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    buttons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

        $(document).ready(function(){
            let plusIcons = document.querySelectorAll('.plusIcon');

            plusIcons.forEach((icon, index) => {
                icon.addEventListener('click', function() {
                    let forms = document.querySelectorAll('.addAmount');
                    forms[index].style.display = 'block';
                });
            });
            
            let successAlerts = document.querySelectorAll('.success-alert');

            successAlerts.forEach((alert, index) => {
                setTimeout(function () {
                    alert.style.display = 'none';
                }, {{ session('success') ? session('success')['duration'] : '2000' }});
            });
            $('#plusIcon').click(function(e){
                e.preventDefault();
                $('#addAmount').show();
            });
        
            $('#addAmount form').submit(function(){
                $('#addAmount').hide();
            });
        });


    </script>
</body>

</html>
