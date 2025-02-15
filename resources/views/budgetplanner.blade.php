@include('layouts.head')
<title>Budget Planner</title>
<link rel="stylesheet" href="{{ asset('tools_res/css/style.css') }}?v={{ time() }}">
</head>

<body>
    @include('layouts.navbar')

    <div class="container mainmargin">
        <div class="main">
            <section id="what-is-budget-planner">
                <div class="content">
                    <h2 class="text-center pb-4">What is a Budget Planner?</h2>
                    <p class="text-gray">
                        A Budget Planner is a tool that assists individuals and businesses in outlining their income
                        and
                        expenses, offering a structured plan for managing finances.
                    </p>
                </div>
                <div class="image">
                    <img src="tools_res/img/budget1.webp" alt="Budget Image">
                </div>
            </section>

            <section id="why-use-our-planner">
                <div class="content">
                    <h2 class="text-center pb-4">Why Use Our Budget Planner?</h2>
                    <p class="text-gray">
                        Our Budget Planner isn't just a tool; it's a personalized financial guide designed to:
                    </p>
                    <ul class="text-list">
                        <li>Offer customized financial strategies</li>
                        <li>Provide comprehensive analysis of your income and spending</li>
                        <li>Guide financial decisions towards your objectives</li>
                        <li>Help manage and track expenses efficiently</li>
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
                        <p>Get started by signing up for our budget planner. It's quick and easy!</p>
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
                <h2 class="text-center pb-4">Budget Planning Made Simple</h2>
                <p class="text-gray">
                    At Zurit, we believe in simplifying budgeting. Our tool is designed for easy navigation and
                    user-friendly interfaces.
                </p>
                <a href="{{ Auth::check() ? url('user_budgetplanner') : url('login') }}" class="button">Go to Budget
                    Planner</a>
            </section>

            <!-- Add other sections similarly -->

        </div>
    </div>

    @include('layouts.footer')

    @include('layouts.foot')
</body>

</html>
