@include('layouts.head')
<title>Home</title>
<link rel="stylesheet" href="{{ asset('home_res/css/style.css') }}?v={{ time() }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-1">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('home_res/img/logo-white3.webp') }}" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU</h5>
                    @if (Auth::check())
                        <span>{{ Auth::user()->name }}</span>
                    @endif
                    <button type="button" class="close-canvas" data-bs-dismiss="offcanvas"
                        aria-label="Close">X</button>
                </div>
                <div class="offcanvas-body">
                    <div class="offcanvas-link"><button class="download_button"
                            onclick="deferredPrompt.prompt()">Download
                            App</button></div>
                    <div class="offcanvas-link"><a href="/">Home</a></div>
                    <div class="nav-menu">
                        <input id="toggle" type="checkbox" checked>
                        <div class="dropdown-title">
                            <a class="tools-link">Services</a>
                            <img class="arrow-icon" src="{{ asset('home_res/img/icon/arrow.png') }}" alt="">
                        </div>
                        <ul>
                            <li><a class="dropdown-link" href="{{ url('training') }}">Training</a></li>
                            <li><a class="dropdown-link" href="#">Advisory</a></li>
                            <li><a class="dropdown-link" href="{{ url('chama') }}">Chama Advisory</a></li>
                            <li><a class="dropdown-link" href="{{ url('trustees') }}">Trustees Advisory</a></li>
                        </ul>
                    </div>
                    <div class="offcanvas-link"><a href="{{ url('books') }}">Buy Books</a></div>
                    <div class="offcanvas-link"><a href="{{ url('blogs') }}">Blogs</a></div>
                    <div class="nav-menu">
                        <input id="toggle" type="checkbox" checked>
                        <div class="dropdown-title">
                            <a class="tools-link">Prosperity Tools</a>
                            <img class="arrow-icon" src="{{ asset('home_res/img/icon/arrow.png') }}" alt="">
                        </div>
                        <ul>
                            <a class="dropdown-item" href="{{ url('goalsetting') }}">Goal Setting</a>
                            <li><a class="dropdown-link" href="{{ url('budgetplanner') }}">Budget Planner</a></li>
                            <li><a class="dropdown-link" href="{{ url('networthcalculator') }}">Networth
                                    Calculator</a>
                            </li>
                            <li><a class="dropdown-link" href="{{ url('debtmanager') }}">Debt Manager</a></li>
                            <li><a class="dropdown-link" href="{{ url('investmentplanner') }}">Investment
                                    Planner</a>
                            </li>
                        </ul>
                    </div>
                    <div class="offcanvas-link"><a href="{{ url('about') }}">About Us</a></div>
                    <div class="offcanvas-link"><a href="{{ url('feedback') }}">Feedback</a></div>
                    @if (Auth::check())
                        <div class="offcanvas-link"><a href="/user_budgetplanner">Go to Dashboard</a></div>
                        <div class="offcanvas-link"><a href="/logout">Logout</a></div>
                    @else
                        <div class="offcanvas-link"><a href="{{ url('login') }}">Log In</a></div>
                    @endif
                </div>
            </div>
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
                            <a class="dropdown-item" href="{{ url('goalsetting') }}">Goal Setting</a>
                            <a class="dropdown-item" href="{{ url('budgetplanner') }}">Budget Planner</a>
                            <a class="dropdown-item" href="{{ url('networthcalculator') }}">Networth
                                Calculator</a>
                            <a class="dropdown-item" href="{{ url('debtmanager') }}">Debt Manager</a>
                            <a class="dropdown-item" href="{{ url('investmentplanner') }}">Investment Planner</a>
                        </div>
                    </li>
                    <li
                        class="nav-item dropdown d-md-inline {{ Request::is('training', 'advisory', 'chama', 'trustees') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="prosperityToolsDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="prosperityToolsDropdown">
                            <a class="dropdown-item" href="{{ url('training') }}">Training</a>
                        </div>
                    </li>
                    <li class="nav-item {{ Request::is('books') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('books') }}">Buy Book</a>
                    </li>
                    <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('blogs') }}">Blogs</a>
                    </li>
                    <li class="nav-item {{ Request::is('feedback') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('feedback') }}">Feedback</a>
                    </li>
                    @if (Auth::check())
                        <li
                            class="nav-item dropdown d-md-inline {{ Request::is('training', 'advisory', 'chama', 'trustees') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="prosperityToolsDropdown"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="prosperityToolsDropdown">
                                <a class="dropdown-item" href="/user_budgetplanner">Go to Dashboard</a>
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ url('login') }}"><button class="btn-item">Join Us</button></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show w-25 position-absolute m-auto z-100"
                style="right: 5rem; top:5rem;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show w-25 position-absolute m-auto z-100"
                style="right: 5rem; top:5rem;">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </nav>


    <header class="header-background">
        <div class="img-circle"><img src="home_res/img/second-circle.svg" alt=""></div>
        <div class="img-dots"><img src="home_res/img/dots.svg" alt=""></div>
        <div class="container">
            <div class="header row py-md-5">
                <div class="header-text col-md-6 col-sm-6">
                    <h1>Zurit <span class="consult-text" style="color: #F2AE30">Consulting</span></h1>
                    <p>Unlock financial prosperity with Zurit Consulting. Our tailored financial trainings and
                        advisory
                        solutions empower <span style="color: #F2AE30; font-weight: bold;">trustees, corporates,
                            and
                            individuals</span> to navigate the complexities of finance with confidence.<br> <br><span
                            style="color: #F2AE30; font-weight: bold; font-size: 23px;">Below are the trainings we
                            offer:</span></p>
                    <div class="training-links">
                        <a href="{{ url('training') }}" class="training-link">Individual</a>
                        <a href="{{ url('training') }}" class="training-link">Corporate</a>
                        <a href="{{ url('training') }}" class="training-link">Quarterly</a>
                        <a href="{{ url('training') }}" class="training-link">Wealth Wave</a>
                    </div>
                </div>
                <div class="col-md-6">
                    @if ($video->video_link)
                        <div style="display: flex; justify-content: center; margin-top: 5%; margin-left: 5%;">
                            <iframe style="border: 1px solid #F2AE30; border-radius: 10px" width="600"
                                height="300" src="https://www.youtube.com/embed/{{ $video->video_link }}"
                                frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    @else
                        <div style="display: flex; justify-content: center; margin-top: 5%; margin-left: 5%;">
                            <p>No video available.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>
    <main>

        <!-- Questionnaire Modal -->
        <div>
            <a href="{{ url('/?openQuestionnaire=true') }}" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#zuritQuestionnaireModal"
                style="position: fixed; bottom: 20px; right: 20px; z-index: 5;">
                Help us serve you better
            </a>
            <x-zurit-questionnaire></x-zurit-questionnaire>
        </div>

        <section class="light-section">
            <h2 style="text-align:center; margin-bottom:50px;">UPCOMING EVENTS</h2>
            <div class="upcoming-trainings">
                @foreach ($events as $event)
                    <div class="upcoming-training-card">
                        <img class="upcoming-training-image" src="{{ asset('events_res/img/' . $event->image) }}"
                            alt="Image of {{ $event->name }}">
                        <div class="reglink-container"><a href="{{ $event->registration_link }}"
                                class="registration-link" target="_blank">
                                @if ($event->price == 'free')
                                    JOIN NOW
                                @else
                                    REGISTER NOW
                                @endif
                            </a></div>
                    </div>
                @endforeach
            </div>

            <h2 style="text-align:center; margin-top:20px; color: #F2AE30;">Our Partners</h2>

            <div class="partners_container">
                <div class="partners-grid">
                    <img src="home_res/img/beyond-the-stethescope.webp" alt="Logo 1">
                    <img src="home_res/img/college-of-insurance.webp" alt="Logo 2">
                    <img src="home_res/img/kozi.webp" alt="Logo 3">
                    <img src="home_res/img/look-up-tv.webp" alt="Logo 4">
                    <img src="home_res/img/mol logistics.webp" alt="Logo 5">
                    <img src="home_res/img/mywage-pay.webp" alt="Logo 6">
                    <img src="home_res/img/nca.webp" alt="Logo 7">
                    <img src="home_res/img/nita.webp" alt="Logo 8">
                    <img src="home_res/img/parklands.webp" alt="Logo 9">
                    <img src="home_res/img/salaam.webp" alt="Logo 10">
                    <img src="home_res/img/sinapis.webp" alt="Logo 11">
                    <img src="home_res/img/sme.webp" alt="Logo 12">
                    <img src="home_res/img/taaj.webp" alt="Logo 13">
                    <img src="home_res/img/maasai_mara.webp" alt="Logo 14">
                    <img src="home_res/img/masinde.webp" alt="Logo 15">
                    <img src="home_res/img/kibabii.webp" alt="Logo 16">
                    <img src="home_res/img/kise.webp" alt="Logo 17">
                    <img src="home_res/img/kpc.webp" alt="Logo 18">
                    <img src="home_res/img/lake_basin.webp" alt="Logo 19">

                </div>
            </div>
        </section>

        <section class="light-gray-section">
            <div class="light-1">
                <h2>Why Choose Us</h2>
                <p class="sub-header">At Zurit Financial Consultancy, we stand out in the financial
                    consulting
                    industry for several compelling reasons:</p>
                <ol class="ps-0 col-lg-9 whychooseus-list">
                    <li>
                        Financial Expertise
                        <p>Benefit from our wealth of experience and expertise in wealth management and
                            financial planning. Our track record speaks for itself.</p>
                    </li>
                    <li>
                        Tailored Solutions
                        <p>We customize financial strategies to meet your unique goals and challenges,
                            ensuring
                            your plan is as individual as you are.</p>
                    </li>
                    <li>
                        Unwavering Commitment
                        <p>We're passionately committed to your financial prosperity. Our core values drive
                            us
                            to work tirelessly to help you achieve your financial goals.</p>
                    </li>
                </ol>
            </div>
            <div class="light-2">
                <h2 class="text-center testimonials-header">Testimonials</h2>
                <div id="carouseltestimonials" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @if (count($testimonials) > 0)
                            @foreach ($testimonials as $index => $testimonial)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="testimonial">
                                        <div class="client">
                                            <div class="photo">
                                                <img src="{{ asset('testimonial_images/' . $testimonial->image) }}"
                                                    alt=""
                                                    style="width: 10rem; height: 10rem; border-radius: 50%;">
                                            </div><br><br>
                                            <p class="name text-center fw-bold fs-5">{{ $testimonial->name }}</p>
                                        </div><br>
                                        <div class="testimonial-text">
                                            <p>{{ strip_tags($testimonial->content) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <div class="testimonial">
                                    <div class="client">
                                        <div class="photo">
                                            <img src="path_to_default_image.jpg" alt=""
                                                style="width: 10rem; height: 10rem; border-radius: 50%;">
                                        </div><br><br>
                                        <p class="name text-center fw-bold fs-5">No Testimonials Available</p>
                                    </div><br>
                                    <div class="testimonial-text">
                                        <p>Check back later for more testimonials.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="controllers">
                        <button type="button" data-bs-target="#carouseltestimonials" data-bs-slide="prev">
                            <img src="img/arrow-left.svg" alt="" style="width:40px">
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button type="button" data-bs-target="#carouseltestimonials" data-bs-slide="next">
                            <img src="img/arrow-right.svg" alt="" style="width:40px">
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-us" id="contact-us">
            <div class="container">
                <h2>Contact Us</h2>
                <div class="contact-content d-flex flex-column flex-lg-row">

                    <div class="map mb-4 mb-lg-0">
                        <a href="https://maps.app.goo.gl/awNjntYupy6x7SNz5" target="_blank"><img class="map_image"
                                src="{{ asset('home_res/img/map.webp') }}" alt=""></a>
                    </div>

                    <div class="contact-form">
                        <form id="contact-form" action="{{ route('contact.store') }}" method="post">
                            @csrf
                            <input type="text" name="name" placeholder="Your Name">
                            <input type="email" name="email" placeholder="Your Email">
                            <textarea name="userMessage" placeholder="Your Message"></textarea>
                            <div class="d-flex justify-content-center g-recaptcha"
                                data-sitekey="{{ env('RECAPTCHA_API_KEY') }}" data-action="SendContact"></div>
                            <button type="submit">Send Message</button>
                        </form>
                        <div class="contact-icons">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                                <p>+254 759 092 412</p>
                            </div>
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>Zuidier Complex, <br>Mbagathi Hospital Road<br>Off Mbagathi Way</p>
                            </div>
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                                <p>info@zuritconsulting.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.footer')
        @include('layouts.foot')

        <script>
            document.getElementById('contact-form').addEventListener('submit', function(e) {
                // e.preventDefault();
                grecaptcha.enterprise.ready(async function() {
                    const recaptchaKey = "{{ env('RECAPTCHA_KEY') }}";
                    const token = await grecaptcha.enterprise.execute(recaptchaKey, {
                        action: 'submit'
                    });
                    // Add the token to the form
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'g-recaptcha-response';
                    input.value = token;
                    document.getElementById('contact-form').appendChild(input);
                    // Submit the form
                    document.getElementById('contact-form').submit();
                });
            });

            function openAccordion(event) {
                const accordion = event.target;
                const item = accordion.nextElementSibling;
                if (item.style.maxHeight) {
                    item.style.maxHeight = null;
                    accordion.style.borderBottomLeftRadius = '12px';
                    accordion.style.borderBottomRightRadius = '12px';

                } else {
                    item.style.maxHeight = 150 + "px";
                    accordion.style.borderBottomLeftRadius = '0px';
                    accordion.style.borderBottomRightRadius = '0px';
                }
            }
            const video = document.getElementById('sectionVideo');
            const options = {
                root: null,
                rootMargin: '0px',
                threshold: 0.5 // Intersection ratio to consider (0.5 means at least 50% of the element is visible)
            };

            document.addEventListener('DOMContentLoaded', function() {
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.get('openQuestionnaire') === 'true') {
                    const modal = new bootstrap.Modal(document.getElementById('zuritQuestionnaireModal'));
                    modal.show();
                }
            });
        </script>
</body>

</html>
