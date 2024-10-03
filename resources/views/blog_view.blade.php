<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Firmbee.com - Free Project Management Platform for remote teams">
    <title>Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0e035b9984.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('blogs_res/css/style.css') }}">
    <link rel="icon" href="{{ asset('home_res/img/ico_logo.webp') }}">

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

<body>
    @include('layouts.navbar')

    <div class="container mainmargin">
        <div class="row">
            <div class="main col-md-8">
                <div class="card card-custom">
                    <img src="{{ asset('blogs_res/img/' . $blog->blog_image) }}" class="card-img-view" alt="Blog Image">
                    <div class="card-body card-body-custom">
                        <p class="post_text">Posted On: {{ $blog->created_at->format('d-m-Y') }}</p>
                        <h2 class="most_text">{{ $blog->blog_title }}</h2>
                        <p class="lorem_text">{!! html_entity_decode($blog->blog_message) !!}</p>
                        <div class="social_icon_main">
                            <div class="social_icon">
                                <ul>
                                    <li><a href="https://www.linkedin.com/company/zuritconsultingke"><i
                                                class="bi bi-linkedin"></i></a></li>
                                    <li><a href="https://www.facebook.com/ZuritConsultingKE/"><i
                                                class="bi bi-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/ZuritConsulting"><i class="bi bi-twitter"></i></a>
                                    </li>
                                    <li><a href="https://www.instagram.com/zuritconsultingke/"><i
                                                class="bi bi-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar col-md-4  end-0">
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
    @include('layouts.footer')

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
</body>

</html>
