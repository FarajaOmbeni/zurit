<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}?v={{time()}}">
    <link rel="icon" href="{{ asset('img/ico_logo.webp') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-1">
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
    <header class="header-background">
        <div class="img-circle"><img src="img/second-circle.svg" alt=""></div>
        <div class="img-dots"><img src="img/dots.svg" alt=""></div>
        <div class="container">
            <div class="header row py-md-5">
                <div class="header-text col-md-6">
                    <h1>Zurit <span class="consult-text" style="color: #F2AE30">Consulting</span></h1>
                    <p>We are a bespoke Wealth Management Company focused on both individuals and corporates looking at
                        growing wealth sustainably.</p>
                    <a class="btn btn-light header-btn">Learn More <img src="img/arrow-right.svg" alt=""
                            style="width:20px"></a>
                </div>
                <div class="col-md-6">
                    <!-- Video Container -->
                    <div class="video-container"
                        onclick="window.open('https://www.youtube.com/watch?v=dmEYWmpfmgk', '_blank')">
                        <video class="video" src="img/vids/intro.mp4" autoplay muted loop></video>
                        <div class="play-button">
                            <img src="img/play_button.svg" alt="Play">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>
    <main>

        <section class="light-section">
            <h2 style="text-align:center; margin-bottom:50px;">Our Events</h2>
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

            <h2 style="text-align:center; margin-bottom:50px;">Past Events</h2>
            <div class="past-trainings">
                @foreach ($pastevents as $pastevent)
                    <div class="container">
                        <div class="accordion" id="accordion" onclick="openAccordion(event)">
                            <div class="accordion-title">
                                {{ $pastevent->name }}
                            </div>

                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1" />
                                </svg>
                            </div>
                        </div>
                        <div class="accordion-item" id="accordion-item">
                            <img class="accordion-image" src="{{ asset('events_res/img/' . $pastevent->image) }}"
                                alt="Event Image">
                            <div class="accordion-content">
                                <h4><b>{{ $pastevent->name }}</b></h4>
                                <h5>{{ $pastevent->date }}</h5>
                                <a class="registration-link" href="/contactus" target="_blank">Leave a review!</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>


        <section class="light-gray-section py-5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 text">
                        <h2>Why Choose Us</h2>
                        <p class="sub-header">At Zurit Financial Consultancy, we stand out in the financial consulting
                            industry for several compelling reasons:</p>
                        <ol class="ps-0 col-lg-9">
                            <li>
                                Financial Expertise
                                <p>Benefit from our wealth of experience and expertise in wealth management and
                                    financial planning. Our track record speaks for itself.</p>
                            </li>
                            <li>
                                Tailored Solutions
                                <p>We customize financial strategies to meet your unique goals and challenges, ensuring
                                    your plan is as individual as you are.</p>
                            </li>
                            <li>
                                Unwavering Commitment
                                <p>We're passionately committed to your financial prosperity. Our core values drive us
                                    to work tirelessly to help you achieve your financial goals.</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="bg-img">
                <img src="img/why-us.webp" alt="">
            </div>
        </section>

        <!--gamification section
        <section class="light-section">
  <div class="row">
    <div class="col-md-6">
      <div id="what-is-budget-planner" class="card">
        <div class="card-body">
          <input type="text" class="form-control" placeholder="Search...">

          <!-- Donut chart
          <canvas id="donutChart"></canvas>

          <!-- List of expense types at the bottom
          <ul id="expenseTypes" class="list-group mt-3">
            <!-- Expense types will be added here -->
        </ul>
        <!-- Original content ends here
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <!-- Input fields for expense name and expense amount
      <input type="text" class="form-control mb-3" placeholder="Expense Name">
      <input type="number" class="form-control mb-3" placeholder="Expense Amount">

      <!-- Card showing the net income
      <div class="card">
        <div class="card-body">
          Net Income: $0
        </div>
      </div>
    </div>
  </div>
