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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <link rel="stylesheet" href="{{ asset('planners_res/style.css') }}?v={{ time() }}">
    <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

</head>

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
                                                    <label for="salary">Salary/Wages</label><br>
                                                    <input type="number" name="income[Salary][expected_income]"
                                                        placeholder="Expected Income">
                                                    <input type="number" name="income[Salary][actual_income]"
                                                        placeholder="Actual Income">
                                                </div>
                                                <div class="form-group">
                                                    <label for="consulting">Consulting/Freelance</label><br>
                                                    <input type="number" name="income[Consulting][expected_income]"
                                                        placeholder="Expected Income">
                                                    <input type="number" name="income[Consulting][actual_income]"
                                                        placeholder="Actual Income">
                                                </div>
                                                <div class="form-group">
                                                    <label for="dividends">Dividends/Investments</label><br>
                                                    <input type="number" name="income[Dividends][expected_income]"
                                                        placeholder="Expected Income">
                                                    <input type="number" name="income[Dividends][actual_income]"
                                                        placeholder="Actual Income">
                                                </div>
                                                <div class="form-group">
                                                    <label for="interest">Interest/Business Profit</label><br>
                                                    <input type="number" name="income[Interest][expected_income]"
                                                        placeholder="Expected Income">
                                                    <input type="number" name="income[Interest][actual_income]"
                                                        placeholder="Actual Income">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rental_income">Rental income</label><br>
                                                    <input type="number" name="income[rental_income][expected_income]"
                                                        placeholder="Expected Income">
                                                    <input type="number" name="income[rental_income][actual_income]"
                                                        placeholder="Actual Income">
                                                </div>
                                                <div class="form-group">
                                                    <label for="pension">Retirement/Pension Income</label><br>
                                                    <input type="number" name="income[pension][expected_income]"
                                                        placeholder="Expected Income">
                                                    <input type="number" name="income[pension][actual_income]"
                                                        placeholder="Actual Income">
                                                </div>
                                                <div class="form-group">
                                                    <label for="bonuses">Bonuses</label><br>
                                                    <input type="number" name="income[bonuses][expected_income]"
                                                        placeholder="Expected Income">
                                                    <input type="number" name="income[bonuses][actual_income]"
                                                        placeholder="Actual Income">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary"
                                                        id="add-category-btn">Add Category</button> --}}
                                                    <button type="submit" class="btn btn-primary">Save
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
                                                    <label for="House">House(Rent/Mortgage)</label><br>
                                                    <input type="number" name="expense[House][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number" name="expense[House][actual_expense]"
                                                        placeholder="Actual Expense">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Savings and Investments">Savings</label><br>
                                                    <input type="number" name="expense[Savings][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number" name="expense[Savings][actual_expense]"
                                                        placeholder="Actual Expense">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Investments">Investments</label><br>
                                                    <input type="number"
                                                        name="expense[Investments][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number" name="expense[Investments][actual_expense]"
                                                        placeholder="Actual Expense">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Food">Groceries/Food</label><br>
                                                    <input type="number" name="expense[Food][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number" name="expense[Food][actual_expense]"
                                                        placeholder="Actual Expense">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Transport">Transport</label><br>
                                                    <input type="number" name="expense[Transport][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number" name="expense[Transport][actual_expense]"
                                                        placeholder="Actual Expense">
                                                </div>
                                                <div class="form-group">
                                                    <label for="utilities">Utilities</label><br>
                                                    <input type="number" name="expense[utilities][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number" name="expense[utilities][actual_expense]"
                                                        placeholder="Actual Expense">
                                                </div>
                                                <div class="form-group">
                                                    <label for="insurance">Insurance</label><br>
                                                    <input type="number" name="expense[insurance][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number" name="expense[insurance][actual_expense]"
                                                        placeholder="Actual Expense">
                                                </div>
                                                <div class="form-group">
                                                    <label for="entertainment">Entertainment/Recreation</label><br>
                                                    <input type="number"
                                                        name="expense[entertainment][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number"
                                                        name="expense[entertainment][actual_expense]"
                                                        placeholder="Actual Expense">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Loans">Loans</label><br>
                                                    <input type="number" name="expense[Loans][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number" name="expense[Loans][actual_expense]"
                                                        placeholder="Actual Expense">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Healthcare">Healthcare</label><br>
                                                    <input type="number" name="expense[Loans][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number" name="expense[Loans][actual_expense]"
                                                        placeholder="Actual Expense">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Personl_care">Personl Care</label><br>
                                                    <input type="number"
                                                        name="expense[Personl_care][expected_expense]"
                                                        placeholder="Expected Expense">
                                                    <input type="number" name="expense[Personl_care][actual_expense]"
                                                        placeholder="Actual Expense">
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
                                            <th>Expected Income</th>
                                            <th>Actual Income</th>
                                            <th></th>
                                            <th class="divider"></th> <!-- Divider column -->
                                            <th>Expense Type</th>
                                            <th>Expected Expense</th>
                                            <th>Actual Expense</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($income->zip($expenses) as [$income, $expenses])
                                            <tr>
                                                @if ($income)
                                                    <td>{{ $income->income_type }}</td>
                                                    <td>{{ number_format($income->expected_income) }}</td>
                                                    <td>{{ number_format($income->actual_income) }}</td>
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
                                                    <td>{{ number_format($expenses->expected_expense) }}</td>
                                                    <td>{{ number_format($expenses->actual_expense) }}</td>
                                                    <td>
                                                        <form action="{{ route('expenses.destroy', $expenses) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
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
                            </div>


                            <!-- Net income card-->
                            <div class="card mt-3"
                                style="background: linear-gradient(45deg, rgba(41, 128, 185, 1), rgba(155, 89, 182, 1), rgba(255, 193, 7, 1));">
                                <div class="card-body">
                                    <h2 class="card-title text-white">Net for
                                        {{ \Carbon\Carbon::now()->format('F Y') }}</h2>
                                    @if ($actualIncome === null || $actualExpenses === null)
                                        <p class="card-text text-white">Please add your income and expense data to
                                            calculate the net income.</p>
                                    @else
                                        <h3 class="card-text text-white">{{ $netIncome }}</h3>
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
