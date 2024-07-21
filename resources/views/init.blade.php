<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Goal Setter</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Link your CSS files -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="goal_res/css/style.css">
        <link rel="icon" href="your_icon_path/ico_logo.png">
        <!-- PWA -->
        <meta name="theme-color" content="#fff" />
        <link rel="apple-touch-icon" href="your_icon_path/logo-white.png">
        <link rel="manifest" href="your_manifest_path/manifest.json">
    </head>

    <body>
        <!-- Header -->
        @include('layouts.app')

        <div class="container d-flex flex-column justify-content-center align-items-center"
            style="height: 100vh; margin-top: -50px;">
            <h2 class="mb-5">What goal would you like to set?</h2>
            <div class="circle-card mt-5">
                <div class="slice pink"></div>
                <div class="slice lightblue"></div>
                <div class="slice orange"></div>
                <div class="slice yellow"></div>
                <div class="slice green"></div>
                <div class="slice purple"></div>
            </div>
        </div>

        <!-- Your scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- PWA script -->
        <script src="your_sw_path/sw.js"></script>
    </body>

</html>
