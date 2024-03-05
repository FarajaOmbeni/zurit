<!DOCTYPE html>
<html lang="en">
<head>
    <title>Investment Planner</title>
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
                    @php
                        // Get the current month (adjust timezone if needed)
                        $currentMonth = date('n');
                    @endphp

                    <!-- Buttons for Monthly and Yearly Calculations -->
                    <div class="text-center mb-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monthlyModal">Add Investment</button>
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#yearlyModal">Yearly Calculations</button>-->
                    </div>
                    <!-- Monthly Modal -->
<div class="modal fade" id="monthlyModal" tabindex="-1" role="dialog" aria-labelledby="monthlyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="monthlyModalLabel">Monthly Calculations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('storemonthlyInvestment') }}" method="post">
                @csrf
                <div class="">
                    <label for="investmentType">Investment Type</label>
                    <select name="investment[investment_type]" id="investmentType" class=" ">
                        @foreach($withholdingTaxRates as $rate)
                            <option value="{{ $rate->id }}">{{ $rate->investment_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="initialInvestment">Initial Investment</label>
                    <input type="number" name="investment[initialInvestment]" placeholder="Enter initial investment">
                </div>
                <div class="form-group">
                    <label for="monthlyAdditionalInvestment">Monthly Additional Investment</label>
                    <input type="number" name="investment[AdditionalInvestment]" placeholder="Enter monthly additional investment">
                </div>
                <div class="form-group">
                    <label for="numberOfMonths">Number of Months</label>
                    <input type="number" name="investment[numberOfMonths]" placeholder="Enter number of months">
                </div>
                <div class="form-group">
                    <label for="projectedRateOfReturn">Projected Rate of Return</label>
                    <input type="number" name="investment[projectedRateOfReturn]" placeholder="Enter projected rate of return">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <input type="hidden" name="calc_duration" value="monthly">
            </form>
            </div>
        </div>
    </div>
</div>

                    <!-- Monthly Section -->
                    <div>
                        <!-- Monthly Investment Table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Initial Investment</th>
                                        <th>Additional Deposits</th>
                                        <th>Gross Interest</th>
                                        <th>Withholding Tax</th>
                                        <th>Net Interest</th>
                                        <th>Cumulative Investment Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($monthlyInvestments as $investmentId => $monthlyData)
                                        @foreach($monthlyData as $month => $investment)
                                            <tr>
                                                <td>{{ date('F', mktime(0, 0, 0, $month, 10)) }}</td>
                                                <td>{{ $investment['initial_investment'] }}</td>
                                                <td>{{ $investment['additional_deposits'] }}</td>
                                                <td>{{ $investment['gross_interest'] }}</td>
                                                <td>{{ $investment['withholding_tax'] }}</td>
                                                <td>{{ $investment['net_interest'] }}</td>
                                                <td>{{ $investment['cumulative_investment_value'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Interest Card for Monthly Section -->
                        <div class="card mt-4" style="background: linear-gradient(45deg, rgba(41, 128, 185, 1), rgba(155, 89, 182, 1), rgba(255, 193, 7, 1));">
                            <div class="card-body text-white">
                                <h5 class="card-title">Interest Gained as of {{ date('F') }}</h5>
                                <p class="card-text">Net Interest: {{ $monthlyInvestments[0][$currentMonth]['net_interest'] ?? 'N/A' }}</p>
                                <p class="card-text">Cumulative Investment Value: {{ $monthlyInvestments[0][$currentMonth]['cumulative_investment_value'] ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <!-- Graph for Monthly Section -->
                        <div class="mt-1">
                            <h5 class="text-center">Projected Trajectory Over Months</h5>
                            <div id="investmentChart" style="width: auto; height: 50%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        const categories = [];
        const data = [];

        // Read the values from the table
        const table = document.querySelector('.table');
        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            categories.push(cells[0].textContent); // Month
            data.push(Number(cells[6].textContent)); // Cumulative Investment Value
        });

        Highcharts.chart('investmentChart', {
            title: {
                text: 'Investment Growth'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Cumulative Investment Value'
                }
            },
            series: [{
                name: 'Investment',
                data: data
            }]
        });
    }
</script>
</body>
</html>
