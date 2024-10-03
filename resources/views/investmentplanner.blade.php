<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Investment Planner</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
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
    @include('layouts.navbar')
    <div class="container mainmargin">
        <div class="main">
            <section id="what-is-budget-planner">
                <div class="content">
                    <h2 class="text-center pb-4">What is an Investment Planner?</h2>
                    <p class="text-gray">
                        An Investment Planner is a tool designed to help individuals and businesses make informed
                        investment decisions by:
                    </p>
                    <ul class="text-list">
                        <li>Providing diversified investment options</li>
                        <li>Offering comprehensive market analysis</li>
                        <li>Assisting in long-term wealth creation</li>
                    </ul>
                </div>
                <div class="image">
                    <img src="tools_res/img/invest.webp" alt="Budget Image">
                </div>
            </section>

            <section id="why-use-our-planner">
                <div class="content">
                    <h2 class="text-center pb-4">Why Use Our Investment Planner?</h2>
                    <p class="text-gray">
                        Our Investment Planner isn't just a tool; it's a comprehensive solution designed to:
                    </p>
                    <ul class="text-list">
                        <li>Offer diversified investment opportunities tailored to your needs</li>
                        <li>Provide in-depth market analysis and trends</li>
                        <li>Help in strategizing for long-term financial growth</li>
                        <li>Help manage investments efficiently</li>
                    </ul>
                </div>
                <div class="image-right">
                    <img src="tools_res/img/Questions.webp" alt="Budget 2 Image">
                </div>
            </section>

            <section id="how-it-works">
                <h2>How It Works</h2>
                <div class="steps">
                    <div class="step">
                        <h3>Step 1: Set Your Investment Goals</h3>
                        <p>Define your investment goals and risk tolerance to tailor your strategy.</p>
                        <img src="tools_res/img/invest1.webp" alt="Step 1 Image">
                    </div>
                    <div class="step">
                        <h3>Step 2: Diversify Your Portfolio</h3>
                        <p>Explore various investment options to build a diversified portfolio.</p>
                        <img src="tools_res/img/invest2.webp" alt="Step 2 Image">
                    </div>
                    <div class="step">
                        <h3>Step 3: Monitor and Adjust</h3>
                        <p>Regularly track and review your investments, adjusting for market changes.</p>
                        <img src="tools_res/img/invest3.webp" alt="Step 3 Image">
                    </div>
                </div>
            </section>

            <section id="budget-planning-made-simple">
                <h2 class="text-center pb-4">Investment Planning Made Simple</h2>
                <p class="text-gray">
                    At Zurit, we aim to simplify investment planning. Our tool provides:
                </p>
                <ul class="text-list">
                    <li>Personalized investment strategies</li>
                    <li>Streamlined portfolio management</li>
                    <li>Clear insights into market trends</li>
                    <li>User-friendly interfaces for a seamless experience</li>
                </ul>
                <a href="{{ Auth::check() ? url('user_investmentplanner') : url('login') }}" class="button">Go to
                    Investment Planner</a>
            </section>

            <!-- Add other sections similarly -->

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
