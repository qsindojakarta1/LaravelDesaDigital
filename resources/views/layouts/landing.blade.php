<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <div class="header-top bg-3 py-4" id="navbar">
        <div class="container">
            <div class="header-top-info">
                <div class="email">
                    <ul class="header-top-list">
                        <li><i class="ti-email"></i>{{ $desa->header->email ?? env('APP_NAME') }}</li>
                        <li><a href="#"><i class="ti-map"></i>{{ getDesaFromUrl()->alamat }}</a></li>
                    </ul>
                </div>
                <div class="login-reg">
                    <ul class="header-top-list">
                        <li><a href="{{ route('login') }}"><i class="ti-user"></i>Login</a></li>
                        <li><a href="{{ route('register') }}"><i class="ti-user"></i>Register</a></li>
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
                        <img src="{{ getDesaFromUrl()->light_logo ? asset('storage/'.getDesaFromUrl()->light_logo) : asset('landing/assets/img/logo/logo.png') }}"
                            class="logo-display" width="100" alt="thumb">
                        <img src="{{ getDesaFromUrl()->dark_logo ? asset('storage/'.getDesaFromUrl()->dark_logo) : asset('landing/assets/img/logo/black-logo.png') }}"
                            class="logo-scrolled" width="100" alt="thumb">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="ti-menu-alt"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"> Beranda </a></li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Laman
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
                                    @forelse(App\Models\Page::where('desa_id',getDesaFromUrl()->id)->get() as $data)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('page.show',$data->id) }}">
                                            {{ $data->judul }}
                                        </a>
                                    </li>
                                    @empty
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            tidak ada page di {{ getDesaFromUrl()->nama_desa }}
                                        </a>
                                    </li>
                                    @endforelse
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Informasi
                                </a>
                                <ul class="dropdown-menu fade-up">
                                    @forelse(App\Models\KategoriInformasi::where('desa_id',getDesaFromUrl()->id)->get()
                                    as $data)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('kategori',$data->id) }}">
                                            {{ $data->nama }}
                                        </a>
                                    </li>
                                    @empty
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            tidak ada kategori di {{ getDesaFromUrl()->nama_desa }}
                                        </a>
                                    </li>
                                    @endforelse
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}"> Galeri </a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('dokumen') }}"> Unduh </a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Statistik
                                </a>
                                <ul class="dropdown-menu fade-up">
                                    <li><a class="dropdown-item" href="{{ route('statistik.pekerjaan') }}">
                                            pekerjaan</a></li>
                                    <li><a class="dropdown-item" href="{{ route('statistik.jenis_kelamin') }}"> jenis
                                            kelamin</a></li>
                                    <li><a class="dropdown-item" href="{{ route('statistik.kelompok_umur') }}">kelompok
                                            umur</a></li>
                                    <li><a class="dropdown-item" href="{{ route('statistik.agama') }}">agama</a></li>
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
                        <h4 class="footer-widget-title">Tentang {{ getDesaFromUrl()->nama_desa }}</h4>
                        <div class="footer-icon mb-20">
                            <img src="{{ getDesaFromUrl()->light_logo ? asset('storage/'.getDesaFromUrl()->light_logo) : asset('landing/assets/img/logo/logo.png') }}"
                                width="100" alt="thumb">
                        </div>
                        <p class="mb-20">
                            {{ getDesaFromUrl()->footer->tentang ?? 'Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Tempore aperiam quisquam, distinctio dolore quis sunt ex id rerum ipsam explicabo
                            sapiente totam adipisci nesciunt iste libero quia repellendus voluptatem ipsum!' }}
                        </p>
                        <div class="footer-adrs">
                            <ul>
                                <li>
                                    <i class="fas fa-street-view"></i>
                                    <span>{{ getDesaFromUrl()->footer->alamat ?? '730 Hillpark,florida USA' }}</span>
                                </li>
                                <li>
                                    <i class="fas fa-phone-volume"></i>
                                    <span>{{ getDesaFromUrl()->footer->telepon ?? '0900 123456' }}</span>
                                </li>
                                <li>
                                    <i class="fas fa-envelope-open"></i>
                                    <span>{{ getDesaFromUrl()->footer->email ?? 'info@edumi.com' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Navigasi</h4>
                        <ul class="footer-list">
                            <li><a href="{{ route('antrian') }}">Pembuatan Surat</a></li>
                            <li><a href="{{ route('home') }}">Beranda</a></li>
                            <li><a href="{{ route('produk') }}">Produk Warga</a></li>
                            <li><a href="{{ route('gallery') }}">Galeri</a></li>
                            <li><a href="{{ route('aduan') }}">Lapor</a></li>
                            <li><a href="{{ route('dokumen') }}">Unduh</a></li>
                        </ul>
                    </div>
                    <div class="footer-widget-box popular-course">
                        <h4 class="footer-widget-title">Informasi</h4>
                        <ul class="footer-course">
                            @forelse(App\Models\Informasi::where('desa_id',getDesaFromUrl()->id)->latest()->take(3)->get()
                            as $data)
                            <li>
                                <div class="footer-post d-flex align-items-center">
                                    <img src="{{ asset('storage/'.$data->thumbnail) }}" width="100" alt="thumb">
                                    <div class="post-content">
                                        <a href="course-single.html">
                                            <h5>
                                                {{ $data->judul }}
                                            </h5>
                                        </a>
                                        <span class="footer-post-date">
                                            <small>
                                                {{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
                                            </small>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            @empty
                            <li>
                                <div class="footer-post d-flex align-items-center">
                                    <div class="post-content">
                                        <h5>
                                            Tidak Ada Informasi . . .
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="footer-widget-box">
                        <h4 class="footer-widget-title">Visitor</h4>
                        <div class="footer-contact">
                            <div class="card p-4">
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <th>pengunjung hari ini</th>
                                            <th>{{
                                                App\Models\Visitor::where('desa_id',getDesaFromUrl()->id)->whereDate('created_at',Carbon\Carbon::now()->format('Y-m-d'))->count()
                                                }}</th>
                                        </tr>
                                        <tr>
                                            <th>pengunjung kemarin</th>
                                            <th>{{
                                                App\Models\Visitor::where('desa_id',getDesaFromUrl()->id)->whereDate('created_at',Carbon\Carbon::yesterday()->format('Y-m-d'))->count()
                                                }}</th>
                                        </tr>
                                        <tr>
                                            <th>total pengunjung</th>
                                            <th>{{ App\Models\Visitor::where('desa_id',getDesaFromUrl()->id)->count() }}
                                            </th>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <p class="mb-0">Copyright © 2021. All Rights Reserved <a href="#"> {{ env('APP_NAME') }}</a>.</p>
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
    <input type="hidden" id="forwhat" value="{{ getDesaFromUrl()->header->color ?? '' }}">
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
    <script>
        $('#navbar').css('background-color', $('#forwhat').val())
    </script>
    @include('sweetalert::alert')
    @stack('landing.script')
</body>

</html>