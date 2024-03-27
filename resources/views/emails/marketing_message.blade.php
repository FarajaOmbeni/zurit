<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>{{ $title }}</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            .email-container {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
            }

            .logo {
                text-align: center;
                margin-bottom: 20px;
                width: 20%;
                height: auto;
            }

            .footer {
                font-size: 12px;
                text-align: center;
                margin-top: 30px;
            }
        </style>
    </head>

    <body>
        <div class="email-container">
            <div class="logo">
                <img src="zuritconsulting.com/home_res/img/logo-white2.png" alt="Logo">
            </div>
            <h2>{{ $title }}</h2>
            {!! $content !!}
            <div class="footer">
                <h4>© 2024 Zurit Consulting. All rights reserved.</h4>
            </div>
        </div>
    </body>

</html>
