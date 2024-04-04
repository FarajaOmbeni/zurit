<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
        <title>Our Blogs</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap"
            rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <!-- <link rel="stylesheet" href="home_res/css/style.css"> -->
        <link rel="stylesheet" href="{{ asset('blogs_res/css/style.css') }}?v={{ time() }}">
        <link rel="icon" href="{{ asset('home_res/img/ico_logo.webp') }}">

        <!-- PWA  -->
        <meta name="theme-color" content="#fff" />
        <link rel="apple-touch-icon" href="{{ asset('logo-white.png') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">
    </head>

    <body>
        @include('layouts.navbar')

        <div class="container mainmargin">
            <div class="row">
                <div class="main col-md-8" id="blog-container">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="card card-custom">
                                <img src="{{ asset('blogs_res/img/' . $blog->blog_image) }}" class="card-img-top"
                                    alt="Blog Image">
                                <!-- <div class="like_icon"><img src="{{ asset('blogs_res/img/like-icon.png') }}"></div> -->
                                <div class="card-body card-body-custom">

                                    <p class="post_text">Posted On: {{ $blog->created_at->format('d-m-Y') }}</p>
                                    <h2 class="most_text">{{ $blog->blog_title }}</h2>
                                    <p class="lorem_text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($blog->blog_message)), 400, $end = '...') }}
                                    </p>
                                    <div class="social_icon_main">
                                        <div class="social_icon">
                                            <ul>
                                                <li><a href="https://www.linkedin.com/company/zuritconsultingke"><i class="bi bi-linkedin"></i></a></li>
                                                <li><a href="https://www.facebook.com/ZuritConsultingKE/"><i class="bi bi-facebook"></i></a></li>
                                                <li><a href="https://twitter.com/ZuritConsulting"><i class="bi bi-twitter"></i></a></li>
                                                <li><a href="https://www.instagram.com/zuritconsultingke/"><i class="bi bi-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="read_bt">
                                        <a href="{{ route('blogdetails', ['slug' => $blog->slug]) }}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="sidebar col-md-4 fixed">
                    <div class="input-group input-group-sm mt-4">
                        <input type="text" class="form-control" aria-label="Small"
                            aria-describedby="inputGroup-sizing-sm">
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
                                <a
                                    href="{{ route('blogdetails', ['slug' => $recentBlog->slug, 'title' => \Illuminate\Support\Str::slug($recentBlog->blog_title)]) }}"><img
                                        src="{{ asset('blogs_res/img/' . $recentBlog->blog_image) }}"
                                        class="recent-blog-image" alt="Blog Image"></a>
                                <div>
                                    <a href="{{ route('blogdetails', ['slug' => $recentBlog->slug, 'title' => \Illuminate\Support\Str::slug($recentBlog->blog_title)]) }}"
                                        class="recent-blog-title">{{ $recentBlog->blog_title }}</a>
                                    <p class="lorem_text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags(html_entity_decode($recentBlog->blog_message)), 100, $end = '...') }}
                                    </p>
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

        <div class="pagination-container">
            {{ $blogs->links('vendor.pagination.custom') }}
        </div>





        @include('layouts.footer')
        </main>

        {{-- PWA --}}
        <script src="{{ asset('/sw.js') }}"></script>
        <script>
            if ("serviceWorker" in navigator) {
                // Register a service worker hosted at the root of the
                // site using the default scope.
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="home_res/js/addshadow.js"></script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '.pagination-links a', function(e) {
                    e.preventDefault();

                    var url = $(this).attr('href');

                    $.get(url, function(data) {
                        var newData = $(data);
                        var newBlogs = newData.find('#blog-container').html();
                        var newPagination = newData.find('.pagination-links').html();

                        $('#blog-container').html(newBlogs).addClass(
                            'animate__animated animate__slideInRight');
                        $('.pagination-links').html(newPagination);

                        // var contentHeight = $('#blog-container').outerHeight(true);
                        // var windowHeight = $(window).height();

                        // if (contentHeight < windowHeight) {
                        //     $('.pagination-container').css('position', 'absolute');
                        //     $('.pagination-container').css('bottom', '100px');
                        // } else {
                        //     $('.pagination-container').css('position', 'absolute');
                        //     $('.pagination-container').css('bottom', '300px');
                        // }
                    });
                });
            });
        </script>
    </body>

</html>
