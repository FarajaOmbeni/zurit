<!DOCTYPE html>
<html lang="en">
<head>
    <title>Investment Planner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="planners_res/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('planners_res/style.css') }}?v={{ time() }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
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
                    <div class="budget_content">
                        @php
                            // Get the current month (adjust timezone if needed)
                            $currentMonth = date('n');
                        @endphp

                        <!-- Buttons for Monthly Calculations -->
                        <div class="text-center mb-5">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monthlyModal">Add Investment</button>
                        </div>

                        <!-- Success and Error Messages -->
                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success')['message'] }}
                            </div>
                            <script>
                                setTimeout(function() {
                                    $('#success-alert').fadeOut('fast');
                                }, {{ session('success')['duration'] }});
                            </script>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" id="error-alert">
                                {{ session('error')['message'] }}
                            </div>
                            <script>
                                setTimeout(function() {
                                    $('#error-alert').fadeOut('fast');
                                }, {{ session('error')['duration'] }});
                            </script>
                        @endif

                        <!-- Investment Type Cards -->
                        <div class="row mb-4">
                            @foreach ($monthlyInvestments as $investmentId => $investmentData)
                                @php
                                    $firstMonthData = reset($investmentData);
                                    $withholdingTax = \App\Models\WithholdingTax::find($firstMonthData['withholding_tax_id']);
                                    if (!$withholdingTax) {
                                        throw new \Exception('Withholding tax not found for investment id: ' . $investmentId);
                                    }
                                    $investmentType = $withholdingTax->investment_type;
                                @endphp
                                <div class="col-6 col-md-4 col-lg-3 mb-3">
                                    <div class="card h-100 type_card">
                                        <div class="card-body">
                                            <p class="card-title">{{ $investmentType }}</p>
                                            <a href="{{ route('investment.destroy', $investmentId) }}" class="card-link text-danger float-right" data-investment-id="{{ $investmentId }}" onclick="event.preventDefault(); document.getElementById('delete-investment-form-{{ $investmentId }}').submit();"><i class="bi bi-trash-fill"></i></a>
                                            <form id="delete-investment-form-{{ $investmentId }}" action="{{ route('investment.destroy', $investmentId) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                                            <div class="form-group">
                                                <label for="investmentType">Investment Type</label>
                                                <select name="investment[investment_type]" id="investmentType" class="form-control">
                                                    @foreach ($withholdingTaxRates as $rate)
                                                        <option value="{{ $rate->id }}" data-rate="{{ $rate->tax_rate }}">
                                                            {{ $rate->investment_type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="initialInvestment">Initial Investment</label>
                                                <input type="number" name="investment[initialInvestment]" placeholder="Enter initial investment" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="numberOfMonths">Number of Months</label>
                                                <input type="number" name="investment[numberOfMonths]" placeholder="Enter number of months" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="projectedRateOfReturn">Projected Rate of Return</label>
                                                <input type="number" name="investment[projectedRateOfReturn]" id="projectedRateOfReturn" placeholder="Enter projected rate of return" step="0.01" class="form-control">
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Initial Investment</th>
                                            <th>Gross Interest</th>
                                            <th>Withholding Tax</th>
                                            <th>Net Interest</th>
                                            <th>Cumulative Investment Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($monthlyInvestments as $investmentId => $monthlyData)
                                            @foreach ($monthlyData as $month => $investment)
                                                <tr>
                                                    <td>{{ date('F', mktime(0, 0, 0, $month, 10)) }}</td>
                                                    <td>{{ number_format($investment['initial_investment']) }}</td>
                                                    <td>{{ number_format($investment['gross_interest']) }}</td>
                                                    <td>{{ number_format($investment['withholding_tax']) }}</td>
                                                    <td>{{ number_format($investment['net_interest']) }}</td>
                                                    <td>{{ number_format($investment['cumulative_investment_value']) }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Interest Card for Monthly Section -->
                            <div class="card mt-4 text-white" style="background: linear-gradient(45deg, rgba(41, 128, 185, 1), rgba(155, 89, 182, 1), rgba(255, 193, 7, 1));">
                                <div class="card-body">
                                    <h5 class="card-title">Interest Gained as of {{ date('F') }}</h5>
                                    <p class="card-text">Net Interest: {{ $monthlyInvestments[0][$currentMonth]['net_interest'] ?? 'N/A' }}</p>
                                    <p class="card-text">Cumulative Investment Value: {{ $monthlyInvestments[0][$currentMonth]['cumulative_investment_value'] ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Graph for Monthly Section -->
                            <div class="mt-4">
                                <h5 class="text-center">Projected Trajectory Over Months</h5>
                                <div id="investmentChart" style="width: auto; height: 50%;"></div>
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
        window.onload = function() {
            const categories = [];
            const data = [];

            const table = document.querySelector('.table');
            const rows = table.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                categories.push(cells[0].textContent); // Month
                data.push(Number(cells[5].textContent.replace(/,/g, ''))); // Cumulative Investment Value
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
        };

        document.getElementById('investmentType').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var rate = selectedOption.getAttribute('data-rate');
            document.getElementById('projectedRateOfReturn').value = rate;
        });
    </script>
</body>
</html>
