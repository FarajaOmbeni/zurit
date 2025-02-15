@include('layouts.head')
<title>Trainings_Zurit</title>
<link rel="stylesheet" href="{{ asset('training_res/css/style.css') }}?v={{ time() }}">

</head>

<body>
    @include('layouts.navbar')


    <!--Training Section-->
    <section class="training_section">
        <div class="training_text">
            <h1>Our <br><span>Training Categories</span></h1>
        </div>

        <div class="category_btn_container">
            <button id="individual" class="category_btn"> Individual</button>
            <button id="quarterly" class="category_btn"> Quarterly</button>
            <button id="corporate" class="category_btn"> Corporate</button>
            <button id= "wealth_wave" class="category_btn"> Wealth Wave</button>
        </div>

        <div class="category_cards_container">
            <div class="category_card individual">
                <img src="{{ asset('training_res/img/prosperity2.webp') }}" alt="">
                <div class="category_card_desc">
                    <p class="card_title">PROSPERITY <span>FUNDAMENTALS</span></p>
                    <p class="card_desc">Your guide to financial Prosperity</p>
                    <button class="brochure_btn" type="button" data-toggle="modal"
                        data-target="#modal_prosperity">Learn more</button>
                </div>

            </div>

            <div class="category_card quarterly">
                <img src="{{ asset('training_res/img/fundamentals.webp') }}" alt="">
                <div class="category_card_desc">
                    <p class="card_title">FUNDAMENTALS OF<span>INVESTMENTS</span></p>
                    <p class="card_desc">Mastering Investment Strategies for Success. </p>
                    <button class="brochure_btn" type="button" data-toggle="modal"
                        data-target="#modal_fundamentals">Learn more</button>
                </div>

            </div>

            <div class="category_card quarterly">
                <img src="{{ asset('training_res/img/retirement.webp') }}" alt="">
                <div class="category_card_desc">
                    <p class="card_title">RETIREMENT<span> <br>PLANNING</span></p>
                    <p class="card_desc">Navigating Retirement with Confidence </p>
                    <button class="brochure_btn" type="button" data-toggle="modal"
                        data-target="#modal_retirement1">Learn more</button>
                </div>

            </div>

            <div class="category_card corporate">
                <img src="{{ asset('training_res/img/employee_wellness.webp') }}" alt="">
                <div class="category_card_desc">
                    <p class="card_title">EMPLOYEE <span>WELLNESS</span></p>
                    <p class="card_desc">Building Healthier, Happier Workplaces. </p>
                    <button class="brochure_btn" type="button" data-toggle="modal" data-target="#modal_wellness">Learn
                        more</button>
                </div>

            </div>

            <div class="category_card corporate">
                <img src="{{ asset('training_res/img/retirement_pic.webp') }}" alt="">
                <div class="category_card_desc">
                    <p class="card_title">RETIREMENT<span><br>PLANNING</span></p>
                    <p class="card_desc">Securing Employee Future </p>
                    <button class="brochure_btn" type="button" data-toggle="modal"
                        data-target="#modal_retirement2">Learn more</button>
                </div>

            </div>

            <div class="category_card wealth_wave">
                <img src="{{ asset('training_res/img/wealth_wave.webp') }}" alt="">

                <div class="category_card_desc">
                    <p class="card_title">WEALTH WAVE <span>TALKS</span></p>
                    <p class="card_desc" style="margin-top:-20px;">Unlocking Your Wealth Potential,Securing Your
                        Legacy.
                    </p>
                    <button class="brochure_btn" type="button" data-toggle="modal"
                        data-target="#modal_wealthWave">Learn more</button>
                </div>

            </div>

            <div class="category_card wealth_wave">
                <img src="{{ asset('training_res/img/asset_class.webp') }}" alt="">

                <div class="category_card_desc">
                    <p class="card_title">ASSET CLASS <span>TRAINING</span></p>
                    <p class="card_desc" style="margin-top:-20px;">Empowering Financial Literacy, Diversifying
                        Portfolios.</p>
                    <button class="brochure_btn" type="button" data-toggle="modal"
                        data-target="#modal_assetClass">Learn more</button>
                </div>

            </div>

            <div class="category_card wealth_wave">
                <img src="{{ asset('training_res/img/podcast.webp') }}" alt="">

                <div class="category_card_desc">
                    <p class="card_title">PODCAST</p>
                    <p class="card_desc">Navigating Finance's Dynamic World</p>
                    <button class="brochure_btn" type="button" data-toggle="modal" data-target="#modal_podcast">Learn
                        more</button>
                </div>

            </div>

        </div>

    </section>


    <!-- prosperity Modal -->
    <div class="modal fade" id="modal_prosperity" tabindex="-1" role="dialog" aria-labelledby="modal_prosperity"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="position: relative;">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_prosperity">Prosperity Fundamentals</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This masterclass is a <span class="gold_text">5-week</span> program
                        tailored to individuals, covering the
                        fundamentals of personal finance and
                        investments.<br>
                    <p>

                        <b>We impart our clients with practical knowledge on:</b>
                    <ol>
                        <li>Wealth building principles.</li>
                        <li>Best practices for building wealth.</li>
                        <li>How and where to invest</li>
                        <li>How to systemize your investment processes.</li>
                    </ol>

                    <p><b>Who should attend?</b></p>
                    <p>Individuals who are looking to build a solid financial foundation and grow their wealth.</p>
                    <span style="font-size:20px;"><b>Price:</b> Kshs 15,000<br></span>
                    <span style="font-size:20px;"><b>Duration:</b> 6 weeks<br></span>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary btn-enroll" data-toggle="modal"
                        data-target="#modal_enroll">Enroll</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Fundamentals Modal -->
    <div class="modal fade" id="modal_fundamentals" tabindex="-1" role="dialog"
        aria-labelledby="modal_fundamentals" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_fundamentals">Fundamentals Of Investments</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This is a <span class="gold_text">3-day</span>intense training for
                        pension trustees focused on grounding
                        them on the fundamentals of investments<br>
                    <p>

                        <b>What do you stand to gain?</b>
                    <ol>
                        <li>Understand the operations of the Various asset classes</li>
                        <li>Know how to create winning portfolios for schemes and the individuals</li>
                        <li>Get a free consultation for the trustees </li>
                    </ol>

                    <p><b>Who should attend?</b></p>
                    <p>Pension Trustees, Human Resources professionals, Sacco Board</p>
                    <span style="font-size:20px;"><b>Price:</b> Kshs 79,000<br></span>
                    <span style="font-size:20px;"><b>Duration:</b> 3-5 days<br></span>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary btn-enroll" data-toggle="modal"
                        data-target="#modal_enroll">Enroll</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Retirement1 Modal -->
    <div class="modal fade" id="modal_retirement1" tabindex="-1" role="dialog"
        aria-labelledby="modal_retirement1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_retirement1">Retirement Planning</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Immerse yourself in this comprehensive training designed for pension trustees. The course
                        provides a deep dive into retirement planning strategies,
                        helping trustees understand the complexities of retirement income management and long-term
                        investment planning.<br>
                    <p>

                        <b>Some topics discussed include</b>
                    <ol>
                        <li>Mental preparedness of life in retirement</li>
                        <li>Portfolio Constructions</li>
                        <li>Investment options and review of various asset class</li>
                    </ol>

                    <p><b>Who should attend?</b></p>
                    <p>Staff of Corporate institutions, owner management</p>
                    <span style="font-size:20px;"><b>Price:</b> Kshs 79,000<br></span>
                    <span style="font-size:20px;"><b>Duration:</b> 3-5 days<br></span>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary btn-enroll" data-toggle="modal"
                        data-target="#modal_enroll">Enroll</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Wellness Modal -->
    <div class="modal fade" id="modal_wellness" tabindex="-1" role="dialog" aria-labelledby="modal_wellness"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_wellness">Employee Wellness</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Dive into our Employee Wellness Program, a holistic initiative designed to promote and
                        improve
                        the health and well-being of your workforce. This program focuses on a variety of wellness
                        aspects, including physical health,
                        mental well-being, and work-life balance, aiming to create a healthier, happier, and more
                        productive workplace.<br>
                    <p>

                        <b>Some topics discussed include</b>
                    <ol>
                        <li>Housing and Real Estate</li>
                        <li>Debt management</li>
                        <li>Investment options</li>
                    </ol>

                    <p><b>Who should attend?</b></p>
                    <p>Corporate institutions looking to increasing employee engagement and productivity</p>

                    <span style="font-size:20px;"><b>Price:</b> Kshs 5,000 per person OR Kshs 45,000(group of
                        10)<br></span>
                    <span style="font-size:20px;"><b>Duration:</b> 1 day<br></span>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary btn-enroll" data-toggle="modal"
                        data-target="#modal_enroll">Enroll</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- retirement2 Modal -->
    <div class="modal fade" id="modal_retirement2" tabindex="-1" role="dialog"
        aria-labelledby="modal_retirement2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_retirement2">Retirement Planning</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Explore our Corporate Retirement Planning program, a comprehensive course designed to equip
                        businesses with the knowledge and tools to establish and manage effective retirement plans.
                        This
                        program focuses on understanding the intricacies of retirement planning, including
                        investment
                        strategies, risk management,
                        and regulatory compliance, with the goal of ensuring a secure and stable retirement for
                        employees.<br>
                    <p>

                        <b>Some topics discussed include</b>
                    <ol>
                        <li>Portfolio Constructions</li>
                        <li>Goal Setting</li>
                        <li>Investment options and review of various asset class</li>
                    </ol>

                    <p><b>Who should attend?</b></p>
                    <p>Staff of Corporate institutions, owner management</p>

                    <span style="font-size:20px;"><b>Price:</b> Tailor Made<br></span>
                    <span style="font-size:20px;"><b>Duration:</b> ?<br></span>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary btn-enroll" data-toggle="modal"
                        data-target="#modal_enroll">Enroll</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- wealth_wave Modal -->
    <div class="modal fade" id="modal_wealthWave" tabindex="-1" role="dialog" aria-labelledby="modal_wealthWave"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_wealthWave">Wealth Wave Talks</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Join our Wealth Wave Talks program to learn essential wealth creation and preservation
                        strategies.
                        This program offers insights into smooth wealth transfer to future generations and includes
                        comprehensive training on wealth building and estate planning.<br>
                    <p>

                        <b>Some topics we delve into include</b>
                    <ol>
                        <li>Getting it Right with your Investments</li>
                        <li>Using Property to Build Wealth</li>
                        <li>Pension Funds and Wealth Creation</li>
                        <li>Capitals Markets Investing</li>
                    </ol>

                    <p><b>Who is it for?</b></p>
                    <p>This program is ideal for individuals seeking to enhance their financial literacy, wealth
                        creation and preservation strategies.</p>

                    <span style="font-size:20px;"><b>Price:</b>Kshs 1500<br></span>
                    <span style="font-size:20px;"><b>Conducted Through Virtual sessions:</b> Enter Contact details
                        for
                        more info <br></span>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary btn-enroll" data-toggle="modal"
                        data-target="#modal_enroll">Join</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bi-weekly Modal -->
    <div class="modal fade" id="modal_assetClass" tabindex="-1" role="dialog" aria-labelledby="modal_assetClass"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_assetClass">Bi-Weekly asset classes</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Our Asset Classes Training is a specialized program aimed at improving financial literacy and
                        aiding in informed investment decisions. It's suitable for both seasoned investors and
                        beginners,
                        providing the necessary knowledge to effectively navigate the complex world of asset
                        classes.<br>
                    <p>

                        <b>Some topics we discuss include:</b>
                    <ol>
                        <li>Understanding the various asset classes</li>
                        <li>Investing in Bonds & Treasury Bills</li>
                        <li>Investing in Real Estate</li>
                        <li>How to create a good portfolio</li>
                    </ol>

                    <p><b>Who is it for?</b></p>
                    <p>This program is a golden opportunity for everyone! Whether you're a seasoned investor, a
                        beginner, or simply someone curious about the financial world</p>

                    <span style="font-size:20px;"><b>Price:</b> Free<br></span>
                    <span style="font-size:20px;"><b>Conducted Through Virtual sessions:</b> Enter Contact details
                        for
                        more info <br></span>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary btn-enroll" data-toggle="modal"
                        data-target="#modal_enroll">Join</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Podcast Modal -->
    <div class="modal fade" id="modal_podcast" tabindex="-1" role="dialog" aria-labelledby="modal_podcast_label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_podcast_label">Wealth Wave Podcast</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Join our podcast to gain insights into the world of finance and investment. Whether you're a
                        seasoned investor or just starting your financial journey, our podcast offers valuable
                        knowledge
                        for everyone.<br>
                    <p>

                        <b>Stay tuned for our dynamic discussions on:</b>
                    <ol>
                        <li>The Secrets of Successful Investing</li>
                        <li>Financial Fitness for the Future</li>
                        <li>Millennial Money Mastery</li>
                        <li>Unlocking Your Wealth Potential</li>
                        <li>The Path to Financial Independence</li>
                    </ol>
                    <p>Our podcast is tailored especially for the youth, providing accessible and engaging
                        discussions
                        on key financial topics to empower them with the knowledge they need to thrive in today's
                        economy.</p>
                    <p>Click on the button to visit our channel</p>
                </div>
                <div class="modal-footer">
                    <a href="https://www.youtube.com/playlist?list=PLxcZQqn1KJeaceh8cA3CA-noho19CIXeJ"
                        class="btn btn-primary" target="_blank">Visit Channel</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- enroll modal -->
    <div class="modal fade" id="modal_enroll" tabindex="-1" role="dialog" aria-labelledby="modal_enroll"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style= "padding:3%; background-color:#0c2533;">
                <div class="modal-header">
                    <h3 style="color:#ffc233;">Enter your details and we will get back to you soon</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="enrollForm">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email<span style="color:red; font-size:20px;">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <p> All fields marked with <span style="color:red; font-size:20px;">*</span> are required
                        </p>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
            <div id="success-message" class="alert alert-success"
                style="display: none; position: absolute; top: 0px; left: 30%; right: 30%">
                Enrollment successful!
            </div>
        </div>
    </div>

    @include('layouts.footer')

    @include('layouts.foot')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $(".category_btn").click(function() {
                // Remove active class from all buttons
                $(".category_btn").removeClass("active");

                // Add active class to clicked button
                $(this).addClass("active");

                var category = $(this).attr("id");
                $(".category_card").hide();
                $("." + category).show();
            });

            // Trigger click event on individual button
            $("#individual").click();

            // Handle the enroll form submission
            $('#enrollForm').on('submit', function(e) {
                e.preventDefault();

                var trainingName = $('.modal.show .modal-title').text();

                $.ajax({
                    url: '/enroll',
                    type: 'POST',
                    data: {
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                        training: trainingName,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle the response from the server
                        $('#success-message').css('display', 'block');
                        setTimeout(function() {
                            $('#success-message').css('display', 'none');
                        }, 2000);
                        $('#modal_enroll').modal('hide');

                        // Clear the form fields
                        $('#enrollForm')[0].reset();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus, errorThrown);
                    }
                });

            });
        });
    </script>


</body>
