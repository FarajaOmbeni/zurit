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
@php
    use Carbon\Carbon; // Import the Carbon class with the full namespace
@endphp

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

                        <!-- Net income card-->
                        <div class="alert alert-info col-md-6 mx-auto">
                            This tool helps you plan your investments without necessarily paying for them. Once you are
                            pleased with the investment retuns, you can go to the Goals tool and add the investment
                            there and contribute to it.
                        </div>

                        <!-- Buttons for Monthly Calculations -->
                        <div class="text-center mb-5">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#monthlyModal">Add Investment</button>
                            <a type="button" class="btn btn-dark" href="user_networthcalc">Calculate You Net Worth</a>
                        </div>

                        <div class="mb-3">
                            <select class="btn btn-secondary" id="getReport" name="month_report">
                                <option hidden value="" selected>Get Report</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>

                        <div class="alert alert-warning hidden"
                            style="width: 40%; margin: 15px auto; text-align: center;" id="data_information">
                            There is no data for that month.
                        </div>

                        <!-- Report Area -->
                        <div id="chartContainer" style="display: none;">
                            <canvas id="investmentChart" width="400" height="200"></canvas>
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
                        <div class="mb-5">
                            <h3>Below are your investments</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Investment</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($investments as $investment)
                                            <tr>
                                                <td>{{ $investment->investment_type }}</td>
                                                <td>{{ number_format($investment->total_investment) }}</td>
                                                <td>
                                                    <a href="{{ route('investment.destroy', $investment->id) }}"
                                                        class="card-link text-danger float-right"
                                                        data-investment-id="{{ $investment->id }}"
                                                        onclick="event.preventDefault(); document.getElementById('delete-investment-form-{{ $investment->id }}').submit();"><i
                                                            class="bi bi-trash-fill"></i></a>
                                                    <form id="delete-investment-form-{{ $investment->id }}"
                                                        action="{{ route('investment.destroy', $investment->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Monthly Modal -->
                        <div class="modal fade" id="monthlyModal" tabindex="-1" role="dialog"
                            aria-labelledby="monthlyModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="monthlyModalLabel">Add Investment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('storemonthlyInvestment') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="investment_type">Investment Type</label>
                                                <select name="investment_type" id="investment_type"
                                                    class="form-control">
                                                    @foreach ($existing_investments as $ex_investment)
                                                        <option value="{{ $ex_investment->investment_type }}"">
                                                            {{ $ex_investment->investment_type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group hidden" id="initial_investment">
                                                <label for="initial_investment">Initial Investment</label>
                                                <input type="number" name="initial_investment"
                                                    placeholder="Enter initial investment" class="form-control">
                                            </div>
                                            <div class="form-group hidden" id="total_investment">
                                                <label for="total_investment">Total Investment</label>
                                                <input type="number" name="total_investment"
                                                    placeholder="Enter the total investment" class="form-control">
                                            </div>
                                            <div class="form-group hidden" id="monthly_contribution">
                                                <label for="monthly_contribution">Monthly Contribution</label>
                                                <input type="number" name="monthly_contribution"
                                                    placeholder="Enter the monthly contribution" class="form-control">
                                            </div>
                                            <div class="form-group hidden" id="real_estate_price">
                                                <label for="real_estate_price">Monthly Price of Real Estate</label>
                                                <input type="number" name="real_estate_price"
                                                    placeholder="Enter the monthly contribution" class="form-control">
                                            </div>
                                            <div class="form-group hidden" id="monthly_income">
                                                <label for="monthly_income">Monthly Income</label>
                                                <input type="number" name="monthly_income"
                                                    placeholder="Enter the monthly income" class="form-control">
                                            </div>
                                            <div class="form-group hidden" id="number_of_years">
                                                <label for="number_of_years">Number of Years</label>
                                                <input type="number" name="number_of_years"
                                                    placeholder="Enter number of years" class="form-control">
                                            </div>
                                            <div class="form-group hidden" id="number_of_months">
                                                <label for="number_of_months">Number of Months</label>
                                                <input type="number" name="number_of_months"
                                                    placeholder="Enter number of months" class="form-control">
                                            </div>
                                            <div class="form-group hidden" id="number_of_days">
                                                <label for="number_of_days">Number of Days</label>
                                                <select type="number" name="number_of_days"
                                                    placeholder="Enter number of days" class="form-control">
                                                    <option value="91">91 Days</option>
                                                    <option value="182">182 Days</option>
                                                    <option value="364">364 Days</option>
                                                </select>
                                            </div>
                                            <div class="form-group hidden" id="mmf_name">
                                                <label for="mmf_name">Name of Money Market</label>
                                                <select type="text" name="mmf_name"
                                                    placeholder="Enter name of MMF" class="form-control"
                                                    id="funds">
                                                    <!-- The options are being filled with JavaScript -->
                                                </select>
                                            </div>
                                            <div class="form-group hidden" id="details_of_investment">
                                                <label for="details_of_investment">Details of Investment</label>
                                                <select type="text" name="details_of_investment"
                                                    placeholder="Enter Details of Investment" class="form-control"
                                                    required>
                                                    <option value="1">DEET 1</option>
                                                    <option value="2">DEET 2</option>
                                                    <option value="3">DEET 3</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="rate_of_return">
                                                <label for="projectedRateOfReturn">Projected Rate of Return</label>
                                                <input type="number" placeholder="Enter projected rate of return"
                                                    name="rate_of_return" id="rate_of_return" step="0.01"
                                                    class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Section -->
                        <div>
                            <h2 style="font-weight: semibold; margin-bottom: 50px">Manage Investments</h2>

                            @if (
                                ($t_bills && count($t_bills)) ||
                                    ($gov_bonds && count($gov_bonds)) ||
                                    ($infra_bonds && count($infra_bonds)) ||
                                    ($saccos && count($saccos)) ||
                                    ($mmfs && count($mmfs)))
                                <h3 style="font-weight: bold">Contribution Investments</h3>

                                <!-- Sacco Investments Table -->
                                @if ($saccos && count($saccos) > 0)
                                    <div class="table-responsive" style="margin-bottom: 40px;">
                                        <h4 style="font-weight: 600">Sacco Investments</h4>
                                        <table class="table table-striped">
                                            <thead>
                                                <th>Name</th>
                                                <th>Date of Investment</th>
                                                <th>Monthly Contribution</th>
                                                <th>Nbr. of Months</th>
                                                <th>RoR</th>
                                                <th>Tax</th>
                                                <th>Maturity</th>
                                                <th>Gross Income</th>
                                                <th>Net Income</th>
                                                <th>Edit RoR</th>
                                                <th>Contribute</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($saccos as $sacco)
                                                    <tr>
                                                        <td>{{ $sacco->investment_type }}</td>
                                                        <td>{{ $sacco->created_at->format('d F Y') }}</td>
                                                        <td>{{ number_format($sacco->total_investment) }}</td>
                                                        <td>{{ $sacco->number_of_months }} months</td>
                                                        <td>{{ $sacco->rate_of_return }}%</td>
                                                        <td>15%</td>
                                                        <td>{{ $sacco->created_at->addMonths($sacco->number_of_months)->format('d F Y') }}
                                                        </td>
                                                        <td>{{ number_format($sacco->total_investment + ($sacco->total_investment * $sacco->rate_of_return) / 100) }}
                                                        <td>{{ number_format($sacco->total_investment + ($sacco->total_investment + ($sacco->total_investment * $sacco->rate_of_return) / 100 - $sacco->total_investment) * 0.85) }}
                                                        </td>
                                                        <!-- Edit RoR Form -->
                                                        <td>
                                                            <form action="{{ route('updateRate', $sacco->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="number" name="update_rate"
                                                                    value="{{ $sacco->rate_of_return }}"
                                                                    min="0" style="width: 80px;">
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-primary mt-1">Update</button>
                                                            </form>
                                                        </td>
                                                        <!-- Contribute Form -->
                                                        <td>
                                                            <form action="{{ route('contribute', $sacco->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="number" name="contribution_amount"
                                                                    min="0" placeholder="Amount"
                                                                    style="width: 80px;">
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-success mt-1">Contribute</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                @endif

                                <!-- Money Market Funds (MMFs) Table -->
                                @if ($mmfs && count($mmfs) > 0)
                                    <div class="table-responsive" style="margin-bottom: 40px;">
                                        <h4 style="font-weight: 600">Money Market Funds</h4>
                                        <table class="table table-striped">
                                            <thead>
                                                <th>Name</th>
                                                <th>Date of Investment</th>
                                                <th>Initial Investment</th>
                                                <th>Cumulative Investment</th>
                                                <th>Nbr. of Months</th>
                                                <th>RoR</th>
                                                <th>Tax</th>
                                                <th>Maturity</th>
                                                <th>Gross Income</th>
                                                <th>Net Income</th>
                                                <th>Edit RoR</th>
                                                <th>Contribute</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($mmfs as $mmf)
                                                    <tr>
                                                        <td>{{ $mmf->mmf_name }}</td>
                                                        <td>{{ $mmf->created_at->format('d F Y') }}</td>
                                                        <td>{{ number_format($mmf->initial_investment) }}</td>
                                                        <td>{{ number_format($mmf->total_investment) }}</td>
                                                        <td>{{ $mmf->number_of_months }} months</td>
                                                        <td>{{ $mmf->rate_of_return }}%</td>
                                                        <td>15%</td>
                                                        <td>{{ $mmf->created_at->addMonths($mmf->number_of_months)->format('d F Y') }}
                                                        </td>
                                                        <td>{{ number_format($mmf->total_investment + ($mmf->total_investment * $mmf->rate_of_return) / 100) }}
                                                        <td>{{ number_format($mmf->total_investment + ($mmf->total_investment + ($mmf->total_investment * $mmf->rate_of_return) / 100 - $mmf->total_investment) * 0.85) }}
                                                        </td>
                                                        <!-- Edit RoR Form -->
                                                        <td>
                                                            <form action="{{ route('updateRate', $mmf->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="number" name="update_rate"
                                                                    value="{{ $mmf->rate_of_return }}" min="0"
                                                                    style="width: 80px;">
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-primary mt-1">Update</button>
                                                            </form>
                                                        </td>
                                                        <!-- Contribute Form -->
                                                        <td>
                                                            <form action="{{ route('contribute', $mmf->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="number" name="contribution_amount"
                                                                    min="0" placeholder="Amount"
                                                                    style="width: 80px;">
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-success mt-1">Contribute</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                @endif

                                <h3 style="font-weight: bold;">Fixed Investments</h3>

                                <!-- Treasury Bills Table -->
                                @if ($t_bills && count($t_bills) > 0)
                                    <div class="table-responsive" style="margin-bottom: 40px;">
                                        <h4 style="font-weight: 600">Treasury Bills</h4>
                                        <table class="table table-striped">
                                            <thead>
                                                <th>Name</th>
                                                <th>Date of Investment</th>
                                                <th>Total Investment</th>
                                                <th>Number of Days</th>
                                                <th>Rate of Return</th>
                                                <th>Tax</th>
                                                <th>Maturity</th>
                                                <th>Gross Income</th>
                                                <th>Net Income</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($t_bills as $bill)
                                                    <tr>
                                                        <td>{{ $bill->investment_type }}({{ $bill->number_of_days }}
                                                            days) </td>
                                                        <td>{{ $bill->created_at->format('d F Y') }}</td>
                                                        <td>{{ number_format($bill->total_investment) }}</td>
                                                        <td>{{ $bill->created_at->addDays($bill->number_of_days)->format('d F Y') }}
                                                        </td>
                                                        <td>{{ $bill->rate_of_return }}%</td>
                                                        <td>15%</td>
                                                        <td>{{ $bill->number_of_days }}</td>
                                                        <td>{{ number_format($bill->total_investment + ($bill->total_investment * $bill->rate_of_return) / 100) }}
                                                        <td>{{ number_format($bill->total_investment + ($bill->total_investment + ($bill->total_investment * $bill->rate_of_return) / 100 - $bill->total_investment) * 0.85) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                @endif

                                <!-- Government Bonds Table -->
                                @if ($gov_bonds && count($gov_bonds) > 0)
                                    <div class="table-responsive" style="margin-top: 40px;">
                                        <h4 style="font-weight: 600">Government Bonds</h4>
                                        <table class="table table-striped">
                                            <thead>
                                                <th>Name</th>
                                                <th>Date of Investment</th>
                                                <th>Total Investment</th>
                                                <th>Number of Years</th>
                                                <th>Details of Investment</th>
                                                <th>Rate of Return</th>
                                                <th>Tax</th>
                                                <th>Maturity</th>
                                                <th>Gross Income</th>
                                                <th>Net Income</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($gov_bonds as $govbond)
                                                    <tr>
                                                        <td>{{ $govbond->investment_type }}</td>
                                                        <td>{{ $govbond->created_at->format('d F Y') }}</td>
                                                        <td>{{ number_format($govbond->total_investment) }}</td>
                                                        <td>{{ $govbond->number_of_years }} years</td>
                                                        <td>{{ $govbond->details_of_investment }}</td>
                                                        <td>{{ $govbond->rate_of_return }}%</td>
                                                        <td>15%</td>
                                                        <td>{{ $govbond->created_at->addYears($govbond->number_of_years)->format('d F Y') }}
                                                        </td>
                                                        <td>{{ number_format($govbond->total_investment + ($govbond->total_investment * $govbond->rate_of_return) / 100) }}
                                                        <td>{{ number_format($govbond->total_investment + ($govbond->total_investment + ($govbond->total_investment * $govbond->rate_of_return) / 100 - $govbond->total_investment) * 0.85) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                @endif

                                <!-- Infrastructure Bonds Table -->
                                @if ($infra_bonds && count($infra_bonds) > 0)
                                    <div class="table-responsive" style="margin-top: 40px;">
                                        <h4 style="font-weight: 600">Infrastructure Bonds</h4>
                                        <table class="table table-striped">
                                            <thead>
                                                <th>Name</th>
                                                <th>Total Investment</th>
                                                <th>Number of Years</th>
                                                <th>Details of Investment</th>
                                                <th>Rate of Return</th>
                                                <th>Maturity</th>
                                                <th>Projected Revenue</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($infra_bonds as $infrabond)
                                                    @php
                                                        $created_at = \Carbon\Carbon::parse($infrabond->created_at);
                                                        $month_days = $infrabond->number_of_months * 30;
                                                        $year_days = $infrabond->number_of_years * 365;
                                                        $total_maturity_days =
                                                            $infrabond->number_of_days + $month_days + $year_days;
                                                        $maturity_date = $created_at->addDays($total_maturity_days);
                                                        $remaining_days = Carbon::now()
                                                            ->startOfDay()
                                                            ->diffInDays($maturity_date->startOfDay(), false);
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $infrabond->investment_type }}</td>
                                                        <td>{{ number_format($infrabond->total_investment) }}</td>
                                                        <td>{{ $infrabond->number_of_years }} years</td>
                                                        <td>{{ $infrabond->details }}</td>
                                                        <td>{{ $infrabond->rate_of_return }}%</td>
                                                        <td>In {{ $remaining_days }} days</td>
                                                        <td>{{ number_format($infrabond->total_investment + ($infrabond->total_investment * $infrabond->rate_of_return) / 100) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            @else
                                <div class="alert alert-warning">You do not have any investments. Add an Investment to
                                    start tracking!</div>
                            @endif
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
            // Your data array
            const moneyMarketFundData = [{
                    rank: 1,
                    fundManager: "Cytonn",
                    effectiveAnnualRate: "18.14%"
                },
                {
                    rank: 2,
                    fundManager: "Lofty-Corban",
                    effectiveAnnualRate: "18.04%"
                },
                {
                    rank: 3,
                    fundManager: "Etica",
                    effectiveAnnualRate: "17.35%"
                },
                {
                    rank: 4,
                    fundManager: "Arvocap",
                    effectiveAnnualRate: "17.13%"
                },
                {
                    rank: 5,
                    fundManager: "Kuza",
                    effectiveAnnualRate: "17.00%"
                },
                {
                    rank: 6,
                    fundManager: "GenAfrica",
                    effectiveAnnualRate: "16.47%"
                },
                {
                    rank: 7,
                    fundManager: "Nabo Africa",
                    effectiveAnnualRate: "16.01%"
                },
                {
                    rank: 8,
                    fundManager: "Enwealth",
                    effectiveAnnualRate: "15.98%"
                },
                {
                    rank: 9,
                    fundManager: "Jubilee",
                    effectiveAnnualRate: "15.71%"
                },
                {
                    rank: 10,
                    fundManager: "Madison",
                    effectiveAnnualRate: "15.62%"
                },
                {
                    rank: 11,
                    fundManager: "Ndovu",
                    effectiveAnnualRate: "15.51%"
                },
                {
                    rank: 12,
                    fundManager: "Co-op",
                    effectiveAnnualRate: "15.36%"
                },
                {
                    rank: 13,
                    fundManager: "KCB",
                    effectiveAnnualRate: "15.34%"
                },
                {
                    rank: 14,
                    fundManager: "Mali",
                    effectiveAnnualRate: "15.24%"
                },
                {
                    rank: 15,
                    fundManager: "Sanlam",
                    effectiveAnnualRate: "15.11%"
                },
                {
                    rank: 16,
                    fundManager: "Absa Shilling",
                    effectiveAnnualRate: "15.03%"
                },
                {
                    rank: 17,
                    fundManager: "Apollo",
                    effectiveAnnualRate: "15.00%"
                },
                {
                    rank: 18,
                    fundManager: "Orient Kasha",
                    effectiveAnnualRate: "14.80%"
                },
                {
                    rank: 19,
                    fundManager: "AA Kenya Shillings Fund",
                    effectiveAnnualRate: "14.57%"
                },
                {
                    rank: 20,
                    fundManager: "Stanbic",
                    effectiveAnnualRate: "14.48%"
                },
                {
                    rank: 21,
                    fundManager: "Genghis",
                    effectiveAnnualRate: "14.40%"
                },
                {
                    rank: 22,
                    fundManager: "Dry Associates",
                    effectiveAnnualRate: "14.05%"
                },
                {
                    rank: 23,
                    fundManager: "Old Mutual",
                    effectiveAnnualRate: "14.02%"
                },
                {
                    rank: 24,
                    fundManager: "ICEA Lion",
                    effectiveAnnualRate: "13.76%"
                },
                {
                    rank: 25,
                    fundManager: "CIC",
                    effectiveAnnualRate: "13.70%"
                },
                {
                    rank: 26,
                    fundManager: "Equity",
                    effectiveAnnualRate: "13.25%"
                },
                {
                    rank: 27,
                    fundManager: "British-American",
                    effectiveAnnualRate: "13.12%"
                },
                {
                    rank: 28,
                    fundManager: "Mayfair",
                    effectiveAnnualRate: "11.92%"
                }
            ];

            // Get reference to the select element
            const selectElement = document.getElementById('funds');
            const projectedRateOfReturnInput = document.getElementById('projectedRateOfReturn');

            // Populate the select options
            moneyMarketFundData.forEach(fund => {
                // Create a new option element
                const option = document.createElement('option');
                option.value = fund.fundManager; // Set the value attribute
                option.text = fund.fundManager; // Set the displayed text

                // Append the option to the select element
                selectElement.appendChild(option);
            });

            // Add event listener to update the input based on selected fund
            selectElement.addEventListener('change', function() {
                const selectedFund = this.value;

                // Find the selected fund object
                const fund = moneyMarketFundData.find(f => f.fundManager === selectedFund);

                if (fund) {
                    // Remove the '%' from the rate and convert to a number
                    const rate = parseFloat(fund.effectiveAnnualRate.replace('%', ''));
                    // Set the value of the input field
                    projectedRateOfReturnInput.value = rate;
                }
            });

            const InvestmentManager = {
                // Elements
                elements: {
                    investmentType: document.getElementById('investment_type'),
                    numberOfDays: document.getElementById('number_of_days'),
                    numberOfYears: document.getElementById('number_of_years'),
                    numberOfMonths: document.getElementById('number_of_months'),
                    initialInvestment: document.getElementById('initial_investment'),
                    totalInvestment: document.getElementById('total_investment'),
                    mmfName: document.getElementById('mmf_name'),
                    detailsOfInvestment: document.getElementById('details_of_investment'),
                    monthlyContribution: document.getElementById('monthly_contribution'),
                    monthlyIncome: document.getElementById('monthly_income'),
                    rateOfReturn: document.getElementById('rate_of_return'),
                    realEstatePrice: document.getElementById('real_estate_price'),
                },

                // Investment types
                types: {
                    BILLS: "Treasury Bills",
                    GOV_BONDS: "Government Bonds",
                    INFRA_BONDS: "Infrastructure Bonds",
                    MMF: "Money Market Fund",
                    SACCO: "Sacco Investments",
                    RE: "Real Estate",
                },

                // Current state
                currentSelection: null,

                // Initialize
                init() {
                    this.currentSelection = this.elements.investmentType.value;
                    this.elements.investmentType.addEventListener('change', () => {
                        this.currentSelection = this.elements.investmentType.value;
                        this.updateFields();
                    });

                    // Initial update
                    this.updateFields();
                },

                // Update fields based on selection
                updateFields() {
                    // Reset all fields first
                    this.hideAllFields();

                    switch (this.currentSelection) {
                        case this.types.BILLS:
                            this.showField('rateOfReturn');
                            this.showField('numberOfDays');
                            this.showField('totalInvestment');
                            break;

                        case this.types.GOV_BONDS:
                            this.showField('rateOfReturn');
                            this.showField('numberOfYears');
                            this.showField('totalInvestment');
                            this.showField('detailsOfInvestment');
                            break;

                        case this.types.INFRA_BONDS:
                            this.showField('rateOfReturn');
                            this.showField('numberOfYears');
                            this.showField('totalInvestment');
                            this.showField('detailsOfInvestment');
                            break;

                        case this.types.MMF:
                            this.showField('rateOfReturn');
                            this.showField('numberOfMonths');
                            this.showField('initialInvestment');
                            this.showField('mmfName');
                            break;

                        case this.types.SACCO:
                            this.showField('rateOfReturn');
                            this.showField('numberOfMonths');
                            this.showField('monthlyContribution');
                            break;

                        case this.types.RE:
                            this.showField('realEstatePrice');
                            this.showField('monthlyIncome');
                            break;
                    }
                },

                // Helper method to hide all fields
                hideAllFields() {
                    Object.keys(this.elements).forEach(key => {
                        if (key !== 'investmentType') { // Don't hide the investment type selector
                            const element = this.elements[key];
                            if (element) { // Check if element exists
                                element.style.display = 'none';
                                element.disabled = true;
                            }
                        }
                    });
                },

                // Helper method to show specific field
                showField(fieldName) {
                    const element = this.elements[fieldName];
                    if (element) { // Check if element exists
                        element.style.display = 'block';
                        element.disabled = false;
                    }
                },

                // Get current selection
                getCurrentSelection() {
                    return {
                        type: this.currentSelection,
                        value: this.elements.investmentType.options[this.elements.investmentType.selectedIndex].textContent
                    };
                }
            };

            // Initialize the manager
            InvestmentManager.init();
            
            let myChart = null;

            // Store all your data
            const allLabels = @json($investment_names);
            const allData = @json($investment_values);
            const allMonths = @json($investment_months);

            document.getElementById('chartContainer').style.display = 'none';
            const ctx = document.getElementById('investmentChart');

            document.getElementById('getReport').addEventListener('change', function() {
                const selectedMonth = this.value;

                if (selectedMonth) {
                    if (allMonths.includes(selectedMonth)) {
                        document.getElementById('chartContainer').style.display = 'block';
                        document.getElementById('data_information').style.display = 'none';

                        const filteredIndices = allMonths.map((month, index) =>
                            month === selectedMonth ? index : -1).filter(index => index !== -1);

                        const filteredLabels = filteredIndices.map(index => allLabels[index]);
                        const filteredData = filteredIndices.map(index => allData[index]);

                        if (myChart) {
                            myChart.destroy();
                        }

                        myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: filteredLabels,
                                datasets: [{
                                    label: 'Report for ' + getMonthName(selectedMonth) + ' ' +
                                        new Date().getFullYear(),
                                    data: filteredData,
                                    borderWidth: 1,
                                    borderColor: 'rgba(0, 0, 0, 0.5)',
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.5)',
                                        'rgba(54, 162, 235, 0.5)',
                                        'rgba(255, 206, 86, 0.5)',
                                        'rgba(75, 192, 192, 0.5)',
                                        'rgba(153, 102, 255, 0.5)',
                                    ],
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    } else {
                        document.getElementById('chartContainer').style.display = 'none';
                        document.getElementById('data_information').style.display = 'block';
                    }
                } else {
                    document.getElementById('chartContainer').style.display = 'none';
                }
            });

            function getMonthName(monthNumber) {
                const date = new Date();
                date.setMonth(monthNumber - 1);
                return date.toLocaleString('en-US', {
                    month: 'long'
                });
            }
        </script>
</body>

</html>
