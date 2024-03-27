<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
        <title>Debt Manager</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap"
            rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('tools_res/css/style.css') }}?v={{ time() }}">
        <link rel="icon" href="{{ asset('img/ico_logo.png') }}">

        <!-- PWA  -->
        <meta name="theme-color" content="#fff" />
        <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">
    </head>

    <body>
        @include('layouts.navbar')
        <div class="container mainmargin">
            <div class="main">
                <section id="what-is-budget-planner">
                    <div class="content">
                        <h2 class="text-center pb-4">What is a Debt Manager?</h2>
                        <p class="text-gray">
                            A Debt Manager is a financial tool designed to assist in organizing and managing debts
                            efficiently. It allows individuals and businesses to track and plan repayments, reducing the
                            financial burden.
                        </p>
                    </div>
                    <div class="image">
                        <img src="tools_res/img/debtmanager1.webp" alt="Budget Image">
                    </div>
                </section>

                <section id="why-use-our-planner">
                    <div class="content">
                        <h2 class="text-center pb-4">Why Use Our Debt Manager?</h2>
                        <p class="text-gray">
                            Our Debt Manager is a comprehensive financial solution that assists in managing and reducing
                            debts. It's designed to:
                        </p>
                        <ul class="text-list">
                            <li>Organize and track various debt accounts</li>
                            <li>Provide a structured plan for debt repayment</li>
                            <li>Offer insights into reducing debt efficiently</li>
                            <li>Manage payment schedules and avoid late payments</li>
                        </ul>
                    </div>
                    <div class="image-right">
                        <img src="tools_res/img/debtmanager2.webp" alt="Budget 2 Image">
                    </div>
                </section>

                <section id="how-it-works">
                    <h2>How It Works</h2>
                    <div class="steps">
                        <div class="step">
                            <h3>Step 1: Gather Information</h3>
                            <p>Start by gathering details about your debts—amounts, interest rates, and due dates.</p>
                            <img src="tools_res/img/debtstep1.webp" alt="Step 1 Image">
                        </div>
                        <div class="step">
                            <h3>Step 2: Prioritize Debts</h3>
                            <p>Evaluate debts and prioritize repayments—high-interest debts should take precedence.</p>
                            <img src="tools_res/img/debtstep2.webp" alt="Step 2 Image">
                        </div>
                        <div class="step">
                            <h3>Step 3: Create a Repayment Plan</h3>
                            <p>Devise a structured repayment plan based on your financial situation and prioritization.
                            </p>
                            <img src="tools_res/img/debtstep3.webp" alt="Step 3 Image">
                        </div>
                    </div>
                </section>

                <section id="budget-planning-made-simple">
                    <h2 class="text-center pb-4">Debt Management Made Simple</h2>
                    <p class="text-gray">
                        At Zurit, we simplify debt management. Our tool provides:
                    </p>
                    <ul class="text-list">
                        <li>Clear overview of your debts</li>
                        <li>Customized repayment strategies</li>
                        <li>Real-time tracking of debt reduction</li>
                    </ul>
                    <a href="{{ url('login') }}" class="button">Access Debt Manager</a>
                </section>

            </div>
        </div>

        @include('layouts.footer')
        </main>

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/addshadow.js"></script>
    </body>

</html>
