@incldue('layouts.head')
<title>Debt Manager</title>
<link rel="stylesheet" href="{{ asset('tools_res/css/style.css') }}?v={{ time() }}">
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
                <a href="{{ Auth::check() ? url('user_debtcalc') : url('login') }}" class="button">Access Debt
                    Manager</a>
            </section>

        </div>
    </div>

    @include('layouts.footer')
    @include('layouts.foot')
</body>

</html>
