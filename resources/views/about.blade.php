@include('layouts.head')
<title>About Us</title>
<link rel="stylesheet" href="about_res/css/style.css">
</head>

<body>
    @include('layouts.navbar')

    <div class="container mainmargin">
        <div class="row">
            <div class="main col-md-8">
                <h2 class="text-center pb-4">Our History</h2>
                <p class="text-gray">
                    At Zurit Financial Consulting, we have a rich history of helping individuals and businesses achieve
                    their financial goals. Our journey began with a vision to provide tailored financial solutions, and
                    we have stayed true to that mission.
                </p>
                <h4>Why Choose Us:</h4>
                <ul class="text-list">
                    <li>Experienced Financial Experts</li>
                    <li>Customized Financial Strategies</li>
                    <li>Unwavering Commitment to Your Prosperity</li>
                </ul>
                <p class="text-gray">
                    We take pride in our experienced team of financial experts who provide personalized solutions to
                    meet your unique financial challenges. Our commitment to your financial prosperity drives us to work
                    tirelessly to help you achieve your goals.
                </p>
                <div class="team-wrapper text-center">
                    <h2>Meet Our Team</h2>
                    <div class="team">
                        <div class="col-12 team-item text-center">
                            <div class="photo" style="position: relative; margin: auto;"><img
                                    src="about_res/img/liz.webp" alt="Elizabeth Nkukuu"
                                    style="position: absolute; left: -10%;"></div>
                            <div class="text-center">
                                <strong><span>Elizabeth Nkukuu</span></strong>
                                <span><br>Founder - Team Leader</span>
                            </div>
                        </div>
                        <div class="team-item">
                            <div class="photo"><img class="uniform-img" src="about_res/img/brian.webp"
                                    alt="Brian Salau" style="width: 100%; height: auto;"></div>
                            <span class="name d-block">Brian Salau</span>
                            <span class="position">Manager</span>
                        </div>
                        <div class="team-item">
                            <div class="photo"><img class="uniform-img" src="about_res/img/ken_img.webp"
                                    alt="Ken Ndwigah" style="width: 100%; height: auto;"></div>
                            <span class="name d-block">Ken Ndwigah</span>
                            <span class="position">Head Of Finance</span>
                        </div>
                        <div class="team-item">
                            <div class="photo"><img class="uniform-img" src="about_res/img/noelle.webp"
                                    alt="Noel Jentrix" style="width: 100%; height: auto; margin-top:-80px;"></div>
                            <span class="name d-block">Noel Jentrix</span>
                            <span class="position">Client Relations</span>
                        </div>
                        <div class="team-item">
                            <div class="photo"><img class="uniform-img" src="about_res/img/gitia.webp"
                                    alt="Bryan Gitia" style="width: 100%; height: auto;"></div>
                            <span class="name d-block">Bryan Gitia</span>
                            <span class="position">Investment Specialist</span>
                        </div>
                        <div class="team-item">
                            <div class="photo"><img class="uniform-img" src="about_res/img/Bramwel.webp"
                                    alt="Bramwel Tum" style="width: 100%; height: auto;"></div>
                            <span class="name d-block">Bramwel Tum</span>
                            <span class="position">Developer</span>
                        </div>
                        <div class="team-item">
                            <div class="photo"><img class="uniform-img" src="about_res/img/Davis.webp" alt="Davis Otao"
                                    style="width: 100%; height: auto;"></div>
                            <span class="name d-block">Davis Otao</span>
                            <span class="position">Developer</span>
                        </div>
                        <div class="team-item">
                            <div class="photo"><img class="uniform-img" src="about_res/img/faraja.webp"
                                    alt="Ombeni Faraja" style="width: 100%; height: auto;"></div>
                            <span class="name d-block">Ombeni Faraja</span>
                            <span class="position">Developer</span>
                        </div>
                        <div class="team-item">
                            <div class="photo"><img class="uniform-img" src="about_res/img/churchill.webp"
                                    alt="Churchill Wagwa" style="width: 100%; height: auto;"></div>
                            <span class="name d-block">Churchill Wagwa</span>
                            <span class="position">Multimedia Creative Artist</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar col-md-4">
                <!--<div class="input-group input-group-sm mt-4">
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                <div class="input-group-append">
                    <span class="input-group-text color" id="inputGroup-sizing-sm">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>-->
                <div class="recent-post">
                    <h4>Who We Are</h4>
                    <p>
                        We are a bespoke Wealth Management Company focused on both individuals and corporates looking at
                        growing wealth sustainably.
                    </p>
                    <h4>Our Vision</h4>
                    <p>
                        Making financial prosperity the norm.
                    </p>
                    <h4>Mission</h4>
                    <p>
                        Deliver simple efficient Financial Trainings and Advisory Solutions which form the cornerstone
                        of thriving investments.
                    </p>
                    <h4>Our Values</h4>
                    <ul class="text-list">
                        <li>Excellence</li>
                        <li>Innovation</li>
                        <li>Collaboration</li>
                        <li>Accountability</li>
                        <li>Impact</li>
                    </ul>
                </div>
                <div class="sidebar-benefits-items pt-5">
                    <h4>Why Choose Our Tools</h4>
                    <div class="sidebar-benefits-item">
                        <div class="sidebar-benefits-item-title d-flex">
                            <div class="icon"><img src="about_res/img/debt.webp" alt="Debt Manager Icon"></div>
                            <p class="title">Debt Manager</p>
                        </div>
                        <div class="text-gray">
                            <p>
                                Our Debt Manager tool provides a comprehensive solution to track, organize, and optimize
                                your debt repayment strategy.
                            </p>
                        </div>
                    </div>

                    <!-- Investment Planner Benefits -->
                    <div class="sidebar-benefits-item">
                        <div class="sidebar-benefits-item-title d-flex">
                            <div class="icon"><img src="about_res/img/invest.webp" alt="Investment Planner Icon">
                            </div>
                            <p class="title">Investment Planner</p>
                        </div>
                        <div class="text-gray">
                            <p>
                                Receive personalized investment strategies and insights to help you achieve your
                                financial goals and build wealth over time.
                            </p>
                        </div>
                    </div>

                    <!-- Net Worth Calculator Benefits -->
                    <div class="sidebar-benefits-item">
                        <div class="sidebar-benefits-item-title d-flex">
                            <div class="icon"><img src="about_res/img/networth.webp"
                                    alt="Net Worth Calculator Icon"></div>
                            <p class="title">Net Worth Calculator</p>
                        </div>
                        <div class="text-gray">
                            <p>
                                Our Net Worth Calculator provides a clear snapshot of your assets and liabilities,
                                helping you make informed financial decisions.
                            </p>
                        </div>
                    </div>

                    <!-- Budget Planner Benefits -->
                    <div class="sidebar-benefits-item">
                        <div class="sidebar-benefits-item-title d-flex">
                            <div class="icon"><img src="about_res/img/budget.webp" alt="Budget Planner Icon"></div>
                            <p class="title">Budget Planner</p>
                        </div>
                        <div class="text-gray">
                            <p>
                                Plan and manage your finances effectively, set realistic spending goals, and gain
                                control over your expenses for a more secure financial future.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    @include('layouts.foot')

</body>

</html>
