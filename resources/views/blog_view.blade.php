@include('layouts.head')
<title>Blog</title>
<link rel="stylesheet" href="{{ asset('blogs_res/css/style.css') }}">

</head>

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

    @include('layouts.foot')
</body>

</html>
