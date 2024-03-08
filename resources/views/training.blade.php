<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <title>Training_Zurit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="training_res/css/style.css">
    <script src="training_res/js/script.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="{{ asset('img/ico_logo.png') }}">
</head>

<body>
<nav id="navbar" class="navbar nav-dark navbar-expand-lg fixed-top py-3">
        <div class="nav_logo">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo-white3.webp') }}" alt="">
        </a>
        </div>
        
        <div class="nav_links">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('about') }}">About us</a>
                </li>
                <li class="nav-item dropdown d-md-inline {{ Request::is('budgetplanner', 'networthcalculator', 'debtmanager', 'investmentplanner') ? 'active' : '' }}">
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
            <input type="radio" id="quarterly" name="category" value="quarterly" onchange="filterItems('quarterly')">
            Quarterly
        </label>

        <label class="btn btn-secondary">
            <input type="radio" id="corporate" name="category" value="corporate" onchange="filterItems('corporate')">
            Corporate
        </label>

        <label class="btn btn-secondary active">
            <input type="radio" id="individual" name="category" value="individual" onchange="filterItems('individual')" checked>
            Individual
        </label>

        <label class="btn btn-secondary">
            <input type="radio" id="wealth_wave" name="category" value="wealth_wave" onchange="filterItems('wealth_wave')">
            Wealth Wave
        </label>
    </div>

        <div class="list">
    <!-------------------Quarterly Items------------------------------------>

            <div class="item quarterly">
                <img src="training_res/img/business.webp">
                <div class="content">
                    <div class="title">Fundamentals Of</div>
                    <div class="topic">Investments</div>
                    <div class="des">
                        Fundamentals text.................................................
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>

            <div class="item quarterly">
                <img src="training_res/img/chama2.webp">
                <div class="content">
                    <div class="title">Retirement</div>
                    <div class="topic">Planning</div>
                    <div class="des">
                        Retirement text.................................................
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>


    <!-------------------Corporate Items------------------------------------>
            <div class="item corporate">
                <img src="training_res/img/people.webp">
                <div class="content">
                    <div class="title">Employee</div>
                    <div class="topic"> Wellness</div>
                    <div class="des">
                        Employee Wellness text.................................................
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item corporate">
                <img src="training_res/img/people.webp">
                <div class="content">
                    <div class="title">Retirement</div>
                    <div class="topic">Planning</div>
                    <div class="des">
                       Corporate retirement Planning text........................................
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item corporate">
                <img src="training_res/img/people.webp">
                <div class="content">
                    <div class="title">Strategy</div>
                    <div class="topic">& Governance</div>
                    <div class="des">
                       Strategy and governance text........................................
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
    <!-------------------Individual Items------------------------------------>         
            <div class="item individual">
                <img src="training_res/img/trustee.webp">
                <div class="content">
                    <div class="title">Prosperity</div>
                    <div class="topic">Fundamentals</div>
                    <div class="des">
                        Prosperity Text.................................................
                    </div>
                    <div class="buttons">
                        <button class="see-more">SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>

            <!-- card content -->
            <div class="card" id="myModal" style="display: none; width: 50%; height:80%; margin: 0 auto; position: fixed; top: 55%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;">
                <button type="button" class="close close-card" style="position: absolute; right: 10px; top: 10px;">&times;</button>
                <div class="row no-gutters">
                    <div class="card-body" style="display:flex; gap:10px; margin-top: 50px; background: linear-gradient(200deg, #35389b, #a882ef)">
                                <h2 class="card-title" id="modalTrainingName"></h2>
                                <h2 class="card-title" id="modalTrainingTopic"></h2>
                     </div>

                    <div>
                    <img id="trainingImage" src="training_res/img/trainings/prosperity_fundamentals.png" class="card-img" alt="Training Image">
                    </div>
                    <a href="{{ url('contactus') }}" class="btn btn-primary subscribe_btn" style="border-radius: 20px;"><b>Subscribe</b></a>

                </div>
            </div>

            <div id="backdrop"></div>
            <!-- end card -->
    <!-------------------Wealth Wave Items------------------------------------>
            <div class="item wealth_wave">
                <img src="training_res/img/trustee.webp">
                <div class="content">
                    <div class="title">Wealth Wave</div>
                    <div class="topic">Talks</div>
                    <div class="des">
                        Wealth Wave Talks text.................................................
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>

            <div class="item wealth_wave">
                <img src="training_res/img/trustee.webp">
                <div class="content">
                    <div class="title">Bi-weekly Asset</div>
                    <div class="topic">Class training</div>
                    <div class="des">
                        Bi-weekly text.................................................
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>

            <div class="item wealth_wave">
                <img src="training_res/img/trustee.webp">
                <div class="content">
                    <div class="topic">Podcast</div>
                    <div class="des">
                        podcast text.................................................
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>

            
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
    <!-------------------Quarterly Thumbnails------------------------------------>
            <div class="item quarterly">
                <img src="training_res/img/business.webp">
                <div class="content">
                    <div class="title">
                        Fundamentals Of investments
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>

            <div class="item quarterly">
                <img src="training_res/img/business.webp">
                <div class="content">
                    <div class="title">
                        Retirement Planning
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>

    <!-------------------Corporate Thumbnails------------------------------------>
            
            <div class="item corporate">
                <img src="training_res/img/business.webp">
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
                <img src="training_res/img/chama2.webp">
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
                <img src="training_res/img/business.webp">
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
                <img src="training_res/img/people.webp">
                <div class="content">
                    <div class="title">
                        Prosperity Fundamentals
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
    <!-------------------Wealth Wave Thumbnails------------------------------------>
            <div class="item wealth_wave">
                <img src="training_res/img/people.webp">
                <div class="content">
                    <div class="title">
                        Wealth wave Talks
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item wealth_wave">
                <img src="training_res/img/people.webp">
                <div class="content">
                    <div class="title">
                        BI-weekly Asset Class
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item wealth_wave">
                <img src="training_res/img/trustee.webp">
                <div class="content">
                    <div class="title">
                        Podcast
                    </div>
                    <div class="description">
                        Description
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
                      <label for="exampleInputEmail1" class="form-label pb-3">Enter your email and we'll send you more information.</label>
                      <input type="email" name="email" placeholder="Your Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Subscribe</button>
              </form>
              </div>
              <div class="copyright pt-4 text-center text-muted">
              <p>&copy; {{ date('Y') }} ZURIT CONSULTING</p>
                
            </div>
          </div>
        </footer>

    <script>
        // navbar background change
        let navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
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
    item.onclick = function() {
        showSlider(index);
    }
});
let runTimeOut;
let runNextAuto = setTimeout(() => {
    next.click();
}, timeAutoNext)

function showSlider(index){
    let  SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
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

// divide items into classes
window.onload = function() {
        filterItems('individual');
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

buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Remove the 'active' class from all buttons
        buttons.forEach(function(btn) {
            btn.classList.remove('active');
        });

        // Add the 'active' class to the clicked button
        this.classList.add('active');
    });
});

// see more button
document.querySelectorAll('.see-more').forEach(function(button) {
    button.addEventListener('click', function() {
        var training = this.closest('.individual');
        var title = training.querySelector('.title').textContent;
        var topic = training.querySelector('.topic').textContent;        

        
        document.getElementById('modalTrainingName').textContent = title;
        document.getElementById('modalTrainingTopic').textContent = topic;        

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

</script>
      
</body>    
    