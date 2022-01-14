<!-- Loader -->
<div id="loading">
    <img src="../../../assets/img/loader1.svg" class="loader-img" alt="Loader">
</div>

<!-- main-header -->
<div class="main-header">
    <div class="container-fluid">
        <div class="main-header-left">
            <!--logo-->
            <div>
                <a class="main-logo desktop-logo" href="index.html"><img width="50" src="{{ getDesaFromUrl()->light_logo ? asset('storage/'.getDesaFromUrl()->light_logo) : asset('assets/img/brand/logo-1.png') }}" alt="logo"></a>
                <a class="main-logo mobile-logo" href="index.html"><img width="50" src="{{ getDesaFromUrl()->light_logo ? asset('storage/'.getDesaFromUrl()->light_logo) : asset('assets/img/brand/icon-1.png') }}" alt="logo"></a>
                <a class="main-logo dark-theme-logo" href="index.html"><img width="50" src="{{ getDesaFromUrl()->light_logo ? asset('storage/'.getDesaFromUrl()->light_logo) : asset('assets/img/brand/logo-1-dark.png') }}" alt="logo"></a>
            </div>
            <!--/logo-->
            <!-- sidebar-toggle-->
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
            </div>
            <!-- /sidebar-toggle-->
            <div class="header-formsearch">
                <input class="form-control" placeholder="Search" type="search">
                <button class="btn"><i class="fe fe-search"></i></button>
            </div>
        </div>
        <div class="main-header-right ml-auto">
            <div class="dropdown main-header-search mobile-search">
                <a class="new header-link" href="">
                    <i class="header-icons" data-eva="search-outline"></i>
                </a>
                <div class="dropdown-menu">
                    <div class="p-2 main-form-search">
                        <input class="form-control" placeholder="Search here..." type="search">
                        <button class="btn"><i class="fe fe-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="main-header-fullscreen fullscreen-button">
                <a href="#" class="header-link">
                    <i class="header-icons" data-eva="expand-outline"></i>
                </a>
            </div>
            <div class="dropdown main-profile-menu">
                <a class="main-img-user" href="">
                    <img alt="" src="{{ getDesaFromUrl()->light_logo ? asset('storage/'.getDesaFromUrl()->light_logo) : asset('assets/img/users/male/1.jpg') }}">
                </a>
                <div class="dropdown-menu">
                    <div class="main-header-profile">
                        <h6>Admin</h6>
                        <span>Administrator</span>
                    </div>
                    <a class="dropdown-item" href="#"><i class="si si-user"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="si si-envelope-open"></i> Inbox</a>
                    <a class="dropdown-item" href="#"><i class="si si-calendar"></i> Activity</a>
                    <a class="dropdown-item" href="#"><i class="si si-bubbles"></i> Chat</a>
                    <a class="dropdown-item" href="#"><i class="si si-settings"></i> Settings</a>
                    <a class="dropdown-item" href="#" onclick="logoutform()"><i class="si si-power"></i> Log Out</a>
                    <form action="{{ route('logout') }}" method="post" id="logout-form">
                        @csrf
                    </form>

                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
            <div class="main-header-sidebar-notification">
                <a href="#" class="header-link" data-toggle="sidebar-right" data-target=".sidebar-right">
                    <i class="header-icons" data-eva="options-2-outline"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    function logoutform() {
        let yes = confirm('Are You Sure')
        if (yes) {
            $('#logout-form').submit()
        }
    }
</script>
<!--/main-header-->