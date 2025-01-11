<!DOCTYPE html>
<html lang="en">

<head>
    <title>Net Worth Calculator</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link your CSS files -->
    <link rel="stylesheet" href="{{ asset('planners_res/style.css') }}?v={{ time() }}">
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
                        <div class="alert alert-warning" id="success-alert">
                            <p>You are in the danger zone. Your liabilities exceed your assets. But Worry not, we are
                                here to help. Click the button below to
                                reach us so that we can help you get
                                back on track.</p>
                            <form action="">@csrf<span id="send_help">Send Request</span></form>
                        </div>
                    @elseif ($netWorth >= 0)
                        <div class="alert alert-success" id="success-alert">
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
                        <button type="button" class="btn btn-success mr-2" data-toggle="modal"
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
                    <table class="table-responsive">
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

                            @php
                                $unpaidLiabilities = $liabilities->filter(function ($liability) {
                                    return $liability->current_balance != $liability->minimum_payment;
                                });
                                $maxCount = max($assetCount, count($unpaidLiabilities));
                            @endphp

                            @for ($i = 0; $i < $maxCount; $i++)
                                <tr>
                                    <td>{{ $i < $assetCount ? $assets[$i]->asset_description : '' }}</td>
                                    <td>{{ $i < $assetCount ? number_format($assets[$i]->asset_value) : '' }}</td>
                                    <td></td> <!-- Empty cell for spacing -->
                                    <td>{{ $i < count($unpaidLiabilities) ? $unpaidLiabilities->values()[$i]->debt_name : '' }}
                                    </td>
                                    <td>-{{ $i < count($unpaidLiabilities) ? number_format($unpaidLiabilities->values()[$i]->current_balance - $unpaidLiabilities->values()[$i]->minimum_payment) : '' }}
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

                    <!-- Assets table -->
                    <div class="table-responsive mt-4">
                        <h3>Assets List</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($assets as $asset)
                                    <tr>
                                        <td>{{ $asset->asset_description }}</td>
                                        <td>{{ number_format($asset->asset_value) }}</td>
                                        <td>
                                            <form action="{{ route('assets.destroy', $asset->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this asset?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No assets found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Liabilities table -->
                    <div class="table-responsive mt-4">
                        <h3>Liabilities List</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($debts as $debt)
                                    <tr>
                                        <td>{{ $debt->debt_name }}</td>
                                        <td>{{ number_format($debt->current_balance) }}</td>
                                        <td>
                                            <form action="{{ route('liabilities.destroy', $debt->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this liability?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No liabilities found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Graph and pie chart for the last 6 months -->
                    <div class="mt-4 text-center">
                        <h2>Net Worth Over the Last 6 Months</h2>
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

            // Function to format currency values
            function formatCurrency(value) {
                return new Intl.NumberFormat('en-KE', {
                    style: 'currency',
                    currency: 'KES'
                }).format(value);
            }

            function updateCharts() {
                // Get historical data from PHP
                const historicalData = @json($historicalNetWorthData ?? []);
                const historicalMonths = @json($historicalMonths ?? []);

                // Get current month's data for pie chart
                const currentMonthAssets = {{ $currentMonthAssets ?? 0 }};
                const currentMonthLiabilities = {{ $currentMonthLiabilities ?? 0 }};

                // Destroy existing charts
                if (barGraph) barGraph.destroy();
                if (pieChart) pieChart.destroy();

                // Create line graph showing networth over last 6 months
                const barCtx = document.getElementById('barGraph').getContext('2d');
                barGraph = new Chart(barCtx, {
                    type: 'line',
                    data: {
                        labels: historicalMonths,
                        datasets: [{
                            label: 'Net Worth History',
                            data: historicalData,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            fill: true,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return formatCurrency(value);
                                    }
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return formatCurrency(context.raw);
                                    }
                                }
                            },
                            legend: {
                                display: true,
                                position: 'top'
                            }
                        }
                    }
                });

                // Create pie chart showing current month's assets vs liabilities
                const pieCtx = document.getElementById('pieChart').getContext('2d');
                pieChart = new Chart(pieCtx, {
                    type: 'pie',
                    data: {
                        labels: ['Current Month Assets', 'Current Month Liabilities'],
                        datasets: [{
                            data: [currentMonthAssets, Math.abs(currentMonthLiabilities)],
                            backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)'],
                            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label;
                                        const value = context.raw;
                                        return `${label}: ${formatCurrency(value)}`;
                                    }
                                }
                            },
                            title: {
                                display: true,
                                text: `Assets vs Liabilities for ${new Date().toLocaleString('default', { month: 'long', year: 'numeric' })}`,
                                font: {
                                    size: 16
                                }
                            }
                        }
                    }
                });
            }

            // Call updateCharts initially to populate the charts
            updateCharts();

            // Set up an event listener to update the charts whenever the data changes
            document.getElementById('refreshData').addEventListener('click', updateCharts);
        </script>

</body>

</html>
