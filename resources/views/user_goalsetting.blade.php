<!DOCTYPE html>
<html lang="en">

<head>
    <title>Goal Setting Tool</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link your CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('planners_res/style.css') }}?v={{ time() }}">
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

<body>
    @extends('layouts.userbar')
    @include('layouts.app')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div id="content" class="p-md-5 pt-5">
                    <div class="goal_content">
                        <div class="container mt-2">
                            <!-- Net income card-->
                            <div class="alert alert-info">
                                @if ($netIncome > 0)
                                    You have KES {{ number_format($netIncome) }} as surplus. You can use this amount
                                    to achieve your goals.
                                @else
                                    You have no surplus income to pay your debts. You have a deficit of KES
                                    {{ number_format($netIncome) }}.
                                @endif

                            </div>
                            <!-- Add new goal button -->
                            <div class="mb-3">
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
                                <button type="button" class="button" data-toggle="modal" data-target="#goalModal">Add
                                    Goal</button>
                                <a type="button" class="button" href="user_investmentplanner">Plan Investments
                                </a>
                            </div>
                            <!-- Goal Modal -->
                            <div class="modal fade" id="goalModal" tabindex="-1" role="dialog"
                                aria-labelledby="goalModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="goalModalLabel">Add Goal</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            @if (session('success'))
                                                <div class="alert alert-success" id="success-alert">

                                                </div>

                                                <script>
                                                    setTimeout(function() {
                                                        $('#success-alert').fadeOut('fast');
                                                    }, {{ session('success')['duration'] }});
                                                </script>
                                            @endif
                                            @if (session('error'))
                                                <div class="alert alert-success" id="success-alert">
                                                    {{ session('error')['message'] }}
                                                </div>

                                                <script>
                                                    setTimeout(function() {
                                                        $('#success-alert').fadeOut('fast');
                                                    }, {{ session('success')['duration'] }});
                                                </script>
                                            @endif
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('storeGoal') }}" method="post" id="customForm">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Goal Name</label>
                                                    <input required type="text" class="form-control" name="title"
                                                        id="title" placeholder="Enter title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="goal_amount">Goal Amount</label>
                                                    <input required type="number" class="form-control"
                                                        name="goal_amount" id="goal_amount" placeholder="Enter amount">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label><br>
                                                    <select class="form-control" name="description" id="description"
                                                        onchange="checkOther(this);">
                                                        <option value="Health & Fitness">Health & Fitness</option>
                                                        <option value="Career Advancement">Career Advancement</option>
                                                        <option value="financial">Financial</option>
                                                        <option value="Personal Development">Personal Development
                                                        </option>
                                                        <option value="Education">Education</option>
                                                        <option value="Entertainment">Entertainment</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group hidden" id="otherDescription">
                                                    <label for="otherDescription">Please Specify: </label>
                                                    <input type="text" class="form-control" name="otherDescription"
                                                        placeholder="Specify Description">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deadline">When do you want achieve the goal?</label>
                                                    <input required type="date" class="form-control"
                                                        name="deadline" id="deadline">
                                                </div>
                                                <div class="form-group">
                                                    <label for="current_amount">Would you like to contribute to your
                                                        goal now? (Leave blank if not)</label>
                                                    <input required type="number" class="form-control"
                                                        name="current_amount" id="current_amount"
                                                        placeholder="Enter amount">
                                                </div>
                                                <button type="submit" class="button mt-3">Set Goal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Goals table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Goal Title</th>
                                            <th>Description</th>
                                            <th>Goal Amount</th>
                                            <th>Deadline</th>
                                            <th>Additional Deposits</th>
                                            <th>Contribute</th>
                                            <th>Delete</th>
                                            {{-- <th>
                                                <select id="goal-filter" class="goal_filter">
                                                    <option value="all">All</option>
                                                    <option value="short-term">Short-term</option>
                                                    <option value="medium-term">Middle-term</option>
                                                    <option value="long-term">Long-term</option>
                                                </select>
                                            </th> --}}
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($goals as $goal)
                                            <tr class="goal-row"
                                                @if ($goal->current_amount >= $goal->goal_amount) style="display: none" @endif
                                                data-period="{{ strtolower($goal->period) }}">
                                                <td>{{ $goal->title }}</td>
                                                <td>{{ $goal->description }}</td>
                                                <td>{{ number_format($goal->goal_amount) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($goal->deadline)->format('d M Y') }}
                                                </td>
                                                <td>{{ number_format($goal->current_amount) }}</td>
                                                <td>
                                                    <!-- Form for adding contributions -->
                                                    <form action="{{ route('addCurrentAmount', $goal->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input style="width: 8rem" type="number" name="addedAmount"
                                                            placeholder="Add Amount">
                                                        <button style="width: 4rem" type="submit"
                                                            class="btn btn-primary">Add</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('goal.destroy', $goal) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">No goals found. Please add your goals.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Progress card -->
                            <div class="card mt-3"
                                style="background: linear-gradient(45deg, rgba(41, 128, 185, 1), rgba(155, 89, 182, 1), rgba(255, 193, 7, 1));">
                                <div class="card-body">
                                    <h2 class="card-title text-white">Progress Overview</h2>
                                    @if ($totalGoals === 0)
                                        <p class="card-text text-white">Please add your goals to track progress.
                                        </p>
                                    @else
                                        <h3 class="card-text text-white">{{ $completedGoals }} out of
                                            {{ $totalGoals }} goals completed</h3>
                                    @endif
                                </div>
                            </div>

                            <!-- Bar graph and pie chart for goals -->
                            <div class="mt-4">
                                <h2>Goals Completion Status</h2>
                                <div style="max-width: 600px;">
                                    <!-- Bar graph -->
                                    <canvas id="goalsBarGraph"></canvas>
                                </div>
                                <div style="max-width: 400px; margin-top: 20px;">
                                    <!-- Pie chart -->
                                    <canvas id="goalsPieChart"></canvas>
                                    <!-- View More button -->
                                    <!-- <button type="button" class="btn btn-primary mt-3">View More</button> -->
                                </div>
                            </div>

                            <!-- Goals table -->
                            <h2>Completed Goals</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Goal Title</th>
                                            <th>Description</th>
                                            <th>Goal Amount</th>
                                            {{-- <th>
                                                <select id="goal-filter" class="goal_filter">
                                                    <option value="all">All</option>
                                                    <option value="short-term">Short-term</option>
                                                    <option value="medium-term">Middle-term</option>
                                                    <option value="long-term">Long-term</option>
                                                </select>
                                            </th> --}}
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($goals as $goal)
                                            @if ($goal->current_amount >= $goal->goal_amount)
                                                <tr class="goal-row" data-period="{{ strtolower($goal->period) }}">
                                                    <td>{{ $goal->title }}</td>
                                                    <td>{{ $goal->description }}</td>
                                                    <td>{{ number_format($goal->goal_amount) }}</td>
                                                </tr>
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="4">No Completed Goals.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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
        // END OF PWA

        //Activate other option
        function checkOther(select) {
            let otherField = document.getElementById('otherDescription');
            otherField.classList.toggle('hidden', select.value !== 'other');
        }

        // Data from PHP
        const goalLabels = {!! json_encode($goals->pluck('title')) !!};
        const completionPercentages = {!! json_encode($completionPercentages) !!};

        // Bar graph for goals
        const goalsBarCtx = document.getElementById('goalsBarGraph').getContext('2d');
        const goalsBarGraph = new Chart(goalsBarCtx, {
            type: 'bar',
            data: {
                labels: goalLabels,
                datasets: [{
                    label: 'Completion Percentage',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    data: completionPercentages,
                }],
            },
        });

        //Other option add
        document.getElementById('category').addEventListener('change', function() {
            if (this.value == 'other-category') {
                document.getElementById('other-category').style.display = 'block';
            } else {
                document.getElementById('other-category').style.display = 'none';
            }
        });

        // Pie chart for goals
        document.addEventListener('DOMContentLoaded', function() {
            const goalsPieCtx = document.getElementById('goalsPieChart').getContext('2d');
            const goalsPieChart = new Chart(goalsPieCtx, {
                type: 'pie',
                data: {
                    labels: ['Completed', 'Not Completed'],
                    datasets: [{
                        data: [5, 10],
                        backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)'],
                    }],
                },
            });
        });




        document.getElementById('goal-filter').addEventListener('change', function() {
            const filter = this.value;
            const rows = document.querySelectorAll('.goal-row');
            rows.forEach(row => {
                if (filter === 'all') {
                    row.style.display = '';
                } else if (filter === 'short-term' && row.dataset.period === 'short-term') {
                    row.style.display = '';
                } else if (filter === 'medium-term' && row.dataset.period === 'medium-term') {
                    row.style.display = '';
                } else if (filter === 'long-term' && row.dataset.period === 'long-term') {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>
