<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Trainings_Zurit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('training_res/css/style.css') }}">
    <link rel="icon" href="{{ asset('img/ico_logo.webp') }}?v={{time()}}">
</head>

<body>
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top py-1">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('img/logo-white3.webp') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('about') }}">About us</a>
                    </li>
                    <li
                        class="nav-item dropdown d-md-inline {{ Request::is('budgetplanner', 'networthcalculator', 'debtmanager', 'investmentplanner') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="prosperityToolsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Prosperity Tools
                        </a>
                        <div class="dropdown-menu" aria-labelledby="prosperityToolsDropdown">
                            <a class="dropdown-item" href="{{ url('budgetplanner') }}">Budget Planner</a>
                            <a class="dropdown-item" href="{{ url('networthcalculator') }}">Networth Calculator</a>
                            <a class="dropdown-item" href="{{ url('debtmanager') }}">Debt Manager</a>
                            <a class="dropdown-item" href="{{ url('investmentplanner') }}">Investment Planner</a>
                        </div>
                    </li>
                    <li class="nav-item {{ Request::is('training') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('training') }}">Training</a>
                    </li>
                    <!--<li class="nav-item {{ Request::is('advisory') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('advisory') }}">Advisory</a>
                </li>-->
                    <li class="nav-item {{ Request::is('books') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('books') }}">Books</a>
                    </li>
                    <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('blogs') }}">Blogs</a>
                    </li>
                    <li class="nav-item {{ Request::is('contactus') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('contactus') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('login') }}"><button class="btn-item">Join Us</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!--Training Section-->

    <section class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <!-- carousel -->
        <div class="carousel">
            <!--radio buttons-->
            <div class="button-group">
                <label class="btn btn-secondary">
                    <input type="radio" id="quarterly" name="category" value="quarterly"
                        onchange="filterItems('quarterly')">
                    Quarterly
                </label>

                <label class="btn btn-secondary">
                    <input type="radio" id="corporate" name="category" value="corporate"
                        onchange="filterItems('corporate')">
                    Corporate
                </label>

                <label class="btn btn-secondary active">
                    <input type="radio" id="individual" name="category" value="individual"
                        onchange="filterItems('individual')" checked>
                    Individual
                </label>

                <label class="btn btn-secondary">
                    <input type="radio" id="wealth_wave" name="category" value="wealth_wave"
                        onchange="filterItems('wealth_wave')">
                    Wealth Wave
                </label>
            </div>

            <div class="list">
                <!-------------------Quarterly Items------------------------------------>

                <div class="item quarterly">
                    <img src="training_res/img/investments.webp">
                    <div class="content">
                        <div class="title">Fundamentals Of</div>
                        <div class="topic">Investments</div>
                        <div class="des">
                            "Join our quarterly training on the Fundamentals of Investments, tailored for Pension
                            Trustees, Human Resources professionals, Finance individuals, and Sacco Board members.
                            Discover practical investment solutions, wealth creation tools, and networking
                            opportunities.
                        </div>
                        <div class="buttons">
                            <button class="see-more"
                                data-image-url="training_res/img/trainings/fundamentals_of_investments.png">SEE
                                MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>


                <div class="item quarterly">
                    <img src="training_res/img/retirement.webp">
                    <div class="content">
                        <div class="title">Retirement</div>
                        <div class="topic">Planning</div>
                        <div class="des">
                            "Embark on your journey to secure retirement with our specialized training, designed for
                            Corporate institution staff and owner management. Gain practical investment solutions,
                            wealth creation tools, and invaluable networking opportunities.
                        </div>
                        <div class="buttons">
                            <button class="see-more"
                                data-image-url="training_res/img/trainings/retirement_planning.png">SEE
                                MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>


                <!-------------------Corporate Items------------------------------------>
                <div class="item corporate">
                    <img src="training_res/img/employee_wellness.webp">
                    <div class="content">
                        <div class="title">Employee</div>
                        <div class="topic"> Wellness</div>
                        <div class="des">
                            Introducing our Employee Financial Wellness Program tailored for forward-thinking
                            corporate institutions invested in boosting employee engagement and productivity. With
                            over 50% of employee stress attributed to financial challenges, this program is crucial.
                            By providing training on making sound investment decisions, we aim to alleviate
                            financial stress and empower employees to achieve financial stability. Join us in
                            prioritizing employee well-being and enhancing organizational performance.
                        </div>
                        <div class="buttons">
                            <button class="see-more">SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="item corporate">
                    <img src="training_res/img/retirement2.webp">
                    <div class="content">
                        <div class="title">Retirement</div>
                        <div class="topic">Planning</div>
                        <div class="des">
                            "Embark on a journey to secure your future with our Retirement Planning program,
                            tailored for corporate institution staff and owner management. Discover practical
                            investment solutions, personalized wealth creation tools, and invaluable networking
                            opportunities. Join us to learn from industry peers and experts while crafting a robust
                            retirement strategy that aligns with your financial goals
                        </div>
                        <div class="buttons">
                            <button class="see-more">SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <div class="item corporate">
                    <img src="training_res/img/strategy.webp">
                    <div class="content">
                        <div class="title">Strategy</div>
                        <div class="topic">& Governance</div>
                        <div class="des">
                            Strategy and governance text........................................
                        </div>
                        <div class="buttons">
                            <button class="see-more">SEE MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
                <!-------------------Individual Items------------------------------------>
                <div class="item individual">
                    <img src="training_res/img/prosperity.webp">
                    <div class="content">
                        <div class="title">Prosperity</div>
                        <div class="topic">Fundamentals</div>
                        <div class="des">
                            Unlock the keys to prosperity with our flagship program a transformative six-week course
                            conducted every Saturday at 7 am where we delve deep into essential financial concepts
                            and practical strategies to build a solid foundation for long-term prosperity. Whether
                            you're a beginner or a seasoned investor, this program is designed to elevate your
                            financial literacy and guide you towards a path of abundance and success.
                        </div>
                        <div class="buttons">
                            <button class="see-more"
                                data-image-url="training_res/img/trainings/prosperity_fundamentals.png">SEE
                                MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>

                <!-------------------Wealth Wave Items------------------------------------>
                <div class="item wealth_wave">
                    <img src="training_res/img/wealth_wave.webp">
                    <div class="content">
                        <div class="title">Wealth Wave</div>
                        <div class="topic">Talks</div>
                        <div class="des">
                            Dive into the Wealth Wave program and ride the tide of financial success. Alternate
                            between insightful discussions and practical workshops, harnessing the power of
                            collective learning and collaboration. Join us on this journey to surf the waves of
                            wealth creation and financial empowerment.
                        </div>
                        <div class="buttons">
                            <button class="see-more" data-image-url="training_res/img/trainings/bi-monthly.png">SEE
                                MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>

                <div class="item wealth_wave">
                    <img src="training_res/img/asset_class.webp">
                    <div class="content">
                        <div class="title">Bi-weekly Asset</div>
                        <div class="topic">Class training</div>
                        <div class="des">

                            "Join our Bi-Weekly Asset Classes Training, tailored for individuals aiming to boost
                            their financial literacy, make informed investment choices, and diversify portfolios
                            effectively. Whether you're a seasoned investor or just beginning your financial
                            journey, this program equips you with the skills to navigate asset classes.Don't miss
                            this opportunity to enhance your financial expertise and achieve your investment goals.
                        </div>
                        <div class="buttons">
                            <button class="see-more" data-image-url="training_res/img/trainings/bi-weekly.png">SEE
                                MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>

                <div class="item wealth_wave">
                    <img src="training_res/img/podcast.webp">
                    <div class="content">
                        <div class="title"></div>
                        <div class="topic">Podcast</div>
                        <div class="des">
                            Tune in to our podcast where we decode the latest trends, analyze market movements, and
                            simplify intricate financial concepts to arm you with the knowledge for informed
                            decision-making.
                        </div>
                        <div class="buttons">
                            <button class="see-more" data-image-url="training_res/img/trainings/podcast.png">SEE
                                MORE</button>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                </div>

                <!-- card content -->
                <div class="card" id="myModal"
                    style="display: none; width: 50%; height:80%; margin: 0 auto; position: fixed; top: 55%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;">
                    <button type="button" class="close close-card"
                        style="position: absolute; right: 10px; top: 10px; color:white;">&times;</button>
                    <div class="row no-gutters">
                        <div class="card-body"
                            style="display:flex; gap:10px; background: linear-gradient(200deg, #35389b, #a882ef);">
                            <h2 class="card-title" id="modalTrainingName"></h2>
                            <h2 class="card-title" id="modalTrainingTopic"></h2>
                        </div>

                        <div
                            style="width: 100%; height: 60vh; display: flex; align-items: center; justify-content: center;">
                            <img id="trainingImage" src="" class="card-img" alt="Training Image"
                                style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <div style="width: 100%; display: flex; justify-content: center;">
                            <a href="{{ url('contactus') }}" class="btn btn-primary subscribe_btn"
                                style="border-radius: 20px;"><b>Subscribe</b></a>
                        </div>
                    </div>
                </div>

                <div id="backdrop"></div>
                <!-- end card -->


            </div>
            <!-- list thumnail -->
            <div class="thumbnail">
                <!-------------------Quarterly Thumbnails------------------------------------>
                <div class="item quarterly">
                    <img src="training_res/img/investments.webp">
                    <div class="content">
                        <div class="title">
                            Fundamentals Of investments
                        </div>
                    </div>
                </div>

                <div class="item quarterly">
                    <img src="training_res/img/retirement.webp">
                    <div class="content">
                        <div class="title">
                            Retirement Planning
                        </div>
                    </div>
                </div>

                <!-------------------Corporate Thumbnails------------------------------------>

                <div class="item corporate">
                    <img src="training_res/img/employee_wellness.webp">
                    <div class="content">
                        <div class="title">
                            Employee Wellness
                        </div>
                        <div class="description">
                            Description
                        </div>
                    </div>
                </div>

                <div class="item corporate">
                    <img src="training_res/img/retirement2.webp">
                    <div class="content">
                        <div class="title">
                            Retirement Planning
                        </div>
                        <div class="description">
                            Description
                        </div>
                    </div>
                </div>

                <div class="item corporate">
                    <img src="training_res/img/strategy.webp">
                    <div class="content">
                        <div class="title">
                            Strategy and Governance
                        </div>
                        <div class="description">
                            Description
                        </div>
                    </div>
                </div>
                <!-------------------Individual Thumbnails------------------------------------>
                <div class="item individual">
                    <img src="training_res/img/prosperity.webp">
                    <div class="content">
                        <div class="title">
                            Prosperity Fundamentals
                        </div>

                    </div>
                </div>
                <!-------------------Wealth Wave Thumbnails------------------------------------>
                <div class="item wealth_wave">
                    <img src="training_res/img/wealth_wave.webp">
                    <div class="content">
                        <div class="title">
                            Wealth wave Talks
                        </div>
                        <!-- <div class="description">
                            Description
                        </div> -->
                    </div>
                </div>
                <div class="item wealth_wave">
                    <img src="training_res/img/asset_class.webp">
                    <div class="content">
                        <div class="title">
                            BI-weekly Asset Class
                        </div>
                    </div>
                </div>
                <div class="item wealth_wave">
                    <img src="training_res/img/podcast.webp">
                    <div class="content">
                        <div class="title">
                            Podcast
                        </div>
                    </div>
                </div>
            </div>
            <!-- next prev -->

            <!-- <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div> -->
            <!-- time running -->
            <div class="time"></div>
        </div>
    </section>

    <!--end Trainings section-->


    <footer class="py-5">
        <div class="container">
            <div class="row">
                <div class="footer-item col-md-3">
                    <!--<img src="img/logo-white3.png" style="width: 50% height: 50%"alt="">-->
                    <p>Address: Zuidier Complex</p>
                    <p>Ngumo, Off Mbagathi Road</p>
                    <p>Nairobi, KE </p>
                    <p>Phone: +254 759 092 412</p>
                    <p>Email: info@zuritconsulting.com</p>
                </div>
                <div class="footer-item col-md-3">
                    <p class="footer-item-title">Services</p>
                    <p class="footer-text">Budget Management:</p>
                    <p>Financial Training</p>
                    <p>Investment Advisory</p>
                    <p>Debt Management</p>
                </div>
                <div class="footer-item col-md-3">
                    <p class="footer-item-title">Links</p>
                    <a href="">About Us</a>
                    <a href="">Home</a>
                    <a href="">Training</a>
                    <a href="">Contact Us</a>
                </div>
                <div class="footer-item col-md-3">
                    <p class="footer-item-title">Get In Touch</p>
                    <form action="{{ route('subscribe') }}" method="post">
                        @csrf
                        <div class="mb-3 pb-3">
                            <label for="exampleInputEmail1" class="form-label pb-3">Enter your email and we'll
                                send
                                you more information.</label>
                            <input type="email" name="email" placeholder="Your Email" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
                <div class="copyright pt-4 text-center text-muted">
                    <p>&copy; {{ date('Y') }} ZURIT CONSULTING</p>

                </div>
            </div>
    </footer>

    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="training_res/js/script.js"></script>
    <script>
        // navbar background change
        let navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function () {
            if (window.scrollY > 100) {
                navbar.style.backgroundColor = '#0c2533';
            } else {
                navbar.style.backgroundColor = 'transparent';
            }
        });

        //step 1: get DOM
        // let nextDom = document.getElementById('next');
        // let prevDom = document.getElementById('prev');

        let carouselDom = document.querySelector('.carousel');
        let SliderDom = carouselDom.querySelector('.carousel .list');
        let thumbnailBorderDom = document.querySelector('.carousel .thumbnail');
        let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.item');
        let timeDom = document.querySelector('.carousel .time');

        thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
        let timeRunning = 3000;
        let timeAutoNext = 7000;

        // nextDom.onclick = function(){
        //     showSlider('next');    
        // }

        // prevDom.onclick = function(){
        //     showSlider('prev');    
        // }

        // Add click handlers to each thumbnail
        thumbnailItemsDom.forEach((item, index) => {
            item.onclick = function () {
                showSlider(index);
            }
        });
        let runTimeOut;
        let runNextAuto = setTimeout(() => {
            next.click();
        }, timeAutoNext)

        function showSlider(index) {
            let SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
            let thumbnailItemsDom = document.querySelectorAll('.carousel .thumbnail .item');

            // Move the clicked thumbnail and associated item to the front
            SliderDom.prepend(SliderItemsDom[index]);
            thumbnailBorderDom.prepend(thumbnailItemsDom[index]);
            carouselDom.classList.add('next');

            clearTimeout(runTimeOut);
            runTimeOut = setTimeout(() => {
                carouselDom.classList.remove('next');
                carouselDom.classList.remove('prev');
            }, timeRunning);

            clearTimeout(runNextAuto);
            runNextAuto = setTimeout(() => {
                next.click();
            }, timeAutoNext)
        }

        function filterItems(category) {
            // Get all items
            var items = document.getElementsByClassName('item');

            // Loop through all items
            for (var i = 0; i < items.length; i++) {
                // If the item has the class of the selected category, show it. Otherwise, hide it.
                if (items[i].classList.contains(category)) {
                    items[i].style.display = 'block';
                } else {
                    items[i].style.display = 'none';
                }
            }
        }

        var buttons = document.querySelectorAll('.button-group label.btn');

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Remove the 'active' class from all buttons
                buttons.forEach(function (btn) {
                    btn.classList.remove('active');
                });

                // Add the 'active' class to the clicked button
                this.classList.add('active');
            });
        });

        // see more button
        window.onload = function () {
            filterItems('individual');

            document.querySelectorAll('.see-more').forEach(function (button) {
                button.addEventListener('click', function () {
                    var training = this.closest('.individual, .quarterly, .corporate, .wealth_wave');
                    var title = training.querySelector('.title').textContent;
                    var topic = training.querySelector('.topic').textContent;
                    var imageUrl = this.dataset.imageUrl;

                    document.getElementById('modalTrainingName').textContent = title;
                    document.getElementById('modalTrainingTopic').textContent = topic;
                    document.getElementById('trainingImage').src = imageUrl;

                    document.getElementById('myModal').style.display = 'block';
                    document.getElementById('backdrop').style.display = 'block';
                });
            });

            document.querySelector('.close-card').addEventListener('click', closeCard);
            document.getElementById('backdrop').addEventListener('click', closeCard);

            function closeCard() {
                document.getElementById('myModal').style.display = 'none';
                document.getElementById('backdrop').style.display = 'none';
            }
        }
    </script>

</body>