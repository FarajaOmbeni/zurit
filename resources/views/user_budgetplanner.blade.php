<!DOCTYPE html>
<html lang="en">
<head>
    <title>Budget Planner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link rel="stylesheet" href="planner_res/css/style.css">
    <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
  
</head>
<body>
    @extends('layouts.userbar')
    @include('layouts.app')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div id="content" class="p-4 p-md-5 pt-5">
                    <div class="budget_content">
        <div class="container mt-5">
  <!-- Add new income and expense buttons -->
  <div class="mb-3">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#incomeModal">Add Income</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#expenseModal">Add Expense</button>
  </div>
  <!-- Income Modal -->
<div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-labelledby="incomeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="incomeModalLabel">Add Income</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('storeIncome') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="number" name="income[Salary][expected_income]" placeholder="Expected Income">
        <input type="number" name="income[Salary][actual_income]" placeholder="Actual Income">
    </div>
    <div class="form-group">
        <label for="consulting">Consulting</label>
        <input type="number" name="income[Consulting][expected_income]" placeholder="Expected Income">
        <input type="number" name="income[Consulting][actual_income]" placeholder="Actual Income">
    </div>
    <div class="form-group">
        <label for="dividends">Dividends</label>
        <input type="number" name="income[Dividends][expected_income]" placeholder="Expected Income">
        <input type="number" name="income[Dividends][actual_income]" placeholder="Actual Income">
    </div>
    <div class="form-group">
        <label for="interest">Interest</label>
        <input type="number" name="income[Interest][expected_income]" placeholder="Expected Income">
        <input type="number" name="income[Interest][actual_income]" placeholder="Actual Income">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="add-category-btn">Add Category</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>




      </div>
    </div>
  </div>
</div>

<!-- Expense Modal -->
<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="expenseModalLabel">Add Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('storeExpense') }}" method="post">
          @csrf
          <div class="form-group">
              <label for="Savings and Investments">Savings</label>
              <input type="number" name="expense[Savings][expected_expense]" placeholder="Expected Expense">
              <input type="number" name="expense[Savings][actual_expense]" placeholder="Actual Expense">
          </div>
          <div class="form-group">
              <label for="Investments">Investments</label>
              <input type="number" name="expense[Investments][expected_expense]" placeholder="Expected Expense">
              <input type="number" name="expense[Investments][actual_expense]" placeholder="Actual Expense">
          </div>
          <div class="form-group">
              <label for="Food">Food</label>
              <input type="number" name="expense[Food][expected_expense]" placeholder="Expected Expense">
              <input type="number" name="expense[Food][actual_expense]" placeholder="Actual Expense">
          </div>
          <div class="form-group">
              <label for="House">House</label>
              <input type="number" name="expense[House][expected_expense]" placeholder="Expected Expense">
              <input type="number" name="expense[House][actual_expense]" placeholder="Actual Expense">
          </div>
          <div class="form-group">
              <label for="Transport">Transport</label>
              <input type="number" name="expense[Transport][expected_expense]" placeholder="Expected Expense">
              <input type="number" name="expense[Transport][actual_expense]" placeholder="Actual Expense">
          </div>
          <div class="form-group">
              <label for="Loans">Loans</label>
              <input type="number" name="expense[Loans][expected_expense]" placeholder="Expected Expense">
              <input type="number" name="expense[Loans][actual_expense]" placeholder="Actual Expense">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="add-expense-category-btn">Add Category</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<h2>
    @if($budget->isNotEmpty())
        Budget for {{ \Carbon\Carbon::now()->format('F Y') }}
    @else
        Show your money who's the boss, start managing your finances today😎!
    @endif
</h2>

  <!-- Budget table -->
  <div class="table-responsive">
  <table class="table">
    <thead>
        <tr>
            <th>Income Type</th>
            <th>Expected Income</th>
            <th>Actual Income</th>
            <th>Expense Type</th>
            <th>Expected Expense</th>
            <th>Actual Expense</th>
        </tr>
    </thead>
    <tbody>
        @forelse($income->zip($expenses) as [$income, $expenses])
            <tr>
            @if($income)
                <td>{{ $income->income_type }}</td>
                <td>{{ $income->expected_income }}</td>
                <td>{{ $income->actual_income }}</td>
                @else
                    <td colspan="3">No Income data for this entry</td>
                @endif
                @if($expenses)
                    <td>{{ $expenses->expense_type }}</td>
                    <td>{{ $expenses->expected_expense }}</td>
                    <td>{{ $expenses->actual_expense }}</td>
                @else
                    <td colspan="3">No expense data for this entry</td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="6">No data found. Please add your income and expense data.</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>

  <!-- Net income card-->
  <div class="card mt-3" style="background: linear-gradient(45deg, rgba(41, 128, 185, 1), rgba(155, 89, 182, 1), rgba(255, 193, 7, 1));">
    <div class="card-body">
        <h2 class="card-title text-white">Net for {{ \Carbon\Carbon::now()->format('F Y') }}</h2>
        @if($actualIncome === null || $actualExpenses === null)
            <p class="card-text text-white">Please add your income and expense data to calculate the net income.</p>
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
      <!-- View More button -->
      <button type="button" class="btn btn-primary mt-3">View More</button>
     </div>
    </div>
  </div>

                </div>                
            </div>
        </div>
    </div>
</div>

    <script>
  // Dummy data for the last 12 months
  const monthlyData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    income: @json(array_values($monthlyIncomes)),
    expenses: @json(array_values($monthlyExpenses)),
};

  // Bar graph
  const barCtx = document.getElementById('barGraph').getContext('2d');
  const barGraph = new Chart(barCtx, {
    type: 'bar',
    data: {
      labels: monthlyData.labels,
      datasets: [
        {
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
      datasets: [
        {
          data: [
            monthlyData.income.reduce((a, b) => a + b, 0),
            monthlyData.expenses.reduce((a, b) => a + b, 0),
          ],
          backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)'],
        },
      ],
    },
  });

  //additions
  $(document).ready(function(){
    $("#add-income-btn").click(function(){
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
