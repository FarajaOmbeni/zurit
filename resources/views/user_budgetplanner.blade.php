@include('layouts.head')
<title>Budget Planner</title>
<link rel="stylesheet" href="{{ asset('planners_res/style.css') }}?v={{ time() }}">

</head>

<style>
    #manage_debt {
        color: white;
    }

    #manage_debt:hover {
        text-decoration: underline;
        color: rgba(245, 245, 245, 0.824);
    }
</style>

<body>
    @extends('layouts.userbar')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div id="content" class="pt-5" style="margin-left: 120px;">
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
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                You are currently using these tools for free. Beginning of next, year the tools will be
                                available on a subscription basis of <b>KES. 500</b> per month.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- Add new income and expense buttons -->
                            <div class="mb-3 manage_buttons">
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
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description"
                                                        placeholder="Input Amount" class="form-control">
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

                            <!-- Income Table -->
                            <h2 class="budget_title">Income</h2>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Income Type</th>
                                            <th>Income</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($income->isNotEmpty())
                                            @foreach ($income as $item)
                                                <tr>
                                                    <td>{{ $item->income_type }}</td>
                                                    <td>{{ number_format($item->actual_income) }}</td>
                                                    <td>
                                                        <button class="btn btn-primary" data-toggle="modal"
                                                            data-target="#updateIncomeModal{{ $item->id }}">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade"
                                                            id="updateIncomeModal{{ $item->id }}" tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="updateIncomeModalLabel{{ $item->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="updateIncomeModalLabel{{ $item->id }}">
                                                                            Update Income
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('income.update', $item->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="form-group">
                                                                                <select name="income_type"
                                                                                    class="form-control"
                                                                                    id="incomeType"
                                                                                    onchange="showOtherInput(this)">
                                                                                    <option value="Salary & Wages"
                                                                                        {{ $item->income_type == 'Salary & Wages' ? 'selected' : '' }}>
                                                                                        Salary & Wages</option>
                                                                                    <option
                                                                                        value="Interest or Business Profit"
                                                                                        {{ $item->income_type == 'Interest or Business Profit' ? 'selected' : '' }}>
                                                                                        Interest or Business Profit
                                                                                    </option>
                                                                                    <option
                                                                                        value="Investments and Dividends"
                                                                                        {{ $item->income_type == 'Investments and Dividends' ? 'selected' : '' }}>
                                                                                        Investments and Dividends
                                                                                    </option>
                                                                                    <option value="Rental Income"
                                                                                        {{ $item->income_type == 'Rental Income' ? 'selected' : '' }}>
                                                                                        Rental Income</option>
                                                                                    <option
                                                                                        value="Consultancy/Freelance"
                                                                                        {{ $item->income_type == 'Consultancy/Freelance' ? 'selected' : '' }}>
                                                                                        Consultancy/Freelance
                                                                                    </option>
                                                                                    <option
                                                                                        value="Retirement or Pension Income"
                                                                                        {{ $item->income_type == 'Retirement or Pension Income' ? 'selected' : '' }}>
                                                                                        Retirement or Pension Income
                                                                                    </option>
                                                                                    <option value="Bonuses"
                                                                                        {{ $item->income_type == 'Bonuses' ? 'selected' : '' }}>
                                                                                        Savings
                                                                                    </option>
                                                                                    <option value="Other"
                                                                                        {{ $item->income_type == 'Other' ? 'selected' : '' }}>
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
                                                                                    value="{{ $item->actual_income }}">
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
                                                        <form action="{{ route('income.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this income?')">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4">No Income data available</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Totals</th>
                                            <td>{{ number_format($actualIncome) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Expense Table -->
                            <h2 class="budget_title" style="margin-top: 5rem;">Expenses</h2>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Expense Type</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($expenses->isNotEmpty())
                                            @foreach ($expenses as $expense)
                                                <tr>
                                                    <td>{{ $expense->expense_type }}</td>
                                                    <td>{{ number_format($expense->actual_expense) }}</td>
                                                    <td>{{ $expense->description }}</td>
                                                    @if ($expense->is_loan == 0 && $expense->is_goal == 0 && $expense->is_investment == 0)
                                                        <td>
                                                            <a href="#" class="btn btn-primary"
                                                                data-toggle="modal"
                                                                data-target="#updateExpenseModal{{ $expense->id }}">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>

                                                            <!-- Modal -->
                                                            <div class="modal fade"
                                                                id="updateExpenseModal{{ $expense->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="updateExpenseModalLabel{{ $expense->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="updateExpenseModalLabel{{ $expense->id }}">
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
                                                                                action="{{ route('expenses.update', $expense->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div class="form-group">
                                                                                    <select name="expense_type"
                                                                                        class="form-control"
                                                                                        id="expenseType">
                                                                                        <option value="Food/Groceries"
                                                                                            {{ $expense->expense_type == 'Food/Groceries' ? 'selected' : '' }}>
                                                                                            Food/Groceries
                                                                                        </option>
                                                                                        <option value="Transport"
                                                                                            {{ $expense->expense_type == 'Transport' ? 'selected' : '' }}>
                                                                                            Transport
                                                                                        </option>
                                                                                        <option
                                                                                            value="Utilities and Electricity"
                                                                                            {{ $expense->expense_type == 'Utilities and Electricity' ? 'selected' : '' }}>
                                                                                            Utilities and Electricity
                                                                                        </option>
                                                                                        <option
                                                                                            value="Entertainment and Recreation"
                                                                                            {{ $expense->expense_type == 'Entertainment and Recreation' ? 'selected' : '' }}>
                                                                                            Entertainment and Recreation
                                                                                        </option>
                                                                                        <option value="Healthcare"
                                                                                            {{ $expense->expense_type == 'Healthcare' ? 'selected' : '' }}>
                                                                                            Healthcare
                                                                                        </option>
                                                                                        <option value="Personal Care"
                                                                                            {{ $expense->expense_type == 'Personal Care' ? 'selected' : '' }}>
                                                                                            Personal Care
                                                                                        </option>
                                                                                        <option value="Insurance"
                                                                                            {{ $expense->expense_type == 'Insurance' ? 'selected' : '' }}>
                                                                                            Insurance
                                                                                        </option>
                                                                                        <option value="Investments"
                                                                                            {{ $expense->expense_type == 'Investments' ? 'selected' : '' }}>
                                                                                            Investments
                                                                                        </option>
                                                                                        <option value="Savings"
                                                                                            {{ $expense->expense_type == 'Savings' ? 'selected' : '' }}>
                                                                                            Savings
                                                                                        </option>
                                                                                        <option value="Other"
                                                                                            {{ $expense->expense_type == 'Other' ? 'selected' : '' }}>
                                                                                            Other
                                                                                        </option>
                                                                                        <option
                                                                                            value="House(Rent/Mortgage)"
                                                                                            {{ $expense->expense_type == 'House(Rent/Mortgage)' ? 'selected' : '' }}>
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
                                                                                        value="{{ $expense->actual_expense }}">
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
                                                            <form
                                                                action="{{ route('expenses.destroy', $expense->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    onclick="return confirm('Are you sure you want to delete this expense?')">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    @elseif ($expense->is_loan == 1)
                                                        <td colspan="2"><span class="alert alert-danger"
                                                                style="background-color: #C82333;">
                                                                <a id="manage_debt" href="user_debtcalc">Mng Debt</a>
                                                            </span></td>
                                                    @elseif ($expense->is_investment == 1)
                                                        <td colspan="2"><span class="alert alert-success"
                                                                style="background-color: #049c27;">
                                                                <a id="manage_investment"
                                                                    href="user_investmentplanner">Mng Investment</a>
                                                            </span></td>
                                                    @elseif ($expense->is_goal == 1)
                                                        <td colspan="2"><span class="alert alert-success"
                                                                style="background-color: #049c27;">
                                                                <a id="manage_goal" href="user_goalsetting"> Mng
                                                                    Goal</a>
                                                            </span></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4">No expense data available</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Totals</th>
                                            <td>{{ number_format($actualExpenses) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <h3 class="budget_title" style="margin-top: 5rem;">Totals</h3>
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
                                @if ($netIncome <= 0)
                                    <h2 class="card-title text-white">Deficit for
                                        {{ \Carbon\Carbon::now()->format('F Y') }}</h2>
                                @else
                                    <h2 class="card-title text-white">Surplus for
                                        {{ \Carbon\Carbon::now()->format('F Y') }}</h2>
                                @endif
                                @if ($actualIncome === null || $actualExpenses === null)
                                    <p class="card-text text-white">Please add your income and expense data to
                                        calculate the net income.</p>
                                @elseif ($netIncome > 0)
                                    <h3 class="card-text text-white">KES {{ number_format($netIncome) }}</h3>
                                    <p class="alert alert-info">You can use this amount to achieve your goals or
                                        pay your debts.</p>
                                @else
                                    <h3 class="card-text text-white">KES {{ number_format($netIncome) }}</h3>
                                    <p class="alert alert-danger">You are in the danger zone. Adjust your budget.
                                    </p>
                                @endif
                            </div>
                        </div>

                        <!-- Bar graph and pie chart for the last 12 months -->
                        <div class="mt-4">
                            <h2>Income and Expenses for this Year</h2>
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

    @include('layouts.foot')

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
