<!DOCTYPE html>
<html lang="en">

<head>
    <title>Investment Planner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="planners_res/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('planners_res/style.css') }}?v={{ time() }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
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
@php
    use Carbon\Carbon; // Import the Carbon class with the full namespace
@endphp

<body>
    @extends('layouts.userbar')
    @include('layouts.app')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div id="content" class="p-md-5 pt-5">
                    <div class="budget_content">
                        <!-- Success and Error Messages -->
                        @if (session('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success')['message'] }}
                            </div>
                            <script>
                                setTimeout(function() {
                                    $('#success-alert').fadeOut('fast');
                                }, {{ session('success')['duration'] }});
                            </script>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" id="error-alert">
                                {{ session('error')['message'] }}
                            </div>
                            <script>
                                setTimeout(function() {
                                    $('#error-alert').fadeOut('fast');
                                }, {{ session('error')['duration'] }});
                            </script>
                        @endif

                        <!-- Monthly Modal -->
                        <div class="modal-dialog">
                            <h1>Calculator</h1>
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="" method="">
                                        @csrf
                                        <div class="form-group">
                                            <label for="investment_type">Investment Type</label>
                                            <select name="investment_type" id="investment_type" class="form-control">
                                                <option value="Treasury Bills">Treasury Bills</option>
                                                <option value="Government Bonds">Government Bonds</option>
                                                <option value="Infrastructure Bonds">Infrastructure Bonds</option>
                                                <option value="Sacco Investments">Sacco Investments</option>
                                                <option value="Money Market Fund">Money Market Fund</option>
                                            </select>
                                        </div>
                                        <div class="form-group hidden" id="initial_investment">
                                            <label for="initial_investment">Initial Investment</label>
                                            <input type="number" name="initial_investment"
                                                placeholder="Enter initial investment" class="form-control">
                                        </div>
                                        <div class="form-group hidden" id="total_investment">
                                            <label for="total_investment">Total Investment</label>
                                            <input type="number" name="total_investment"
                                                placeholder="Enter the total investment" class="form-control">
                                        </div>
                                        <div class="form-group hidden" id="monthly_contribution">
                                            <label for="monthly_contribution">Monthly Contribution</label>
                                            <input type="number" name="monthly_contribution"
                                                placeholder="Enter the monthly contribution" class="form-control">
                                        </div>
                                        <div class="form-group hidden" id="real_estate_price">
                                            <label for="real_estate_price">Monthly Price of Real Estate</label>
                                            <input type="number" name="real_estate_price"
                                                placeholder="Enter the monthly contribution" class="form-control">
                                        </div>
                                        <div class="form-group hidden" id="monthly_income">
                                            <label for="monthly_income">Monthly Income</label>
                                            <input type="number" name="monthly_income"
                                                placeholder="Enter the monthly income" class="form-control">
                                        </div>
                                        <div class="form-group hidden" id="number_of_years">
                                            <label for="number_of_years">Number of Years</label>
                                            <input type="number" name="number_of_years"
                                                placeholder="Enter number of years" class="form-control">
                                        </div>
                                        <div class="form-group hidden" id="number_of_months">
                                            <label for="number_of_months">Number of Months</label>
                                            <input type="number" name="number_of_months"
                                                placeholder="Enter number of months" class="form-control">
                                        </div>
                                        <div class="form-group hidden" id="number_of_days">
                                            <label for="number_of_days">Number of Days</label>
                                            <select type="number" name="number_of_days"
                                                placeholder="Enter number of days" class="form-control">
                                                <option value="91">91 Days</option>
                                                <option value="182">182 Days</option>
                                                <option value="364">364 Days</option>
                                            </select>
                                        </div>
                                        <div class="form-group hidden" id="mmf_name">
                                            <label for="mmf_name">Name of Money Market</label>
                                            <select type="text" name="mmf_name" placeholder="Enter name of MMF"
                                                class="form-control" id="funds">
                                                <!-- The options are being filled with JavaScript -->
                                            </select>
                                        </div>
                                        <div class="form-group" id="rate_of_return">
                                            <label for="projectedRateOfReturn">Projected Rate of Return</label>
                                            <input type="number" placeholder="Enter projected rate of return"
                                                name="rate_of_return" id="rate_of_return" step="0.01"
                                                class="form-control">
                                        </div>
                                        <div class="form-group" id="rate_of_return">
                                            <label for="total_revenue">Total Revenue</label>
                                            <input type="number" readonly
                                                placeholder="Enter projected rate of return" name="total_revenue"
                                                id="total_revenue" step="0.01" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Calculate</button>
                                        </div>
                                    </form>
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
        </script>
        {{-- END OF PWA --}}

        <script>
            // Get form elements
            const form = document.querySelector('form');
            const investmentTypeSelect = document.getElementById('investment_type');
            const totalRevenueInput = document.getElementById('total_revenue');

            // Get all input container divs
            const initialInvestmentDiv = document.getElementById('initial_investment');
            const totalInvestmentDiv = document.getElementById('total_investment');
            const monthlyContributionDiv = document.getElementById('monthly_contribution');
            const monthlyIncomeDiv = document.getElementById('monthly_income');
            const numberOfYearsDiv = document.getElementById('number_of_years');
            const numberOfMonthsDiv = document.getElementById('number_of_months');
            const numberOfDaysDiv = document.getElementById('number_of_days');
            const mmfNameDiv = document.getElementById('mmf_name');

            // Show/hide relevant fields based on investment type
            investmentTypeSelect.addEventListener('change', function() {
                // Hide all fields first
                const allDivs = [
                    initialInvestmentDiv, totalInvestmentDiv, monthlyContributionDiv,
                    monthlyIncomeDiv, numberOfYearsDiv, numberOfMonthsDiv,
                    numberOfDaysDiv, mmfNameDiv
                ];
                allDivs.forEach(div => div.classList.add('hidden'));

                // Show relevant fields based on investment type
                switch (this.value) {
                    case 'Treasury Bills':
                        initialInvestmentDiv.classList.remove('hidden');
                        numberOfDaysDiv.classList.remove('hidden');
                        break;
                    case 'Government Bonds':
                    case 'Infrastructure Bonds':
                        initialInvestmentDiv.classList.remove('hidden');
                        numberOfYearsDiv.classList.remove('hidden');
                        break;
                    case 'Sacco Investments':
                        monthlyContributionDiv.classList.remove('hidden');
                        numberOfMonthsDiv.classList.remove('hidden');
                        break;
                    case 'Money Market Fund':
                        initialInvestmentDiv.classList.remove('hidden');
                        mmfNameDiv.classList.remove('hidden');
                        numberOfMonthsDiv.classList.remove('hidden');
                        break;
                }
            });

            // Calculate total revenue when form is submitted
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const investmentType = investmentTypeSelect.value;
                const rateOfReturn = parseFloat(document.querySelector('[name="rate_of_return"]').value) / 100;
                let totalRevenue = 0;

                switch (investmentType) {
                    case 'Treasury Bills':
                        const tbInitialInvestment = parseFloat(document.querySelector('[name="initial_investment"]')
                            .value);
                        const numberOfDays = parseInt(document.querySelector('[name="number_of_days"]').value);
                        // T-Bill calculation (simple interest)
                        totalRevenue = tbInitialInvestment * (1 + (rateOfReturn * numberOfDays / 365));
                        break;

                    case 'Government Bonds':
                    case 'Infrastructure Bonds':
                        const bondInitialInvestment = parseFloat(document.querySelector('[name="initial_investment"]')
                            .value);
                        const numberOfYears = parseInt(document.querySelector('[name="number_of_years"]').value);
                        // Bond calculation (compound interest annually)
                        totalRevenue = bondInitialInvestment * Math.pow((1 + rateOfReturn), numberOfYears);
                        break;

                    case 'Sacco Investments':
                        const monthlyContribution = parseFloat(document.querySelector('[name="monthly_contribution"]')
                            .value);
                        const numberOfMonths = parseInt(document.querySelector('[name="number_of_months"]').value);
                        // Sacco calculation (monthly contributions with compound interest)
                        totalRevenue = monthlyContribution * ((Math.pow(1 + (rateOfReturn / 12), numberOfMonths) - 1) /
                            (rateOfReturn / 12));
                        break;

                    case 'Money Market Fund':
                        const mmfInitialInvestment = parseFloat(document.querySelector('[name="initial_investment"]')
                            .value);
                        const mmfMonths = parseInt(document.querySelector('[name="number_of_months"]').value);
                        // Money Market Fund calculation (compound interest monthly)
                        totalRevenue = mmfInitialInvestment * Math.pow((1 + rateOfReturn / 12), mmfMonths);
                        break;
                }

                // Update total revenue field with formatted number
                totalRevenueInput.value = totalRevenue.toFixed(2);
            });

            // Initialize the form by triggering the change event
            investmentTypeSelect.dispatchEvent(new Event('change'));
            console.log(totalRevenue);
            
            // Your data array
            const moneyMarketFundData = [{
                    rank: 1,
                    fundManager: "Cytonn",
                    effectiveAnnualRate: "18.14%"
                },
                {
                    rank: 2,
                    fundManager: "Lofty-Corban",
                    effectiveAnnualRate: "18.04%"
                },
                {
                    rank: 3,
                    fundManager: "Etica",
                    effectiveAnnualRate: "17.35%"
                },
                {
                    rank: 4,
                    fundManager: "Arvocap",
                    effectiveAnnualRate: "17.13%"
                },
                {
                    rank: 5,
                    fundManager: "Kuza",
                    effectiveAnnualRate: "17.00%"
                },
                {
                    rank: 6,
                    fundManager: "GenAfrica",
                    effectiveAnnualRate: "16.47%"
                },
                {
                    rank: 7,
                    fundManager: "Nabo Africa",
                    effectiveAnnualRate: "16.01%"
                },
                {
                    rank: 8,
                    fundManager: "Enwealth",
                    effectiveAnnualRate: "15.98%"
                },
                {
                    rank: 9,
                    fundManager: "Jubilee",
                    effectiveAnnualRate: "15.71%"
                },
                {
                    rank: 10,
                    fundManager: "Madison",
                    effectiveAnnualRate: "15.62%"
                },
                {
                    rank: 11,
                    fundManager: "Ndovu",
                    effectiveAnnualRate: "15.51%"
                },
                {
                    rank: 12,
                    fundManager: "Co-op",
                    effectiveAnnualRate: "15.36%"
                },
                {
                    rank: 13,
                    fundManager: "KCB",
                    effectiveAnnualRate: "15.34%"
                },
                {
                    rank: 14,
                    fundManager: "Mali",
                    effectiveAnnualRate: "15.24%"
                },
                {
                    rank: 15,
                    fundManager: "Sanlam",
                    effectiveAnnualRate: "15.11%"
                },
                {
                    rank: 16,
                    fundManager: "Absa Shilling",
                    effectiveAnnualRate: "15.03%"
                },
                {
                    rank: 17,
                    fundManager: "Apollo",
                    effectiveAnnualRate: "15.00%"
                },
                {
                    rank: 18,
                    fundManager: "Orient Kasha",
                    effectiveAnnualRate: "14.80%"
                },
                {
                    rank: 19,
                    fundManager: "AA Kenya Shillings Fund",
                    effectiveAnnualRate: "14.57%"
                },
                {
                    rank: 20,
                    fundManager: "Stanbic",
                    effectiveAnnualRate: "14.48%"
                },
                {
                    rank: 21,
                    fundManager: "Genghis",
                    effectiveAnnualRate: "14.40%"
                },
                {
                    rank: 22,
                    fundManager: "Dry Associates",
                    effectiveAnnualRate: "14.05%"
                },
                {
                    rank: 23,
                    fundManager: "Old Mutual",
                    effectiveAnnualRate: "14.02%"
                },
                {
                    rank: 24,
                    fundManager: "ICEA Lion",
                    effectiveAnnualRate: "13.76%"
                },
                {
                    rank: 25,
                    fundManager: "CIC",
                    effectiveAnnualRate: "13.70%"
                },
                {
                    rank: 26,
                    fundManager: "Equity",
                    effectiveAnnualRate: "13.25%"
                },
                {
                    rank: 27,
                    fundManager: "British-American",
                    effectiveAnnualRate: "13.12%"
                },
                {
                    rank: 28,
                    fundManager: "Mayfair",
                    effectiveAnnualRate: "11.92%"
                }
            ];

            // Get reference to the select element
            const selectElement = document.getElementById('funds');
            const projectedRateOfReturnInput = document.getElementById('projectedRateOfReturn');

            // Populate the select options
            moneyMarketFundData.forEach(fund => {
                // Create a new option element
                const option = document.createElement('option');
                option.value = fund.fundManager; // Set the value attribute
                option.text = fund.fundManager; // Set the displayed text

                // Append the option to the select element
                selectElement.appendChild(option);
            });

            // Add event listener to update the input based on selected fund
            selectElement.addEventListener('change', function() {
                const selectedFund = this.value;

                // Find the selected fund object
                const fund = moneyMarketFundData.find(f => f.fundManager === selectedFund);

                if (fund) {
                    // Remove the '%' from the rate and convert to a number
                    const rate = parseFloat(fund.effectiveAnnualRate.replace('%', ''));
                    // Set the value of the input field
                    projectedRateOfReturnInput.value = rate;
                }
            });

            const InvestmentManager = {
                // Elements
                elements: {
                    investmentType: document.getElementById('investment_type'),
                    numberOfDays: document.getElementById('number_of_days'),
                    numberOfYears: document.getElementById('number_of_years'),
                    numberOfMonths: document.getElementById('number_of_months'),
                    initialInvestment: document.getElementById('initial_investment'),
                    totalInvestment: document.getElementById('total_investment'),
                    mmfName: document.getElementById('mmf_name'),
                    detailsOfInvestment: document.getElementById('details_of_investment'),
                    monthlyContribution: document.getElementById('monthly_contribution'),
                    monthlyIncome: document.getElementById('monthly_income'),
                    rateOfReturn: document.getElementById('rate_of_return'),
                    realEstatePrice: document.getElementById('real_estate_price'),
                },

                // Investment types
                types: {
                    BILLS: "Treasury Bills",
                    GOV_BONDS: "Government Bonds",
                    INFRA_BONDS: "Infrastructure Bonds",
                    MMF: "Money Market Fund",
                    SACCO: "Sacco Investments",
                    RE: "Real Estate",
                },

                // Current state
                currentSelection: null,

                // Initialize
                init() {
                    this.currentSelection = this.elements.investmentType.value;
                    this.elements.investmentType.addEventListener('change', () => {
                        this.currentSelection = this.elements.investmentType.value;
                        this.updateFields();
                    });

                    // Initial update
                    this.updateFields();
                },

                // Update fields based on selection
                updateFields() {
                    // Reset all fields first
                    this.hideAllFields();

                    switch (this.currentSelection) {
                        case this.types.BILLS:
                            this.showField('rateOfReturn');
                            this.showField('numberOfDays');
                            this.showField('totalInvestment');
                            break;

                        case this.types.GOV_BONDS:
                            this.showField('rateOfReturn');
                            this.showField('numberOfYears');
                            this.showField('totalInvestment');
                            this.showField('detailsOfInvestment');
                            break;

                        case this.types.INFRA_BONDS:
                            this.showField('rateOfReturn');
                            this.showField('numberOfYears');
                            this.showField('totalInvestment');
                            this.showField('detailsOfInvestment');
                            break;

                        case this.types.MMF:
                            this.showField('rateOfReturn');
                            this.showField('numberOfMonths');
                            this.showField('initialInvestment');
                            this.showField('mmfName');
                            break;

                        case this.types.SACCO:
                            this.showField('rateOfReturn');
                            this.showField('numberOfMonths');
                            this.showField('monthlyContribution');
                            break;

                        case this.types.RE:
                            this.showField('realEstatePrice');
                            this.showField('monthlyIncome');
                            break;
                    }
                },

                // Helper method to hide all fields
                hideAllFields() {
                    Object.keys(this.elements).forEach(key => {
                        if (key !== 'investmentType') { // Don't hide the investment type selector
                            const element = this.elements[key];
                            if (element) { // Check if element exists
                                element.style.display = 'none';
                                element.disabled = true;
                            }
                        }
                    });
                },

                // Helper method to show specific field
                showField(fieldName) {
                    const element = this.elements[fieldName];
                    if (element) { // Check if element exists
                        element.style.display = 'block';
                        element.disabled = false;
                    }
                },

                // Get current selection
                getCurrentSelection() {
                    return {
                        type: this.currentSelection,
                        value: this.elements.investmentType.options[this.elements.investmentType.selectedIndex].textContent
                    };
                }
            };

            // Initialize the manager
            InvestmentManager.init();
        </script>
</body>

</html>
