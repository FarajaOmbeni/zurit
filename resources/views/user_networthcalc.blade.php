<!DOCTYPE html>
<html lang="en">

<head>
    <title>Net Worth Calculator</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <style>
        #send_advice,
        #send_help {
            color: blue;
            cursor: pointer;
        }

        #send_advice:hover,
        #send_help:hover {
            text-decoration: underline;
        }
    </style>
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
    @include('layouts.app')
    @extends('layouts.userbar')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
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
                <div id="content" class="p-md-5 pt-5">
                    @php
                        // Calculate the total assets and liabilities
                        $totalAssets = $assets->sum('asset_value');
                        $totalLiabilities = $liabilities->sum('current_balance') - $liabilities->sum('minimum_payment');

                        // Calculate net worth
                        $netWorth = $totalAssets - $totalLiabilities;

                    @endphp
                    @if ($netWorth < 0)
                        <div class="alert alert-warning" id="success-alert"
                            style="width: 50%;">
                            <p>You are in the danger zone. Your liabilities exceed your assets. But Worry not, we are
                                here to help. Click the button below to
                                reach us so that we can help you get
                                back on track.</p>
                            <form action="">@csrf<span id="send_help">Send Request</span></form>
                        </div>
                    @elseif ($netWorth >= 0)
                        <div class="alert alert-success" id="success-alert" style="width: 50%;">
                            <p>Congratulations! You are doing great. To optimize your porfolio for more returns,
                                click the link below
                                to reach us and we will be
                                there to assist you.
                            </p>
                            <form action="">@csrf<span id="send_advice">Send Request</span></form>
                        </div>
                    @endif
                    <div class="mb-3">
                        <!-- Trigger button for the asset modal -->
                        <button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                            data-target="#addAssetModal">
                            Add New Asset
                        </button>
                        <!-- Trigger button for the liability modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#addLiabilityModal">
                            Add New Liability
                        </button>
                    </div>

                    <!-- Add new asset modal -->
                    <div class="modal fade" id="addAssetModal" tabindex="-1" role="dialog"
                        aria-labelledby="addAssetModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addAssetModalLabel">Add New Asset</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Asset form -->
                                    <form action="{{ route('storeAsset') }}" method="post" id="addAssetForm">
                                        @csrf
                                        <div class="form-group">
                                            <label for="assetDescription">Asset Description</label>
                                            <input type="text" class="" name="assetDescription"
                                                id="assetDescription" placeholder="Enter asset description">
                                        </div>
                                        <div class="form-group">
                                            <label for="assetValue">Asset Value</label>
                                            <input type="number" class="" name="assetValue" id="assetValue"
                                                placeholder="Enter asset value">
                                        </div>
                                        <button type="submit" class="btn btn-success">Add Asset</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add new liability modal -->
                    <div class="modal fade" id="addLiabilityModal" tabindex="-1" role="dialog"
                        aria-labelledby="addLiabilityModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addLiabilityModalLabel">Add New Liability</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Liability form -->
                                    <form action="{{ route('storeLiability') }}" method="post"
                                        id="addLiabilityForm">
                                        @csrf
                                        <div class="form-group">
                                            <label for="liabilityDescription">Liability Description</label>
                                            <input type="text" class="" id="liabilityDescription"
                                                name="liabilityDescription" placeholder="Enter liability description">
                                        </div>
                                        <div class="form-group">
                                            <label for="liabilityValue">Liability Value</label>
                                            <input type="number" class="" name="liabilityValue"
                                                placeholder="Enter liability value">
                                        </div>
                                        <button type="submit" class="btn btn-danger">Add Liability</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Net worth table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Assets</th>
                                <th>Value</th>
                                <th></th>
                                <th>Liabilities</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $assetCount = count($assets);
                                $liabilityCount = count($liabilities);
                                $maxCount = max($assetCount, $liabilityCount);
                            @endphp

                            @for ($i = 0; $i < $maxCount; $i++)
                                <tr>
                                    <td>{{ $i < $assetCount ? $assets[$i]->asset_description : '' }}</td>
                                    <td>{{ $i < $assetCount ? number_format($assets[$i]->asset_value) : '' }}</td>
                                    <td></td> <!-- Empty cell for spacing -->
                                    <td>{{ $i < $liabilityCount ? $liabilities[$i]->debt_name : '' }}
                                    </td>
                                    <td>-{{ $i < $liabilityCount ? number_format($liabilities[$i]->current_balance - $liabilities[$i]->minimum_payment) : '' }}
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                        <!-- Footer section to display total assets and liabilities -->
                        <tfoot>
                            <tr>
                                <th>Total Assets</th>
                                <td>{{ number_format($assets->sum('asset_value')) }}</td>
                                <td></td> <!-- Add an empty cell for spacing -->
                                <th>Total Liabilities</th>
                                <td>-{{ number_format($liabilities->sum('current_balance') - $liabilities->sum('minimum_payment')) }}
                                    <div id="totalLiabilities" style="display: none">
                                        {{ $liabilities->sum('current_balance') - $liabilities->sum('minimum_payment') }}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>



                    <!-- Net worth card with colored background -->
                    <div<div class="card mt-3"
                        style="background: linear-gradient(45deg, rgb(33, 150, 243), rgb(156, 39, 176), rgb(255, 193, 7)); color: #fff;">
                        <div class="card-body">
                            @php
                                // Calculate the total assets and liabilities
                                $totalAssets = $assets->sum('asset_value');
                                $totalLiabilities =
                                    $liabilities->sum('current_balance') - $liabilities->sum('minimum_payment');

                                // Calculate net worth
                                $netWorth = $totalAssets - $totalLiabilities;

                                // Get the current month and year
                                $currentMonthYear = date('F Y'); // Outputs the full month name and year (e.g., January 2023)
                            @endphp

                            <h5 class="card-title">Net Worth for {{ $currentMonthYear }}</h5>
                            <p class="card-text">Total Assets: {{ number_format($totalAssets) }}</p>
                            <p class="card-text">Total Liabilities: -{{ number_format($totalLiabilities) }}</p>
                            <h4 class="card-text">Net Worth: {{ number_format($netWorth) }}</h4>
                        </div>
                </div>



                <!-- Graph and pie chart for the last 12 months -->
                <div class="mt-4 text-center">
                    <h2>Net Worth Over the Last 12 Months</h2>
                    <div class="d-flex justify-content-center" style="height: 400px;">
                        <canvas id="barGraph" style="max-width: 60%; height: 100%;"></canvas>
                    </div>

                    <div
                        style="max-width: 400px; margin: 20px auto; display: flex; flex-direction: column; align-items: center;">
                        <canvas id="pieChart" style="max-width: 100%;"></canvas>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const helpLink = document.getElementById('send_help');
            const adviceLink = document.getElementById('send_advice');

            const sendEmail = async (type) => {
                console.log('sendEmail function called with type:', type);
                try {
                    // First, check if the token is actually available
                    const token = document.querySelector('meta[name="csrf-token"]').content;

                    const response = await fetch('/send-financial-email', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            type: type,
                            _token: token
                        })
                    });

                    // Check if response is ok
                    if (!response.ok) {
                        const errorText = await response.text();
                        console.error('Server responded with:', errorText);
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const data = await response.json();
                    console.log('Response received:', data);

                    if (data.success) {
                        alert('Thank you! Our team will contact you soon.');
                    } else {
                        alert('Something went wrong. Please try again later.');
                    }
                } catch (error) {
                    console.error('Error in sendEmail:', error);
                    alert('An error occurred. Please try again later.');
                }
            };

            if (helpLink) {
                helpLink.addEventListener('click', () => {
                    sendEmail('help');
                });
            }

            if (adviceLink) {
                adviceLink.addEventListener('click', () => {
                    sendEmail('advice');
                });
            }
        });

        let barGraph, pieChart;
        // Select the footer row
        const footerRow = document.querySelector('table.table tfoot tr');

        // Get the total liabilities value from the last cell in the footer row
        const totalLiabilities = document.getElementById('totalLiabilities').innerText;

        function updateCharts() {
            const assetValues = [];
            const tableRows = document.querySelectorAll('table.table tbody tr');

            tableRows.forEach(row => {
                const assetValue = row.children[1]?.innerText;
                assetValues.push(parseFloat(assetValue.replace('$', '').replace(/,/g, '')) || 0);
            });

            const totalAssets = assetValues.reduce((a, b) => a + b, 0);

            // Destroy the existing charts to reinitialize them
            if (barGraph) {
                barGraph.destroy();
            }
            if (pieChart) {
                pieChart.destroy();
            }

            // Reinitialize the Bar Graph
            const barCtx = document.getElementById('barGraph').getContext('2d');
            barGraph = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['Total'],
                    datasets: [{
                            label: 'Total Assets',
                            backgroundColor: 'rgba(75, 192, 192, 0.5)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            data: [totalAssets],
                        },
                        {
                            label: 'Total Liabilities',
                            backgroundColor: 'rgba(255, 0, 0, 0.5)',
                            borderColor: 'rgba(255, 0, 0, 1)',
                            borderWidth: 2,
                            data: [totalLiabilities],
                        }
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                            stacked: true
                        }],
                        yAxes: [{
                            stacked: true
                        }],
                    },
                },
            });

            // Reinitialize the Pie Chart
            const pieCtx = document.getElementById('pieChart').getContext('2d');
            pieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Assets', 'Liabilities'],
                    datasets: [{
                        data: [totalAssets, Math.abs(totalLiabilities)],
                        backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 0, 0, 0.5)'],
                    }],
                },
            });
        }

        // Call updateCharts initially to populate the charts
        updateCharts();

        // Set up an event listener to update the charts whenever the data changes
        document.getElementById('refreshData').addEventListener('click', updateCharts);
    </script>

</body>

</html>
