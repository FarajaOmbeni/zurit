<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
        <title>Networth Calculator</title>
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
                        <h2 class="text-center pb-4">What is a Networth Calculator</h2>
                        <p class="text-gray">
                            A Net Worth Calculator is a financial tool that evaluates an individual's wealth by
                            subtracting
                            their liabilities (debts) from their assets. It offers insights into one's financial health.
                        </p>
                    </div>
                    <div class="image">
                        <img src="tools_res/img/networth1.webp" alt="Budget Image">
                    </div>
                </section>

                <section id="why-use-our-planner">
                    <div class="content">
                        <h2 class="text-center pb-4">Why Use Our Networth Calculator?</h2>
                        <p class="text-gray">
                            Our Net Worth Calculator isn't just a tool; it's a personalized financial guide designed to:
                        </p>
                        <ul class="text-list">
                            <li>Offer personalized financial insights</li>
                            <li>Provide comprehensive analysis of your assets and liabilities</li>
                            <li>Guide financial decisions towards your objectives</li>
                            <li>Help assess your overall financial health</li>
                        </ul>
                    </div>
                    <div class="image-right">
                        <img src="tools_res/img/Calculator.webp" alt="Budget 2 Image">
                    </div>
                </section>

                <section id="how-it-works">
                    <h2 class="text-center pb-4">How It Works</h2>
                    <div class="steps">
                        <div class="step">
                            <h3>Step 1: Sign Up</h3>
                            <p>Get started by signing up for our net worth calculator. It's quick and easy!</p>
                            <img src="tools_res/img/login1.webp" alt="Step 1 Image">
                        </div>
                        <div class="step">
                            <h3>Step 2: Set Your Goals</h3>
                            <p>Define your financial goals and priorities. Whether it's saving, investing, or debt
                                reduction, we've got you covered.</p>
                            <img src="tools_res/img/step2.webp" alt="Step 2 Image">
                        </div>
                        <div class="step">
                            <h3>Step 3: Track and Analyze</h3>
                            <p>Use our intuitive dashboard to track your expenses, analyze your spending patterns, and
                                get
                                insights.</p>
                            <img src="tools_res/img/step3.webp" alt="Step 3 Image">
                        </div>
                    </div>
                </section>
                <section id="budget-planning-made-simple">
                    <h2 class="text-center pb-4">Net Worth Calculating Made Simple</h2>
                    <p class="text-gray">
                        At Zurit, we believe in simplifying the process of calculating your net worth. Our tool is
                        designed
                        for easy navigation and user-friendly interfaces.
                    </p>
                    <a href="{{ url('login') }}" class="button">Go to Net Worth Calculator</a>
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
