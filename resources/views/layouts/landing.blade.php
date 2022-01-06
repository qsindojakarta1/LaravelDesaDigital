<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">
    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('landing/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/assets/css/fontawesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/assets/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/assets/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/assets/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/assets/css/flaticon-set.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/assets/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/assets/css/jquery-ui.css') }}" rel="stylesheet" />
    <link href="{{ asset('landing/style.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/css/responsive.css') }}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->
    @stack('landing.head')
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Desa {{ $title ?? config('app.name','Laravel') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<style>
    body {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>

<body id="bdy">
    <!-- Start PreLoader 
    ============================================= -->
    <div class="se-pre-con"></div>
    <!-- Start PreLoader-->

    <!-- Start Header Top
    ============================================= -->
    <div class="header-top bg-3 py-4">
        <div class="container">
            <div class="header-top-info">
                <div class="email">
                    <ul class="header-top-list">
                        <li><i class="ti-email"></i>Support@website.com</li>
                        <li><a href="contact.html"><i class="ti-help"></i>Ask A Question</a></li>
                    </ul>
                </div>
                <div class="login-reg">
                    <ul class="header-top-list">
                        <li><a href="{{ route('login') }}"><i class="ti-user"></i>Login</a></li>
                        <li><a href="register.html"><i class="ti-user"></i>Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <!-- Start header
    ============================================= -->
    <header class="header">
        <div class="main-navigation">
            <nav id="navbar_top" class="navbar navbar-expand-lg">
                <div class="container g-0">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ getDesaFromUrl()->logo ?? asset('landing/assets/img/logo/logo.png') }}" class="logo-display" alt="thumb">
                        <img src="{{ asset('landing/assets/img/logo/black-logo.png') }}" class="logo-scrolled" alt="thumb">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="ti-menu-alt"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"> Beranda </a></li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Tentang
                                </a>
                                <ul class="dropdown-menu fade-up">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('sejarah') }}">
                                            Sejarah
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Kategori
                                </a>
                                <ul class="dropdown-menu fade-up">
                                    @foreach(App\Models\KategoriInformasi::get() as $data)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('kategori',$data->id) }}">
                                            {{ $data->nama }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}"> Gallery </a></li>
                            <li class="nav-item"><a class="nav-link" href="courses.html"> Unduh </a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Statistik
                                </a>
                                <ul class="dropdown-menu fade-up">
                                    <li><a class="dropdown-item" href="blog.html"> Blog</a></li>
                                    <li><a class="dropdown-item" href="single.html"> Blog Single</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div> <!-- navbar-collapse.// -->
                </div> <!-- container-fluid.// -->
            </nav>
        </div>
    </header>
    <!-- End header -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="/">Desa </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/*') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('antrian*') ? 'active' : '' }}" href="/antrian">Antrian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('aduan*') ? 'active' : '' }}" href="/aduan">Aduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('penilaian*') ? 'active' : '' }}" href="/penilaian">Penilaian</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="/login" class="btn btn-primary mx-3">Login</a>
                    <a href="/register" class="btn btn-outline-primary">Register</a>
                </div>
            </div>
        </div>
    </nav> -->

    <main class="main">
        @yield('content')
    </main>


    <div class="clearfix"></div>

    <!-- Start Footer
	============================================= -->
    <footer>
        <div class="footer-widget">
            <div class="container">
                <div class="footer-widget-wpr de-padding">
                    <div class="footer-widget-box about-us">
                        <h4 class="footer-widget-title">About Us</h4>
                        <div class="footer-icon mb-20">
                            <img src="{{ asset('landing/assets/img/logo/logo.png') }}" alt="thumb">
                        </div>
                        <p class="mb-20">
                            Affronting discretion as do is announcing. Now months esteem oppose nearer enable too six. as do nearer is announcing.
                        </p>
                        <div class="footer-adrs">
                            <ul>
                                <li>
                                    <i class="fas fa-street-view"></i>
                                    <span>730 Hillpark,florida USA</span>
                                </li>
                                <li>
                                    <i class="fas fa-phone-volume"></i>
                                    <span>0900 123456</span>
                                </li>
                                <li>
                                    <i class="fas fa-envelope-open"></i>
                                    <span>info@edumi.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Quick Links</h4>
                        <ul class="footer-list">
                            <li><a href="#"><span>SEO</span> Small Business</a></li>
                            <li><a href="#">Enterprise <span>SEO</span></a></li>
                            <li><a href="#"><span>SEO</span> local Servies</a></li>
                            <li><a href="#">National <span>SEO</span></a></li>
                            <li><a href="#">International <span>SEO</span></a></li>
                            <li><a href="#">Our Product</a></li>
                            <li><a href="#">Doucumentation</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">What we do?</a></li>
                        </ul>
                    </div>
                    <div class="footer-widget-box popular-course">
                        <h4 class="footer-widget-title">Popular Course</h4>
                        <ul class="footer-course">
                            <li>
                                <div class="footer-post d-flex align-items-center">
                                    <img src="{{ asset('landing/assets/img/singlepost/70x70.png') }}" alt="thumb">
                                    <div class="post-content">
                                        <a href="course-single.html">
                                            <h5>
                                                Is at purse tried jokes china.
                                            </h5>
                                        </a>
                                        <span class="footer-post-date">
                                            Free
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="footer-post d-flex align-items-center">
                                    <img src="assets/img/singlepost/70x70.png" alt="thumb">
                                    <div class="post-content">
                                        <a href="course-single.html">
                                            <h5>
                                                Is at purse tried jokes china.
                                            </h5>
                                        </a>
                                        <span class="footer-post-date">
                                            $10
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="footer-post d-flex align-items-center">
                                    <img src="assets/img/singlepost/70x70.png" alt="thumb">
                                    <div class="post-content">
                                        <a href="course-single.html">
                                            <h5>
                                                Is at purse tried jokes china.
                                            </h5>
                                        </a>
                                        <span class="footer-post-date">
                                            $15
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-widget-box">
                        <h4 class="footer-widget-title">Quick Contact</h4>
                        <div class="footer-contact">
                            <form>
                                <input class="inp input-1" type="text" placeholder="Your Name">
                                <input class="inp input-2" type="email" placeholder="Enter Mail">
                                <textarea class="inp input-3" placeholder="Message"></textarea>
                                <button type="submit" class="btn-1">Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <p class="mb-0">Copyright © 2021. All Rights Reserved <a href="#"> Templatebucket</a>.</p>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer-->

    <!-- Start Scroll top
	============================================= -->
    <a href="#bdy" id="scrtop" class="smooth-menu"><i class="ti-arrow-up"></i></a>
    <!-- End Scroll top-->
    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('landing/assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/bootstrap-menu.js') }}"></script>
    <script src="{{ asset('landing/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('landing/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('landing/assets/js/count-to.js') }}"></script>
    <script src="{{ asset('landing/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/main.js') }}"></script>
    @include('sweetalert::alert')
    @stack('landing.script')
</body>

</html>