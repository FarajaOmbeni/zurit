<!DOCTYPE html>
<html lang="en">

<head>
    <title>Net Worth Calculator</title>
    <meta charset="utf-8">
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
</head>

<body>
    @include('layouts.app')
    @extends('layouts.userbar')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div id="content" class="p-md-5 pt-5">
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
                                    <form action="{{ route('storeLiability') }}" method="post" id="addLiabilityForm">
                                        @csrf
                                        <div class="form-group">
                                            <label for="liabilityDescription">Liability Description</label>
                                            <input type="text" class="" id="liabilityDescription"
                                                name="liabilityDescription" placeholder="Enter liability description">
                                        </div>
                                        <div class="form-group">
                                            <label for="liabilityValue">Liability Value</label>
                                            <input type="number" class="" id="liabilityValue"
                                                name="liabilityValue" placeholder="Enter liability value">
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
                                    <td>{{ $i < $assetCount ? $assets[$i]->asset_value : '' }}</td>
                                    <td></td> <!-- Empty cell for spacing -->
                                    <td>{{ $i < $liabilityCount ? $liabilities[$i]->liability_description : '' }}</td>
                                    <td>-{{ $i < $liabilityCount ? $liabilities[$i]->liability_value : '' }}</td>
                                </tr>
                            @endfor
                        </tbody>
                        <!-- Footer section to display total assets and liabilities -->
                        <tfoot>
                            <tr>
                                <th>Total Assets</th>
                                <td>{{ $assets->sum('asset_value') }}</td>
                                <td></td> <!-- Add an empty cell for spacing -->
                                <th>Total Liabilities</th>
                                <td>-{{ $liabilities->sum('liability_value') }}</td>
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
                                $totalLiabilities = $liabilities->sum('liability_value');

                                // Calculate net worth
                                $netWorth = $totalAssets - $totalLiabilities;

                                // Get the current month and year
                                $currentMonthYear = date('F Y'); // Outputs the full month name and year (e.g., January 2023)
                            @endphp

                            <h5 class="card-title">Net Worth for {{ $currentMonthYear }}</h5>
                            <p class="card-text">Total Assets: {{ number_format($totalAssets, 2) }}</p>
                            <p class="card-text">Total Liabilities: -{{ number_format($totalLiabilities, 2) }}</p>
                            <h4 class="card-text">Net Worth: {{ number_format($netWorth, 2) }}</h4>
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
                        <button type="button" class="btn btn-primary mt-3">View More</button>
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
        // Extracting data from the table
        const assetDescriptions = [];
        const assetValues = [];
        const liabilityDescriptions = [];
        const liabilityValues = [];
        const months = [];

        const tableRows = document.querySelectorAll('table.table tbody tr');

        tableRows.forEach(row => {
            const [assetDescription, assetValue, _, liabilityDescription, liabilityValue] = row.children;
            assetDescriptions.push(assetDescription.innerText);
            assetValues.push(parseFloat(assetValue.innerText.replace('$', '').replace(/,/g,
            ''))); // Remove $ and commas, convert to float

            liabilityDescriptions.push(liabilityDescription.innerText);
            liabilityValues.push(parseFloat(liabilityValue.innerText.replace('$', '').replace(/,/g,
            ''))); // Remove $ and commas, convert to float

            // Extract the month and add it to the array (if available)
            const monthText = row.querySelector('td:first-child').innerText;
            if (monthText) {
                months.push(monthText);
            }
        });

        // Bar graph for total assets and liabilities
        const barCtx = document.getElementById('barGraph').getContext('2d');
        const barGraph = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        label: 'Total Assets',
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        data: [assetValues.filter(Boolean).reduce((a, b) => a + b, 0)], // Total assets
                    },
                    {
                        label: 'Total Liabilities',
                        backgroundColor: 'rgba(255, 0, 0, 0.5)',
                        borderColor: 'rgba(255, 0, 0, 1)',
                        borderWidth: 2,
                        data: [liabilityValues.filter(Boolean).reduce((a, b) => a + b,
                        0)], // Total liabilities (negative for display purposes)
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true,
                    }],
                },
            },
        });



        // Pie chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Assets', 'Liabilities'],
                datasets: [{
                    data: [
                        assetValues.filter(Boolean).reduce((a, b) => a + b, 0), // Total assets
                        -liabilityValues.filter(Boolean).reduce((a, b) => a + b,
                        0), // Total liabilities
                    ],
                    backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 0, 0, 0.5)'],
                }, ],
            },
        });
    </script>


</body>

</html>
