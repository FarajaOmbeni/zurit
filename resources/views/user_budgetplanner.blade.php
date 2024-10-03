<!DOCTYPE html>
<html lang="en">

<head>
    <title>Budget Planner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <link rel="stylesheet" href="{{ asset('planners_res/style.css') }}?v={{ time() }}">
    <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QZMJCGHRR4"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-QZMJCGHRR4');
</script>

<body>
    @extends('layouts.userbar')
    @include('layouts.app')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div id="content" class="p-md-5 pt-5">
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
                    <div class="budget_content">
                        <div class="container mt-2">
                            <!-- Add new income and expense buttons -->
                            <div class="mb-3">
                                <button type="button" class="button" data-toggle="modal" data-target="#incomeModal">Add
                                    Income</button>
                                <button type="button" class="button" data-toggle="modal"
                                    data-target="#expenseModal">Add Expense</button>
                                <a type="button" class="button" href="/user_debtcalc">Go to Debt Manager</a>
                            </div>
                            <!-- Income Modal -->
                            <div class="modal fade" id="incomeModal" tabindex="-1" role="dialog"
                                aria-labelledby="incomeModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="incomeModalLabel">Add Income</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('storeIncome') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="income_type">Income Type</label>
                                                    <select class="form-control" required name="income_type"
                                                        id="incomeType">
                                                        <option value="Salary & Wages">Salary & Wages</option>
                                                        <option value="Consultancy/Freelance">Consultancy/Freelance
                                                        </option>
                                                        <option value="Investments and Dividends">Investments and
                                                            Dividends</option>
                                                        <option value="Interest or Business Profit">Interest or Business
                                                            Profit</option>
                                                        <option value="Rental Income">Rental Income</option>
                                                        <option value="Retirement or Pension Income">Retirement or
                                                            Pension Income</option>
                                                        <option value="Bonuses">Bonuses</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <div class="form-group">
                                                        <label for="income">Amount</label>
                                                        <input type="number" class="form-control" name="income"
                                                            placeholder="Input Amount">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-3">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Expense Modal -->
                            <div class="modal fade" id="expenseModal" tabindex="-1" role="dialog"
                                aria-labelledby="expenseModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="expenseModalLabel">Add Expense</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('storeExpense') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <select name="expense_type" class="form-control" id="expenseType"
                                                        onchange="showOtherInput(this)">
                                                        <option value="Food/Groceries">Food/Groceries</option>
                                                        <option value="Transport">Transport</option>
                                                        <option value="Utilities and Electricity">Utilities and
                                                            Electricity</option>
                                                        <option value="Entertainment and Recreation">Entertainment and
                                                            Recreation</option>
                                                        <option value="Healthcare">Healthcare</option>
                                                        <option value="Personal Care">Personal Care</option>
                                                        <option value="Insurance">Insurance</option>
                                                        <option value="Investments">Investments</option>
                                                        <option value="Savings">Savings</option>
                                                        <option value="House(Rent/Mortgage)">House(Rent/Mortgage)
                                                        <option value="Other">Other</option>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="expense">Amount</label>
                                                    <input type="number" name="expense" placeholder="Input Amount"
                                                        class="form-control">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary"
                                                        id="add-expense-category-btn">Add Category</button> --}}
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex justify-content-center w-100">
                                    <h2>
                                        @if ($budget->isNotEmpty())
                                            Budget for {{ \Carbon\Carbon::now()->format('F Y') }}
                                        @else
                                            Show your money who's the boss, start managing your finances today😎!
                                        @endif
                                    </h2>
                                </div>
                            </div>


                            <!-- Budget table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="4" class="text-center">Income</th>
                                            <th class="divider"></th> <!-- Divider column -->
                                            <th colspan="4" class="text-center">Expenses</th>
                                        </tr>
                                        <tr>
                                            <th>Income Type</th>
                                            <th>Income</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th class="divider"></th> <!-- Divider column -->
                                            <th>Expense Type</th>
                                            <th>Expense</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($income->zip($expenses) as [$income, $expenses])
                                            <tr>
                                                @if ($income)
                                                    <td>{{ $income->income_type }}</td>
                                                    <td>{{ number_format($income->actual_income) }}</td>
                                                    <td>
                                                        <button class="btn btn-primary" data-toggle="modal"
                                                            data-target="#updateIncomeModal{{ $income->id }}">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade"
                                                            id="updateIncomeModal{{ $income->id }}" tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="updateIncomeModalLabel{{ $income->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="updateIncomeModalLabel{{ $income->id }}">
                                                                            Update Income
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('income.update', $income->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <select name="income_type"
                                                                                    class="form-control"
                                                                                    id="incomeType"
                                                                                    onchange="showOtherInput(this)">
                                                                                    <option value="Salary & Wages"
                                                                                        {{ $income->income_type == 'Salary & Wages' ? 'selected' : '' }}>
                                                                                        Salary & Wages</option>
                                                                                    <option
                                                                                        value="Interest or Business Profit"
                                                                                        {{ $income->income_type == 'Interest or Business Profit' ? 'selected' : '' }}>
                                                                                        Interest or Business Profit
                                                                                    </option>
                                                                                    <option
                                                                                        value="Investments and Dividends"
                                                                                        {{ $income->income_type == 'Investments and Dividends' ? 'selected' : '' }}>
                                                                                        Investments and Dividends
                                                                                    </option>
                                                                                    <option value="Rental Income"
                                                                                        {{ $income->income_type == 'Rental Income' ? 'selected' : '' }}>
                                                                                        Rental Income</option>
                                                                                    <option
                                                                                        value="Consultancy/Freelance"
                                                                                        {{ $income->income_type == 'Consultancy/Freelance' ? 'selected' : '' }}>
                                                                                        Consultancy/Freelance
                                                                                    </option>
                                                                                    <option
                                                                                        value="Retirement or Pension Income"
                                                                                        {{ $income->income_type == 'Retirement or Pension Income' ? 'selected' : '' }}>
                                                                                        Retirement or Pension Income
                                                                                    </option>
                                                                                    <option value="Bonuses"
                                                                                        {{ $income->income_type == 'Bonuses' ? 'selected' : '' }}>
                                                                                        Savings
                                                                                    </option>
                                                                                    <option value="Other"
                                                                                        {{ $income->income_type == 'Other' ? 'selected' : '' }}>
                                                                                        Other
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="income">Amount</label>
                                                                                <input type="number"
                                                                                    name="actual_income"
                                                                                    placeholder="Input Amount"
                                                                                    class="form-control"
                                                                                    value="{{ $income->actual_income }}">
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save
                                                                                    changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('income.destroy', $income) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td colspan="4">No Income data for this entry</td>
                                                @endif
                                                <td class="divider"></td> <!-- Divider column -->
                                                @if ($expenses)
                                                    <td>{{ $expenses->expense_type }}</td>
                                                    <td>{{ number_format($expenses->actual_expense) }}</td>
                                                    @if ($expenses->is_loan == 0 && $expenses->is_goal == 0 && $expenses->is_investment == 0)
                                                        <td>
                                                            <a href="{{ route('expenses.update', $expenses) }}"
                                                                class="btn btn-primary" data-toggle="modal"
                                                                data-target="#updateExpenseModal{{ $expenses->id }}">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade"
                                                                id="updateExpenseModal{{ $expenses->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="updateExpenseModalLabel{{ $expenses->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="updateExpenseModalLabel{{ $expenses->id }}">
                                                                                Update Expense
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form
                                                                                action="{{ route('expenses.update', $expenses->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <select name="expense_type"
                                                                                        class="form-control"
                                                                                        id="expenseType"
                                                                                        onchange="showOtherInput(this)">
                                                                                        <option value="Food/Groceries"
                                                                                            {{ $expenses->expense_type == 'Food/Groceries' ? 'selected' : '' }}>
                                                                                            Food/Groceries</option>
                                                                                        <option value="Transport"
                                                                                            {{ $expenses->expense_type == 'Transport' ? 'selected' : '' }}>
                                                                                            Transport
                                                                                        </option>
                                                                                        <option
                                                                                            value="Utilities and Electricity"
                                                                                            {{ $expenses->expense_type == 'Utilities and Electricity' ? 'selected' : '' }}>
                                                                                            Utilities and
                                                                                            Electricity</option>
                                                                                        <option
                                                                                            value="Entertainment and Recreation"
                                                                                            {{ $expenses->expense_type == 'Entertainment and Recreation' ? 'selected' : '' }}>
                                                                                            Entertainment and
                                                                                            Recreation</option>
                                                                                        <option value="Healthcare"
                                                                                            {{ $expenses->expense_type == 'Healthcare' ? 'selected' : '' }}>
                                                                                            Healthcare</option>
                                                                                        <option value="Personal Care"
                                                                                            {{ $expenses->expense_type == 'Personal Care' ? 'selected' : '' }}>
                                                                                            Personal Care</option>
                                                                                        <option value="Insurance"
                                                                                            {{ $expenses->expense_type == 'Insurance' ? 'selected' : '' }}>
                                                                                            Insurance
                                                                                        </option>
                                                                                        <option value="Investments"
                                                                                            {{ $expenses->expense_type == 'Investments' ? 'selected' : '' }}>
                                                                                            Investments</option>
                                                                                        <option value="Savings"
                                                                                            {{ $expenses->expense_type == 'Savings' ? 'selected' : '' }}>
                                                                                            Savings
                                                                                        </option>
                                                                                        <option value="Other"
                                                                                            {{ $expenses->expense_type == 'Other' ? 'selected' : '' }}>
                                                                                            Other
                                                                                        </option>
                                                                                        <option
                                                                                            value="House(Rent/Mortgage)"
                                                                                            {{ $expenses->expense_type == 'House(Rent/Mortgage)' ? 'selected' : '' }}>
                                                                                            House(Rent/Mortgage)
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="expense">Amount</label>
                                                                                    <input type="number"
                                                                                        name="actual_expense"
                                                                                        placeholder="Input Amount"
                                                                                        class="form-control"
                                                                                        value="{{ $expenses->actual_expense }}">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    {{-- <button type="button" class="btn btn-primary"
                                                        id="add-expense-category-btn">Add Category</button> --}}
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Save
                                                                                        changes</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <form action="{{ route('expenses.destroy', $expenses) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                    @if ($expenses->is_loan == 1)
                                                        <td><span class="alert alert-danger">This is a LOAN. Go to <a
                                                                    href="user_debtcalc">Debt Manager</a></span></td>
                                                    @endif
                                                    @if ($expenses->is_goal == 1)
                                                        <td><span class="alert alert-info">This is a GOAL. Go to <a
                                                                    href="user_goalsetting">Goal Setting</a></span>
                                                        </td>
                                                    @endif
                                                @else
                                                    <td colspan="4">No expense data for this entry</td>
                                                @endif
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9">No data found. Please add your income and
                                                    expense data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <h3>Totals</h3>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div style="font-size: 25px; font-weight: bold;">Income Total</div>
                                        <div style="font-size: 20px; font-weight: bold;">KES
                                            {{ number_format($actualIncome) }}
                                        </div>
                                    </div>
                                    <div>
                                        <div style="font-size: 25px; font-weight: bold;">Expense Total</div>
                                        <div style="font-size: 20px; font-weight: bold;">KES
                                            {{ number_format($actualExpenses) }}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Net income card-->
                            <div class="card mt-3"
                                style="background: linear-gradient(45deg, rgba(41, 128, 185, 1), rgba(155, 89, 182, 1), rgba(255, 193, 7, 1));">
                                <div class="card-body">
                                    <h2 class="card-title text-white">Surplus for
                                        {{ \Carbon\Carbon::now()->format('F Y') }}</h2>
                                    @if ($actualIncome === null || $actualExpenses === null)
                                        <p class="card-text text-white">Please add your income and expense data to
                                            calculate the net income.</p>
                                    @else
                                        <h3 class="card-text text-white">KES {{ number_format($netIncome) }}</h3>
                                        <p class="alert alert-info">You can use this amount to achieve your goals or
                                            pay your debts.</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Bar graph and pie chart for the last 12 months -->
                            <div class="mt-4">
                                <h2>Income and Expenses for the Last 12 Months</h2>
                                <div style="max-width: 600px;">
                                    <!-- Bar graph -->
                                    <canvas id="barGraph"></canvas>
                                </div>
                                <div style="max-width: 400px; margin-top: 20px;">
                                    <!-- Pie chart -->
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

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
        // Dummy data for the last 12 months
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        const currentMonth = new Date().getMonth();
        const labels = [...monthNames.slice(currentMonth), ...monthNames.slice(0, currentMonth)];

        const monthlyData = {
            labels: labels,
            income: @json(array_values($monthlyIncomes)),
            expenses: @json(array_values($monthlyExpenses)),
        };

        // Bar graph
        const barCtx = document.getElementById('barGraph').getContext('2d');
        const barGraph = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: monthlyData.labels,
                datasets: [{
                        label: 'Income',
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        data: monthlyData.income,
                    },
                    {
                        label: 'Expenses',
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        data: monthlyData.expenses,
                    },
                ],
            },
        });

        // Pie chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Income', 'Expenses'],
                datasets: [{
                    data: [
                        monthlyData.income.reduce((a, b) => a + b, 0),
                        monthlyData.expenses.reduce((a, b) => a + b, 0),
                    ],
                    backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)'],
                }, ],
            },
        });

        //additions
        $(document).ready(function() {
            $("#add-income-btn").click(function() {
                $("#income-form").toggle();
            });
        });

        $(document).ready(function() {
            $('#incomeForm').on('submit', function(e) {
                e.preventDefault();
                var incomeType = $('input[name="expected_income"]').attr('id');
                $('#income_type').val(incomeType);
                this.submit();
            });
        });
    </script>
</body>

</html>
