@include('layouts.head')
<title>Admin Dashboard - Insights</title>
<link rel="stylesheet" href="admin_res/css/style.css">

</head>

<body>

    @extends('layouts.adminbar')


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
                            <p class="card-text font-weight-bold h5">{{ $regularUsers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color: rgba(156, 39, 176, 0.7);">
                        <div class="card-body">
                            <h5 class="card-title">Admins</h5>
                            <p class="card-text font-weight-bold h5">{{ $admins }}</p>
                        </div>
                    </div>
                </div>
                <!-- Total Blogs Card -->
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color: rgba(250, 205, 86, 1);">
                        <div class="card-body">
                            <h5 class="card-title">Total Blogs</h5>
                            <p class="card-text font-weight-bold h5">{{ $totalBlogs }}</p>
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

                <!-- Recent Blogs Card
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
                    </div> -->

                <!-- Recent Books Card
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
                </div> -->


            </div>

            @include('layouts.foot')

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
