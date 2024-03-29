<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Revolve - Personal Magazine blog Template</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- theme meta -->
    <meta name="theme-name" content="revolve" />

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- THEME CSS
 ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Themify -->
    <link rel="stylesheet" href="{{ asset('plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick.css') }}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/magnific-popup/magnific-popup.css') }}">
    <!-- manin stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header class="header-top bg-grey justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-4 text-center d-none d-lg-block">
                    <a class="navbar-brand " href="index.html">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid">
                    </a>
                </div>

                <div class="col-lg-8 col-md-12">
                    <nav class="navbar navbar-expand-lg navigation-2 navigation">
                        <a class="navbar-brand text-uppercase d-lg-none" href="#">
                            <img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="ti-menu"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul id="menu" class="menu navbar-nav mx-auto">
                                <li class="nav-item"><a href="{{ route('welcome') }}" class="nav-link">Home</a></li>
                                <li class="nav-item"><a href="{{ route('post.create') }}" class="nav-link">Post
                                        Blog</a></li>
                                <li class="nav-item"><a href="{{ route('profile.show') }}" class="nav-link">My Blog</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('comment.index') }}"
                                        class="nav-link">Comment</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Profile
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile Update</a>
                                        <div class="dropdown-divider"></div>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>

                            <ul class="list-inline mb-0 d-block d-lg-none">
                                <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="ti-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="ti-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <div class="header-socials-2 text-right d-none d-lg-block">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="slider mt-4">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-lg-12 col-sm-12 col-md-12 slider-wrap">
                    @foreach ($trending as $t)
                        <div class="slider-item">
                            <div class="slider-item-content">
                                <div class="post-thumb mb-4">
                                    <a href="{{ route('post.show', ['id' => $t->id]) }}">
                                        <img src="{{ asset('storage/image/' . $t->image) }}" alt=""
                                            class="img-fluid" style="height: 550px;">
                                    </a>
                                </div>

                                <div class="slider-post-content">
                                    <span
                                        class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">{{ $t->category }}</span>
                                    <h3 class="post-title mt-1"><a
                                            href="{{ route('post.show', ['id' => $t->id]) }}">{{ $t->title }}</a>
                                    </h3>
                                    <span
                                        class=" text-muted  text-capitalize">{{ \Carbon\Carbon::parse($t->created_at)->format('F d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        @foreach ($post as $p)
                            <div class="col-lg-3 col-md-6">
                                <article class="post-grid mb-5">
                                    <a class="post-thumb mb-4 d-block"
                                        href="{{ route('post.show', ['id' => $p->id]) }}">
                                        <img src="{{ asset('storage/image/' . $p->image) }}" alt=""
                                            class="img-fluid" style="width: 300px; height: 300px;">
                                    </a>
                                    <span
                                        class="cat-name text-color font-extra text-sm text-uppercase letter-spacing-1">{{ $p->category }}</span>
                                    <h3 class="post-title mt-1"><a
                                            href="{{ route('post.show', ['id' => $p->id]) }}">{{ $p->title }}</a>
                                    </h3>

                                    <span
                                        class="text-muted letter-spacing text-uppercase font-sm">{{ \Carbon\Carbon::parse($p->created_at)->format('F d, Y') }}</span>

                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="m-auto">
                    <div class="pagination mt-5 pt-4">
                        <ul class="list-inline">
                            {{ $post->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer-2 section-padding gray-bg pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="subscribe-footer text-center">
                        <div class="form-group mb-0">
                            <h2 class="mb-3">Subscribe Newsletter</h2>
                            <p class="mb-4">Subscribe my Newsletter for new blog posts , tips and info.
                            <p>
                            <div class="form-group form-row align-items-center mb-0">
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" placeholder="Email Address">
                                </div>
                                <div class="col-sm-3">
                                    <a href="#" class="btn btn-dark ">Subscribe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-btm mt-5 pt-4 border-top">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline footer-socials-2 text-center">
                            <li class="list-inline-item"><a href="#">Privacy policy</a></li>
                            <li class="list-inline-item"><a href="#">Support</a></li>
                            <li class="list-inline-item"><a href="#">About</a></li>
                            <li class="list-inline-item"><a href="#">Contact</a></li>
                            <li class="list-inline-item"><a href="#">Terms</a></li>
                            <li class="list-inline-item"><a href="#">Category</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="copyright text-center ">
                            @ copyright all reserved to <a href="https://themefisher.com/">themefisher.com</a>-2019
                            Distribution <a href="https://themewagon.com">ThemeWagon.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- THEME JAVASCRIPT FILES
================================================== -->
    <!-- initialize jQuery Library -->
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <!-- Bootstrap jQuery -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>
    <!-- Owl caeousel -->
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/slick-carousel/slick.min.js') }}"></script>
    <script src="{{ asset('plugins/magnific-popup/magnific-popup.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('plugins/instafeed-js/instafeed.min.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script src="{{ asset('plugins/google-map/gmap.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('js/custom.js') }}"></script>


</body>

</html>
