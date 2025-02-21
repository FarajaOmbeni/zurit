<div class="modal fade" id="zuritQuestionnaireModal" tabindex="-1" aria-labelledby="zuritQuestionnaireModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zuritQuestionnaireModalLabel">ZURIT WEALTH MANAGEMENT QUESTIONNAIRE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    data-bs-target="#zuritQuestionnaireModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="questionnaireForm" method="post" action="{{ route('submit.questionnaire') }}">
                    @csrf
                    {{-- Bonus Question --}}
                    <div class="mb-3">
                        <div class="mb-3">
                            <p class="fw-bold">Name</p>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter your name"></input>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">Phone Number</p>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter your phone number"></input>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">Email</p>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter your email"></input>
                        </div>
                    </div>

                    {{-- Goal Setting Section --}}
                    <div class="mb-3">
                        <h3>1. Goal Setting</h3>
                        <div class="mb-3">
                            <p class="fw-bold">What is your most important short-term financial goal?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="short_term_goal"
                                    id="short_term_goal_gadget" value="Save for a gadget (phone, laptop, etc.)">
                                <label class="form-check-label" for="short_term_goal_gadget">
                                    Save for a gadget (phone, laptop, etc.)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="short_term_goal"
                                    id="short_term_goal_course" value="Pay for a course or certification">
                                <label class="form-check-label" for="short_term_goal_course">
                                    Pay for a course or certification
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="short_term_goal"
                                    id="short_term_goal_business" value="Start a small business">
                                <label class="form-check-label" for="short_term_goal_business">
                                    Start a small business
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="short_term_goal"
                                    id="short_term_goal_emergency_fund" value="Build an emergency fund">
                                <label class="form-check-label" for="short_term_goal_emergency_fund">
                                    Build an emergency fund
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="short_term_goal"
                                    id="short_term_goal_other" value="Other Short Term">
                                <label class="form-check-label" for="short_term_goal_other">
                                    Other (please specify)
                                </label>
                                <input type="text" class="form-control mt-2"
                                    id="short_term_goal_other_specify" name="short_term_goal_other_specify"
                                    placeholder="Please specify your short-term goal">
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">What is your main long-term financial goal?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="long_term_goal"
                                    id="long_term_goal_car_home" value="Save to buy a car or home">
                                <label class="form-check-label" for="long_term_goal_car_home">
                                    Save to buy a car or home
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="long_term_goal"
                                    id="long_term_goal_invest_business" value="Invest in a business">
                                <label class="form-check-label" for="long_term_goal_invest_business">
                                    Invest in a business
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="long_term_goal"
                                    id="long_term_goal_financial_independence" value="Achieve financial independence">
                                <label class="form-check-label" for="long_term_goal_financial_independence">
                                    Achieve financial independence
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="long_term_goal"
                                    id="long_term_goal_retirement" value="Save for retirement">
                                <label class="form-check-label" for="long_term_goal_retirement">
                                    Save for retirement
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="long_term_goal"
                                    id="long_term_goal_other" value="Other Long Term">
                                <label class="form-check-label" for="long_term_goal_other">
                                    Other (please specify)
                                </label>
                                <input type="text" class="form-control mt-2"
                                    id="long_term_goal_other_specify" name="long_term_goal_other_specify"
                                    placeholder="Please specify your long-term goal">
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">How do you keep yourself motivated to achieve your financial goals?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation_system"
                                    id="motivation_system_track_goals" value="I write down my goals and track progress">
                                <label class="form-check-label" for="motivation_system_track_goals">
                                    I write down my goals and track progress
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation_system"
                                    id="motivation_system_reward_milestones" value="I reward myself when I hit small milestones">
                                <label class="form-check-label" for="motivation_system_reward_milestones">
                                    I reward myself when I hit small milestones
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation_system"
                                    id="motivation_system_financial_influencers" value="I follow financial influencers for motivation">
                                <label class="form-check-label" for="motivation_system_financial_influencers">
                                    I follow financial influencers for motivation
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="motivation_system"
                                    id="motivation_system_no_system" value="I don't have a motivation system yet">
                                <label class="form-check-label" for="motivation_system_no_system">
                                    I don't have a motivation system yet
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Investment Planning Section --}}
                    <div class="mb-3">
                        <h3>2. Investment Planning</h3>
                        <div class="mb-3">
                            <p class="fw-bold">Have you started investing?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="started_investing"
                                    id="started_investing_yes_active" value="Yes, I actively invest">
                                <label class="form-check-label" for="started_investing_yes_active">
                                    Yes, I actively invest
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="started_investing"
                                    id="started_investing_plan_soon" value="No, but I plan to start soon">
                                <label class="form-check-label" for="started_investing_plan_soon">
                                    No, but I plan to start soon
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="started_investing"
                                    id="started_investing_not_interested" value="No, I’m not interested">
                                <label class="form-check-label" for="started_investing_not_interested">
                                    No, I’m not interested
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">Which investment option interests you the most?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="investment_option"
                                    id="investment_option_stocks" value="Stocks or shares">
                                <label class="form-check-label" for="investment_option_stocks">
                                    Stocks or shares
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="investment_option"
                                    id="investment_option_real_estate" value="real_eReal estatestate">
                                <label class="form-check-label" for="investment_option_real_estate">
                                    Real estate
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="investment_option"
                                    id="investment_option_business_ventures" value="Business ventures">
                                <label class="form-check-label" for="investment_option_business_ventures">
                                    Business ventures
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="investment_option"
                                    id="investment_option_crypto" value="Digital currencies (e.g., crypto)">
                                <label class="form-check-label" for="investment_option_crypto">
                                    Digital currencies (e.g., crypto)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="investment_option"
                                    id="investment_option_other" value="other_investment">
                                <label class="form-check-label" for="investment_option_other">
                                    Other (please specify)
                                </label>
                                <input type="text" class="form-control mt-2"
                                    id="investment_option_other_specify" name="investment_option_other_specify"
                                    placeholder="Please specify other investment option">
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">How comfortable are you with investment risks?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="investment_risk_comfort" id="investment_risk_comfort_low" value="Low – I prefer stable and guaranteed returns">
                                <label class="form-check-label" for="investment_risk_comfort_low">
                                    Low – I prefer stable and guaranteed returns
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="investment_risk_comfort" id="investment_risk_comfort_moderate"
                                    value="Moderate – I can take some risks for better returns">
                                <label class="form-check-label" for="investment_risk_comfort_moderate">
                                    Moderate – I can take some risks for better returns
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="investment_risk_comfort" id="investment_risk_comfort_high" value="High – I’m open to risky investments with high potential rewards">
                                <label class="form-check-label" for="investment_risk_comfort_high">
                                    High – I’m open to risky investments with high potential rewards
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">What’s your biggest challenge in starting to invest?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="investment_challenge"
                                    id="investment_challenge_lack_info" value="Lack of information">
                                <label class="form-check-label" for="investment_challenge_lack_info">
                                    Lack of information
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="investment_challenge"
                                    id="investment_challenge_lack_capital" value="Lack of capital">
                                <label class="form-check-label" for="investment_challenge_lack_capital">
                                    Lack of capital
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="investment_challenge"
                                    id="investment_challenge_fear_loss" value="Fear of losing money">
                                <label class="form-check-label" for="investment_challenge_fear_loss">
                                    Fear of losing money
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="investment_challenge"
                                    id="investment_challenge_not_thought" value="I haven’t thought about it seriously yet">
                                <label class="form-check-label" for="investment_challenge_not_thought">
                                    I haven’t thought about it seriously yet
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Debt Management Section --}}
                    <div class="mb-3">
                        <h3>3. Debt Management</h3>
                        <div class="mb-3">
                            <p class="fw-bold">Do you currently have any outstanding debt?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outstanding_debt"
                                    id="outstanding_debt_loan_credit_card" value="Yes, I have a loan/credit card balance">
                                <label class="form-check-label" for="outstanding_debt_loan_credit_card">
                                    Yes, I have a loan/credit card balance
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outstanding_debt"
                                    id="outstanding_debt_owe_family_friends" value="Yes, I owe money to family or friends">
                                <label class="form-check-label" for="outstanding_debt_owe_family_friends">
                                    Yes, I owe money to family or friends
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="outstanding_debt"
                                    id="outstanding_debt_no_debt" value="No, I don’t have any debt">
                                <label class="form-check-label" for="outstanding_debt_no_debt">
                                    No, I don’t have any debt
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">If you had to take a loan, what would be your main reason?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="loan_reason"
                                    id="loan_reason_business_asset" value="To invest in a business or asset">
                                <label class="form-check-label" for="loan_reason_business_asset">
                                    To invest in a business or asset
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="loan_reason"
                                    id="loan_reason_education_skill" value="To fund education or a skill upgrade">
                                <label class="form-check-label" for="loan_reason_education_skill">
                                    To fund education or a skill upgrade
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="loan_reason"
                                    id="loan_reason_personal_items" value="To buy personal items (phone, car, etc.)">
                                <label class="form-check-label" for="loan_reason_personal_items">
                                    To buy personal items (phone, car, etc.)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="loan_reason"
                                    id="loan_reason_no_loans" value="I don’t believe in taking loans">
                                <label class="form-check-label" for="loan_reason_no_loans">
                                    I don’t believe in taking loans
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">What is your approach to managing debt?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="debt_management_approach" id="debt_management_approach_pay_off_soon"
                                    value="Pay off as soon as possible">
                                <label class="form-check-label" for="debt_management_approach_pay_off_soon">
                                    Pay off as soon as possible
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="debt_management_approach"
                                    id="debt_management_approach_min_installments_invest"
                                    value="Pay minimum installments and invest the rest">
                                <label class="form-check-label"
                                    for="debt_management_approach_min_installments_invest">
                                    Pay minimum installments and invest the rest
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="debt_management_approach" id="debt_management_approach_avoid_loans"
                                    value="Avoid taking any loans if possible">
                                <label class="form-check-label" for="debt_management_approach_avoid_loans">
                                    Avoid taking any loans if possible
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="debt_management_approach" id="debt_management_approach_not_thought"
                                    value="I haven’t thought much about it">
                                <label class="form-check-label" for="debt_management_approach_not_thought">
                                    I haven’t thought much about it
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Budget Planning Section --}}
                    <div class="mb-3">
                        <h3>4. Budget Planning</h3>
                        <div class="mb-3">
                            <p class="fw-bold">How do you track your income and expenses?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="income_expense_tracking" id="income_expense_tracking_app" value="I use a budgeting app">
                                <label class="form-check-label" for="income_expense_tracking_app">
                                    I use a budgeting app
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="income_expense_tracking" id="income_expense_tracking_notebook"
                                    value="I record everything in a notebook or spreadsheet">
                                <label class="form-check-label" for="income_expense_tracking_notebook">
                                    I record everything in a notebook or spreadsheet
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="income_expense_tracking" id="income_expense_tracking_no_tracking"
                                    value="I don’t track my expenses">
                                <label class="form-check-label" for="income_expense_tracking_no_tracking">
                                    I don’t track my expenses
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">How do you decide how much money to save each month?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="monthly_savings_decision" id="monthly_savings_decision_save_leftover"
                                    value="I save whatever is left after spending">
                                <label class="form-check-label" for="monthly_savings_decision_save_leftover">
                                    I save whatever is left after spending
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="monthly_savings_decision" id="monthly_savings_decision_fixed_percentage"
                                    value="I set aside a fixed percentage of my income">
                                <label class="form-check-label" for="monthly_savings_decision_fixed_percentage">
                                    I set aside a fixed percentage of my income
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="monthly_savings_decision" id="monthly_savings_decision_save_extra"
                                    value="I save only when I have extra money">
                                <label class="form-check-label" for="monthly_savings_decision_save_extra">
                                    I save only when I have extra money
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="monthly_savings_decision" id="monthly_savings_decision_no_saving_habit"
                                    value="I don’t have a saving habit yet">
                                <label class="form-check-label" for="monthly_savings_decision_no_saving_habit">
                                    I don’t have a saving habit yet
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="fw-bold">What is your biggest challenge in budgeting?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="budgeting_challenge"
                                    id="budgeting_challenge_impulsive_spending" value="I spend impulsively">
                                <label class="form-check-label" for="budgeting_challenge_impulsive_spending">
                                    I spend impulsively
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="budgeting_challenge"
                                    id="budgeting_challenge_low_income" value="My income is too low to budget properly">
                                <label class="form-check-label" for="budgeting_challenge_low_income">
                                    My income is too low to budget properly
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="budgeting_challenge"
                                    id="budgeting_challenge_no_financial_plan" value="I don’t have a clear financial plan">
                                <label class="form-check-label" for="budgeting_challenge_no_financial_plan">
                                    I don’t have a clear financial plan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="budgeting_challenge"
                                    id="budgeting_challenge_forget_tracking" value="I often forget to track my expenses">
                                <label class="form-check-label" for="budgeting_challenge_forget_tracking">
                                    I often forget to track my expenses
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Final Thought Section --}}
                    <div class="mb-3">
                        <h3>Final Thought</h3>
                        <div class="mb-3">
                            <p class="fw-bold">Would you like to receive personalized financial tips based on your
                                responses?</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="personalized_tips"
                                    id="personalized_tips_yes" value="Yes, I’d love that">
                                <label class="form-check-label" for="personalized_tips_yes">
                                    Yes, I’d love that
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="personalized_tips"
                                    id="personalized_tips_no" value="No, I prefer researching on my own">
                                <label class="form-check-label" for="personalized_tips_no">
                                    No, I prefer researching on my own
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Bonus Question --}}
                    <div class="mb-3">
                        <h3>💡 Bonus Question!</h3>
                        <div class="mb-3">
                            <p class="fw-bold">If you had Ksh 100,000 today, what would you do with it?</p>
                            <textarea class="form-control" id="bonus_question_answer" name="bonus_question_answer" rows="3"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