</section>-->


        <section class="contact-us" id="contact-us">
            <div class="container">
                <h2>Contact Us</h2>
                <div class="contact-content d-flex flex-column flex-lg-row">
                    <div class="map mb-4 mb-lg-0">
                        <!-- Embed your map here -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3988.7744044269725!2d36.801995999999995!3d-1.3107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMcKwMTgnMzguNSJTIDM2wrA0OCcwNy4yIkU!5e0!3m2!1sen!2ske!4v1707382631263!5m2!1sen!2ske"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="contact-form">
                        <form action="{{ route('contact.store') }}" method="post">
                            @csrf
                            <input type="text" name="name" placeholder="Your Name">
                            <input type="email" name="email" placeholder="Your Email">
                            <textarea name="userMessage" placeholder="Your Message"></textarea>
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
        <div class="light-gray-section bottom py-5">
            <div class="img-circle-left"><img src="img/circle.svg" alt=""></div>
            <div class="img-circle-right"><img src="img/circle.svg" alt=""></div>
            <div class="container">
                <h2>Check testimonials for our satisfied clients</h2>
                <div id="carouseltestimonials" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="testimonial">
                                <div class="client">
                                    <div class="photo"><img style="height: 90%; width: 90%;" src="img/Davis.webp"
                                            alt=""></div>
                                    <p class="name">Davis Otao</p>
                                    <p class="position">DevOps Engineer</p>
                                </div>
                                <div class="testimonial-text">
                                    <p>Zurit Financial Consultancy has been an invaluable asset to our team, providing
                                        expert financial guidance tailored to the unique challenges of our DevOps
                                        environment. Their strategic insights and tailored solutions have significantly
                                        optimized our financial processes. With a commitment to excellence, their team's
                                        responsiveness and proactive approach set them apart. I highly recommend Zurit
                                        Financial Consultancy to any DevOps professional seeking top-notch financial
                                        expertise.</p>
                                </div>
                                <div class="quote"><img src="img/left-quote.svg" alt=""></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial">
                                <div class="client">
                                    <div class="photo"><img style="height: 90%; width: 90%;" src="img/Bramwel.webp"
                                            alt=""></div>
                                    <p class="name">Bramwel Tum</p>
                                    <p class="position">Project Manager</p>
                                </div>
                                <div class="testimonial-text">
                                    <p>Zurit Financial Consultancy has been an indispensable partner for our project
                                        management team. Their astute financial solutions and strategic insights have
                                        played a pivotal role in optimizing our project budgets and resource
                                        allocations. The team's responsiveness and dedication to client success make
                                        them stand out in the industry. I enthusiastically recommend Zurit Financial
                                        Consultancy to any project manager seeking a reliable financial ally for project
                                        success.</p>
                                </div>
                                <div class="quote"><img src="img/left-quote.svg" alt=""></div>
                            </div>
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
                <!--PARTNERS SECTION-->
                <div class="container">
                    <h2>Our Partners</h2>
                    <div class="partners-grid">
                        <img src="img/beyond-the-stethescope.webp" alt="Logo 1">
                        <img src="img/college-of-insurance.webp" alt="Logo 2">
                        <img src="img/kozi.webp" alt="Logo 3">
                        <img src="img/look-up-tv.webp" alt="Logo 4">
                        <img src="img/mol logistics.webp" alt="Logo 5">
                        <img src="img/mywage-pay.webp" alt="Logo 6">
                        <img src="img/nca.webp" alt="Logo 7">
                        <img src="img/nita.webp" alt="Logo 8">
                        <img src="img/parkland.webp" alt="Logo 9">
                        <img src="img/salaam.webp" alt="Logo 10">
                        <img src="img/sinapis.webp" alt="Logo 11">
                        <img src="img/sme.webp" alt="Logo 12">
                        <img src="img/taaj.webp" alt="Logo 13">
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-5">
            <div class="container">
                <div class="row">
                    <div class="footer-item col-md-3">
                        <!--<img src="img/logo-white3.webp" style="width: 50% height: 50%"alt="">-->
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
                                    send you more information.</label>
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
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="js/addshadow.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
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

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    video.play();
                    observer.unobserve(entry.target);
                }
            });
        }, options);

        observer.observe(document.querySelector('.light-section2'));

        $(document).ready(function() {
            $('.navbar-toggler').click(function() {
                var targetCollapse = $($(this).data('bs-target'));
                targetCollapse.collapse('toggle');

                // Toggle the icon classes
                $(this).toggleClass('collapsed');
                $(this).find('.navbar-toggler-icon').toggleClass('d-none');
                $(this).find('.fa-bars, .fa-times').toggleClass('d-none');
            });

            // Close the navbar when a menu item is clicked
            $('.navbar-nav>li>a').on('click', function() {
                $('.navbar-collapse').collapse('hide');
            });
        });

        // data for the donut chart and the list
        var data = {
            labels: ['Rent', 'Groceries', 'Bills', 'Entertainment', 'Other'],
            datasets: [{
                data: [300, 50, 100, 50, 100],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#AA6384', '#2CA21B']
            }]
        };

        // create the donut chart
        var ctx = document.getElementById('donutChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: data
        });

        // add expense types to the list
        var ul = document.getElementById('expenseTypes');
        data.labels.forEach(function(label, i) {
            var li = document.createElement('li');
            li.className = 'list-group-item';

            // create a span for the colored bullet
            var span = document.createElement('span');
            span.style.display = 'inline-block';
            span.style.width = '10px';
            span.style.height = '10px';
            span.style.marginRight = '5px';
            span.style.backgroundColor = data.datasets[0].backgroundColor[i];
            li.appendChild(span);

            // add the expense type and amount
            li.appendChild(document.createTextNode(label + ': $' + data.datasets[0].data[i]));

            ul.appendChild(li);
        });
    </script>
</body>

</html>
