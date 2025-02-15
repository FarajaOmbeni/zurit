@include('layouts.head')
<title>Debt Calculator</title>
<link rel="stylesheet" href="{{ asset('planners_res/style.css') }}?v={{ time() }}">

</head>

<body>
    @php
        $debts = \App\Models\Debt::where('user_id', Auth::id())->get();
    @endphp


    @extends('layouts.userbar')



    <div class="container-fluid">
        <div class="col-lg-8 offset-lg-2">
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
            <div class="container mt-5 ml-5">
                <div class="mb-3">
                    <!-- Net income card-->
                    <div class="alert alert-info">

                        @if ($netIncome > 0)
                            You have KES {{ number_format($netIncome) }} as surplus. You can use this amount to pay your
                            debts.
                        @else
                            You have no surplus income to pay your debts. You have a deficit of KES
                            {{ number_format($netIncome) }}.
                        @endif
                    </div>

                    <!-- Add Debt Button -->
                    <button class="button" id="add-debt-button">Add Debt</button>
                    <a class="button" id="add-debt-button" href="/user_goalsetting">Set Goals</a>

                    <div id="overlay"
                        style="display: none; position: fixed; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.5); z-index: 2; cursor: pointer;"
                        onclick="closeModal(event)">

                        <!-- Debt Form -->
                        <div id="debt-form"
                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); background-color: #fff; padding: 20px; z-index: 5; width: 80%; max-width: 500px;"
                            onclick="event.stopPropagation();">

                            <!-- Close Button -->
                            <button onclick="closeModal(event)"
                                style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 18px; cursor: pointer;">&times;</button>

                            <form action="{{ route('debt_store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category">Category:</label><br>
                                    <select style="width: 17rem; height: 2.5rem;" id="category"
                                        name="debt[category][name]">
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
                                    <input style="width: 17rem; height: 2.5rem;" type="text" id="debt_name"
                                        name="debt[debt_name][name]"><br>
                                    <label for="current_balance">Current Balance:</label><br>
                                    <input style="width: 17rem; height: 2.5rem;" type="number" id="current_balance"
                                        name="debt[current_balance][value]"><br>
                                    <label for="interest_rate">Annual Rate:</label><br>
                                    <input style="width: 17rem; height: 2.5rem;" type="number" id="interest_rate"
                                        name="debt[interest_rate][value]"><br>
                                    <label for="minimum_payment">Initial Payment:</label><br>
                                    <input style="width: 17rem; height: 2.5rem;" type="number" id="minimum_payment"
                                        name="debt[minimum_payment][value]"><br>
                                    <label for="payment_strategy">Start Date:</label><br>
                                    <input style="width: 17rem; height: 2.5rem;" type="date" name="start_date"
                                        id="start_date"><br>
                                    <label for="payment_strategy">End Date:</label><br>
                                    <input style="width: 17rem; height: 2.5rem;" type="date" name="end_date"
                                        id="end_date"><br>
                                    <label for="payment_strategy">Interest Behavior:</label><br>
                                    <select id="payment_strategy" name="debt[payment_strategy][strategy]">
                                        <option value="0">Constant</option>
                                        <option value="1">Reducing</option>
                                    </select><br>
                                    <input class="btn btn-primary" style="margin-top: 20px" type="submit"
                                        value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>

                    <script>
                        // Function to close the modal
                        function closeModal(event) {
                            document.getElementById('overlay').style.display = 'none';
                        }

                        // Example function to open the modal (you may already have a similar function)
                        function openModal() {
                            document.getElementById('overlay').style.display = 'block';
                        }
                    </script>


                    <!-- Debt Free Countdown Card -->
                    <div class="card mt-3"
                        style="background: linear-gradient(45deg, rgba(41, 128, 185, 1), rgba(155, 89, 182, 1), rgba(255, 193, 7, 1));">
                        <div class="card-body">
                            <h5 class="card-title text-white">DEBT FREE COUNTDOWN</h5>
                            @if ($end_period)
                                <p class="text-white">{{ $end_period->format('F Y') }}</p>
                                <p class="text-white">You will be debt Free in {{ $remaining_time }} months</p>

                                {{-- <form action="extraPayment_store" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="amount" class="form-label text-white">Extra Payment:</label>
                                        <input type="number" id="amount" name="amount" min="0"
                                            class="">
                                        <div class="range-container">
                                            <input type="range" id="range" min="0" max="100000"
                                                value="0">
                                        </div>
                                        <button id="save_extra_payment" class="btn btn-light mt-2">Save</button>
                                    </div>
                                </form> --}}
                            @else
                                <p class="text-white">No debt data available.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Payoff Progress Card -->
                    <h2>Payment Wheel</h2>
                    <div class="card mt-3 custom-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                @if ($principalPaid === null || $totalDebt === null || $totalDebt == 0)
                                    <p class="card-text text-white">Please add your debt data to calculate the
                                        progress.
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
                                        <p class="custom-text">Principal Paid: {{ number_format($principalPaid) }}
                                        </p>
                                        <!-- Balance -->
                                        <p class="custom-text">Balance: {{ number_format($remainingBalance) }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Categories Cards -->
                    <h2 style="font-weight: bold;">Pending debts</h2>
                    <div class="table-responsive" style="margin-bottom: 50px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount Due</th>
                                    <th>Amount Paid</th>
                                    <th>Monthly Payment</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($debts as $debt)
                                    <tr>
                                        @if ($debt->current_balance != $debt->minimum_payment)
                                            <td>{{ $debt->debt_name }}</td>
                                            <td>{{ number_format($debt->current_balance) }}</td>
                                            <td><?php $balance = $debt->current_balance - $debt->minimum_payment;
                                            echo number_format($debt->current_balance - $balance); ?></td>
                                            <td><?php $minimum_payment = $debt->current_balance / $debt->number_of_months;
                                            echo number_format($minimum_payment); ?></td>
                                            <td><?php number_format($balance = $debt->current_balance - $debt->minimum_payment);
                                            echo number_format($balance); ?></td>
                                            <td>
                                                <!-- Payoff Button -->
                                                <form action="{{ route('payLoan', ['id' => $debt->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input style="width: 8rem; height: 2rem;" type="number"
                                                        name="pay_loan_amount" id="">
                                                    <button style="width: 4rem; height: 2rem;" class="btn btn-success"
                                                        type="submit">Pay</button>
                                                </form>

                                            </td>
                                        @endif
                                    </tr>
                                    <tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Totals</th>
                                    <td>{{ number_format($totalDebt) }}</td>
                                    <td>{{ number_format($totalPaid) }}</td>
                                    <td>{{ number_format($totalMonthlyPayments) }}</td>
                                    <td>{{ number_format($totalDebt - $totalPaid) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>


                    <h2 style="font-weight: bold;">Paid debts</h2>
                    <div class="table-responsive" style="margin-bottom: 50px;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount Due</th>
                                    <th>Amount Paid</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($debts as $debt)
                                    <tr>
                                        @if ($debt->current_balance == $debt->minimum_payment)
                                            <td>{{ $debt->debt_name }}</td>
                                            <td>{{ number_format($debt->current_balance) }}</td>
                                            <td><?php $balance = $debt->current_balance - $debt->minimum_payment;
                                            echo number_format($debt->current_balance - $balance); ?></td>
                                        @endif
                                    </tr>
                                    <tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @php
                        $debts = \App\Models\Debt::where('user_id', Auth::id())
                            ->whereColumn('current_balance', '!=', 'minimum_payment')
                            ->orderBy('current_balance')
                            ->get();
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
                    <h2>Debt Priority Tracker</h2>
                    <div class="card mt-3">
                        <div class="card-body">
                            @if ($nextDebt)
                                <h5 class="card-title">Next Debt to be Cleared:
                                    <strong>{{ $nextDebt->debt_name }}</strong>
                                </h5>
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
                    <h2>Monthly Interest</h2>
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
                            <p id="interestDisplay">{{ number_format($totalInterest) }}</p>
                        </div>
                    </div>

                    <!-- Payment Card -->
                    <h2>Monthly Payments</h2>
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
                            <p id="paymentDisplay">{{ number_format($totalPayment) }}</p>
                        </div>
                    </div>
                </div>

                @include('layouts.foot')

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
