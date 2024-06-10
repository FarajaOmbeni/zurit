<html>

    <head>
        <title>Debt Calculator</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Link your CSS files -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('planners_res/style.css') }}?v={{ time() }}">
        <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- PWA  -->
        <meta name="theme-color" content="#fff" />
        <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">

    </head>

    <body>
        @php
            $debts = \App\Models\Debt::where('user_id', Auth::id())->get();
        @endphp

        @include('layouts.app')
        @extends('layouts.userbar')



        <div class="col-lg-8 offset-lg-2">
            <div class="container mt-5 ml-5">
                <!-- Add Debt Button -->
                <button class="button" id="add-debt-button">Add Debt</button>

                <div id="overlay"
                    style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.5); z-index: 2; cursor: pointer;">
                    <!-- Debt Form -->
                    <div id="debt-form"
                        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); background-color: #fff; padding: 20px; z-index: 5; width: 80%; max-width: 500px;">
                        <form action="{{ route('debt_store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category">Category:</label><br>
                                <select id="category" name="debt[category][name]">
                                    <option value="Car Loan">Car Loan</option>
                                    <option value="Student Loan">Student Loan</option>
                                    <option value="Credit Card Loan">Credit Card Loan</option>
                                    <option value="House Loan">House Loan</option>
                                    <option value="Land Loan">Land Loan</option>
                                    <option value="Business Loan">Business Loan</option>
                                    <option value="Mobile Loan">Mobile Loan</option>
                                    <option value="other-category">Other</option>
                                </select><br>
                                <input type="text" id="other-category" name="debt[other-category][name]"
                                    style="display: none;"><br>
                                <label for="debt_name">Debt Name:</label><br>
                                <input type="text" id="debt_name" name="debt[debt_name][name]"><br>
                                <label for="current_balance">Current Balance:</label><br>
                                <input type="number" id="current_balance" name="debt[current_balance][value]"><br>
                                <label for="interest_rate">Annual Rate:</label><br>
                                <input type="number" id="interest_rate" name="debt[interest_rate][value]"><br>
                                <label for="minimum_payment">Minimum Payment:</label><br>
                                <input type="number" id="minimum_payment" name="debt[minimum_payment][value]"><br>
                                <label for="start_period">Next Payment Due:</label><br>
                                <input type="text" id="start_period" name="debt[start_period][date]"><br>
                                <label for="payment_strategy">Payment Strategy:</label><br>
                                <select id="payment_strategy" name="debt[payment_strategy][strategy]">
                                    <option value="0">Constant</option>
                                    <option value="1">Reducing</option>
                                </select><br>
                                <input type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Debt Free Countdown Card -->
                <div class="card mt-3"
                    style="background: linear-gradient(45deg, rgba(41, 128, 185, 1), rgba(155, 89, 182, 1), rgba(255, 193, 7, 1));">
                    <div class="card-body">
                        <h5 class="card-title text-white">DEBT FREE COUNTDOWN</h5>
                        @if ($end_period)
                            <p class="text-white">{{ $end_period->format('F Y') }}</p>
                            <p class="text-white">You will be debt Free in {{ $remaining_time }} months</p>

                            <form action="extraPayment_store" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="amount" class="form-label text-white">Extra Payment:</label>
                                    <input type="number" id="amount" name="amount" min="0" class="">
                                    <div class="range-container">
                                        <input type="range" id="range" min="0" max="100000"
                                            value="0">
                                    </div>
                                    <button id="save_extra_payment" class="btn btn-light mt-2">Save</button>
                                </div>
                            </form>
                        @else
                            <p class="text-white">No debt data available.</p>
                        @endif
                    </div>
                </div>

                <!-- Payoff Progress Card -->
                <div class="card mt-3 custom-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            @if ($principalPaid === null || $totalDebt === null || $totalDebt == 0)
                                <p class="card-text text-white">Please add your debt data to calculate the progress.
                                </p>
                            @else
                                <div role="progressbar"
                                    aria-valuenow="{{ number_format(($principalPaid / $totalDebt) * 100, 2) }}"
                                    aria-valuemin="0" aria-valuemax="100"
                                    style="--value:{{ number_format(($principalPaid / $totalDebt) * 100, 2) }}"
                                    data-percentage="{{ number_format(($principalPaid / $totalDebt) * 100, 2) }}">
                                </div>
                                <div class="text-container">
                                    <!-- Principal Paid -->
                                    <p class="custom-text">Principal Paid: {{ number_format($principalPaid, 2) }}</p>
                                    <!-- Balance -->
                                    <p class="custom-text">Balance: {{ number_format($remainingBalance, 2) }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Categories Cards -->
                <div class="row mt-3">
                    @foreach ($debts as $debt)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $debt->category }}</h5>
                                    @php
                                        $endPeriod = \Carbon\Carbon::parse($debt->end_period);
                                        $now = \Carbon\Carbon::now();
                                        $years = $now->diffInYears($endPeriod);
                                        $months = $now->copy()->addYears($years)->diffInMonths($endPeriod);
                                    @endphp
                                    <p>Paid off in {{ $years }} years {{ $months }} months</p>
                                    <p>Amount Due {{ $debt->current_balance }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @php
                    $debts = \App\Models\Debt::where('user_id', Auth::id())->orderBy('end_period')->get();
                    $nextDebt = $debts->first();

                    if ($debts->last()) {
                        $endPeriod = \Carbon\Carbon::parse($debts->last()->end_period);
                        $now = \Carbon\Carbon::now();
                        $totalYears = $now->diffInYears($endPeriod);
                        $totalMonths = $now->copy()->addYears($totalYears)->diffInMonths($endPeriod);
                    } else {
                        $endPeriod = null;
                        $totalYears = 0;
                        $totalMonths = 0;
                    }
                @endphp

                <!-- Pay Off Card -->
                <div class="card mt-3">
                    <div class="card-body">
                        @if ($nextDebt)
                            <h5 class="card-title">Next Debt to be Cleared: <strong>{{ $nextDebt->debt_name }}</strong></h5>
                            <!-- <p>{{ \Carbon\Carbon::parse($nextDebt->end_period)->diffForHumans() }}</p> -->
                        @else
                            <h5 class="card-title">No debts to be cleared.</h5>
                        @endif
                        <h5 class="card-title">All Debts to be Cleared</h5>
                        <p>In {{ $totalYears }} years {{ $totalMonths }} months</p>
                    </div>
                </div>

                @php
                    $debts = \App\Models\Debt::where('user_id', Auth::id())->get();
                    $totalInterest = $debts->sum(function ($debt) {
                        return $debt->current_balance * ($debt->interest_rate / 100 / 12);
                    });
                @endphp

                <!-- Interest Card -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Next 30 days Total Interest</h5>
                        <select id="debtDropdown" class="form-select form-select-sm float-end">
                            @foreach ($debts as $debt)
                                <option value="{{ $debt->current_balance * ($debt->interest_rate / 100 / 12) }}">
                                    {{ $debt->debt_name }}</option>
                            @endforeach
                            <option value="{{ $totalInterest }}">All</option>
                        </select>
                        <p id="interestDisplay">{{ number_format($totalInterest, 2) }}</p>
                    </div>
                </div>

                <!-- Payment Card -->
                @php
                    $debts = \App\Models\Debt::where('user_id', Auth::id())->get();
                    $totalPayment = $debts->sum(function ($debt) {
                        return $debt->minimum_payment + $debt->current_balance * ($debt->interest_rate / 100 / 12);
                    });
                @endphp

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Next 30 days Total Payment</h5>
                        <select id="paymentDropdown" class="form-select form-select-sm float-end"
                            onchange="updatePayment()">
                            @foreach ($debts as $debt)
                                <option
                                    value="{{ $debt->minimum_payment + $debt->current_balance * ($debt->interest_rate / 100 / 12) }}">
                                    {{ $debt->debt_name }}</option>
                            @endforeach
                            <option value="{{ $totalPayment }}">All</option>
                        </select>
                        <p id="paymentDisplay">{{ number_format($totalPayment, 2) }}</p>
                    </div>
                </div>

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

                <script>
                    //datepicker
                    $("#start_period").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        yearRange: "-100:+100" // Allows selection of years 100 years in the past to 100 years in the future
                    });
                    // Add debt button
                    document.getElementById('add-debt-button').addEventListener('click', function() {
                        document.getElementById('overlay').style.display = 'block';
                    });

                    //Other option add
                    document.getElementById('category').addEventListener('change', function() {
                        if (this.value == 'other-category') {
                            document.getElementById('other-category').style.display = 'block';
                        } else {
                            document.getElementById('other-category').style.display = 'none';
                        }
                    });

                    //Slider
                    const range = document.getElementById('range');
                    const amount = document.getElementById('amount');

                    // Add an event listener to the slider
                    range.addEventListener('input', function() {
                        // Update the input field's value with the slider's value
                        amount.value = this.value;

                        // Update the background position of the slider
                        const percent = (this.value - this.min) / (this.max - this.min) * 100;
                        this.style.backgroundPosition = (100 - percent) + "% 0";
                    });

                    // Also update the slider when the input field's value changes
                    amount.addEventListener('input', function() {
                        range.value = this.value;

                        // Update the background position of the slider
                        const percent = (range.value - range.min) / (range.max - range.min) * 100;
                        range.style.backgroundPosition = (100 - percent) + "% 0";
                    });

                    //progress bar
                    document.querySelectorAll('div[role="progressbar"]').forEach((progressbar) => {
                        const percentage = progressbar.getAttribute('data-percentage');
                        progressbar.innerHTML = `${percentage}%`;
                    });

                    //interest dropdown
                    document.getElementById('debtDropdown').addEventListener('change', function() {
                        document.getElementById('interestDisplay').textContent = '$' + Number(this.value).toFixed(2);
                    });

                    //total payment
                    document.getElementById('paymentDropdown').addEventListener('change', function() {
                        document.getElementById('paymentDisplay').textContent = '$' + Number(this.value).toFixed(2);
                    });
                    
                    window.addEventListener('DOMContentLoaded', (event) => {
    document.querySelector('#overlay').addEventListener('click', function(event) {
        if (event.target == this) {
            this.style.display = 'none';
        }
    });
});
                </script>
    </body>

</html>
