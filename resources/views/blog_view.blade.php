<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams"> 
    <title>Blog_test</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<nav class="navbar nav-dark navbar-expand-lg fixed-top py-3">
<div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('img/logo-white3.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
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

      <div class="container mainmargin">
    <div class="row">
        <div class="main col-md-8">
            <div class="card card-custom">
                <img src="{{ asset('blogs_res/img/' . $blog->blog_image) }}" class="card-img-view" alt="Blog Image">
                <div class="card-body card-body-custom">
                    <p class="post_text">Posted On: {{ $blog->created_at->format('d-m-Y') }}</p>
                    <h2 class="most_text">{{ $blog->blog_title }}</h2>
                    <p class="lorem_text">{!! (html_entity_decode($blog->blog_message)) !!}</p>
                    <div class="social_icon_main">
                        <div class="social_icon">
                            <ul>
                                <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                                <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar col-md-4  end-0">
            <div class="input-group input-group-sm mt-4">
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                <div class="input-group-append">
                    <span class="input-group-text color" id="inputGroup-sizing-sm">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
            <div class="recent-post">
                <h4>Recent Posts</h4>
                @foreach ($recentBlogs as $recentBlog)
                            <div class="blog-post">
                            <a href="{{ route('blog.view', ['id' => $recentBlog->id, 'title' => \Illuminate\Support\Str::slug($recentBlog->blog_title)]) }}"><img src="{{ asset('blogs_res/img/' . $recentBlog->blog_image) }}" class="recent-blog-image" alt="Blog Image"></a>                                <div>
                            <a href="{{ route('blog.view', ['id' => $recentBlog->id, 'title' => \Illuminate\Support\Str::slug($recentBlog->blog_title)]) }}" class="recent-blog-title">{{ $recentBlog->blog_title }}</a>
                                    <p class="lorem_text">{{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($recentBlog->blog_message)), 100, $end='...') }}</p>
                                </div>
                            </div>
                @endforeach
                <h4>Our Values</h4>
                <ul class="text-list">
                    <li>Excellence</li>
                    <li>Innovation</li>
                    <li>Collaboration</li>
                    <li>Accountability</li>
                    <li>Impact</li>
                </ul>
            </div>
        </div>
    </div>
</div>
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
</body>
</html>
