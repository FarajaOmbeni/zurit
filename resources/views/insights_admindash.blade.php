<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Insights</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_res/css/style.css">
    <link rel="icon" href="{{ asset('img/ico_logo.png') }}">

    <!-- PWA  -->
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body>

    @extends('layouts.adminbar')
    @include('layouts.app')

    <div class="container">
        @yield('content') <!-- content of child views -->
    </div>

    <div class="container col-lg-8 mx-auto">
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Admin Dashboard - Insights</h2>

            <!-- Total Users Card -->
            <div class="card text-center mb-4"
                style="background: linear-gradient(to right, midnightblue, rgba(156, 39, 176, 0.7), rgba(255, 193, 7, 0.7)); color: white;">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-4 font-weight-bold">{{ $totalUsers }}</p>
                </div>
            </div>
            <!-- Users, Admins, Editors Summary Cards -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color: rgba(33, 150, 243, 0.7);">
                        <div class="card-body">
                            <h5 class="card-title">Users</h5>
                            <p class="card-text">{{ $regularUsers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color: rgba(156, 39, 176, 0.7);">
                        <div class="card-body">
                            <h5 class="card-title">Admins</h5>
                            <p class="card-text">{{ $admins }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color: rgba(255, 193, 7, 0.7);">
                        <div class="card-body">
                            <h5 class="card-title">Editors</h5>
                            <p class="card-text">{{ $editors }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Growth Over Time Line Chart -->
            <div class="mt-4">
                <canvas id="userGrowthChart" width="800" height="400"></canvas>
            </div>

            <!-- Recent Activities -->
            <div class="mt-4">
                <h5>Recent Activities</h5>

                <!-- Recent Users Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Recent Users</h5>
                        <ul class="list-group">
                            @foreach ($recentUsers as $user)
                                <li class="list-group-item">User {{ $user->name }} registered.</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Recent Blogs Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Recent Blogs</h5>
                        <ul class="list-group">
                            @foreach ($recentBlogs as $blog)
                                <li class="list-group-item">{{ $blog->blog_title }} by
                                    {{ $blog->user ? $blog->user->name : 'Unknown User' }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Recent Books Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Recent Books</h5>
                        <ul class="list-group">
                            @foreach ($recentBooks as $book)
                                <li class="list-group-item">{{ $book->book_name }} added.</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Total Books Card -->
            <div class="card mt-4" style="background-color: rgba(33, 150, 243, 0.7);">
                <div class="card-body">
                    <h5 class="card-title">Total Books</h5>
                    <p class="card-text">{{ $totalBooks }}</p>
                </div>
            </div>

            <!-- Total Blogs Card -->
            <div class="card mt-4" style="background-color: rgba(156, 39, 176, 0.7);">
                <div class="card-body">
                    <h5 class="card-title">Total Blogs</h5>
                    <p class="card-text">{{ $totalBlogs }}</p>
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


        <!-- Include necessary scripts -->
        <script src="admin_res/js/jquery.min.js"></script>
        <script src="admin_res/js/popper.js"></script>
        <script src="admin_res/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Fetch user growth data from the server
            var userGrowthData = {!! json_encode($userGrowthData) !!};

            // User Growth Chart
            var userGrowthChart = new Chart(document.getElementById("userGrowthChart"), {
                type: 'line',
                data: {
                    labels: userGrowthData.labels,
                    datasets: [{
                        label: 'User Growth Over Time',
                        data: userGrowthData.data,
                        borderColor: '#007BFF',
                        fill: false
                    }]
                }
            });
        </script>

</body>

</html>
