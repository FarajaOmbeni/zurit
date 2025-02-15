@include('layouts.head')
<title>Goal Setting</title>
<link rel="stylesheet" href="{{ asset('tools_res/css/style.css') }}?v={{ time() }}">
</head>

<body>
    @include('layouts.navbar')

    <div class="container mainmargin">
        <div class="main">
            <section id="what-is-budget-planner">
                <div class="content">
                    <h2 class="text-center pb-4">What is Goal Setting?</h2>
                    <p class="text-gray">
                        Goal setting is thinking about your ideal future and for motivating yourself to turn your vision
                        of this future into reality. The process of setting goals helps you choose where you want to go
                        in life. By knowing precisely what you want to achieve, you know where you have to concentrate
                        your efforts. You'll also quickly spot the distractions that can, so easily, lead you astray.
                    </p>
                </div>
                <div class="image">
                    <img src="tools_res/img/goal.png" alt="Budget Image">
                </div>
            </section>

            <section id="why-use-our-planner">
                <div class="content">
                    <h2 class="text-center pb-4">Why Use Our Goal Setting Tool?</h2>
                    <p class="text-gray">
                        Our Goal Setting tool isn't just a tool; it's a personalized financial guide designed to:
                    </p>
                    <ul class="text-list">
                        <li>Help you manage your goals</li>
                        <li>Help you contribute to your goals</li>
                        <li>Have a whole view of all your goals</li>
                        <li>See the progress of each goal</li>
                    </ul>
                </div>
                <div class="image-right">
                    <img src="tools_res/img/budget2.webp" alt="Budget 2 Image">
                </div>
            </section>

            <section id="how-it-works">
                <h2>How It Works</h2>
                <div class="steps">
                    <div class="step">
                        <h3>Step 1: Sign Up</h3>
                        <p>Get started by signing up for goal setting. It's quick and easy!</p>
                        <img src="tools_res/img/login1.webp" alt="Step 1 Image">
                    </div>
                    <div class="step">
                        <h3>Step 2: Set Your Goals</h3>
                        <p>Define your financial goals and priorities. Whether it's buying a car, investing, education,
                            or entertainment, we've got you covered.</p>
                        <img src="tools_res/img/step2.webp" alt="Step 2 Image">
                    </div>
                    <div class="step">
                        <h3>Step 3: Track and Analyze</h3>
                        <p>Use our intuitive dashboard to track your goals and
                            get
                            insights.</p>
                        <img src="tools_res/img/step3.webp" alt="Step 3 Image">
                    </div>
                </div>
            </section>

            <section id="budget-planning-made-simple">
                <h2 class="text-center pb-4">Goal Setting Made Simple</h2>
                <p class="text-gray">
                    At Zurit, we believe in goal setting. Our tool is designed for easy navigation and
                    user-friendly interfaces.
                </p>
                <a href="{{ Auth::check() ? url('user_goalsetting') : url('login') }}" class="button">Go to Goal
                    Setting</a>
            </section>

            <!-- Add other sections similarly -->

        </div>
    </div>

    @include('layouts.footer')

    @include('layouts.foot')
</body>

</html>
