<!-- Navigation Bar-->
<header id="topnav">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>

                {{-- <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <i class="fe-bell noti-icon"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="assets/images/users/user-1.jpg" class="img-fluid rounded-circle"
                                        alt="" />
                                </div>
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="assets/images/users/user-4.jpg" class="img-fluid rounded-circle"
                                        alt="" />
                                </div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);"
                            class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>
                </li> --}}

                <li class="dropdown notification-list mt-1">
                    <a class="nav-link dropdown-toggle  waves-effect"href="{{ url('home/keranjang') }}">
                        <i class="ti-shopping-cart fa-2x"></i>
                        @if($notif_cart != 0)
                            <h4><span class="badge badge-danger rounded-circle noti-icon-badge" style="margin-top:-5px ">{{ $notif_cart }}</span></h4>
                        @endif
                    </a>
                </li>

                @if(Auth::user() == Null)
                    <li class="dropdown notification-list">
                        <a href="{{ route('login') }}" class="nav-link dropdown-toggle nav-user mr-0 waves-effect">
                            <span class="pro-user-name ml-1">
                                Login
                            </span>
                        </a>
                    </li>
                    <li class="dropdown notification-list">
                        <a href="{{ route('register') }}" class="nav-link dropdown-toggle nav-user mr-0 waves-effect">
                            <span class="pro-user-name ml-1">
                                Register
                            </span>
                        </a>
                    </li>
                @else
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('gambar_profil/'. Auth::user()->gambar_profil) }}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>
        
                            <!-- item-->
                            <a href="{{ url('home/accounts') }}" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>My Account</span>
                            </a>
        
                            @if(Auth::user()->role_user->role_id == 3)
                                <!-- item-->
                                <a href="{{ url('home/status_pesanan') }}" class="dropdown-item notify-item">
                                    <i class="fas fa-comment-dollar"></i>
                                    <span>Status Pesanan</span>
                                </a>
                            @endif
        
                            <!-- item-->
                            <a href="{{ url('home/ubah_password') }}" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Ubah Password</span>
                            </a>
        
                            <div class="dropdown-divider"></div>
        
                            <!-- item-->
                            <button onclick="confirm_logout()" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </button>
                        </div>
                    </li>
                @endif
            </ul>
            
            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ url('/home') }}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('assets_us/images/logo-light.png') }}" alt="" height="16">
                        <!-- <span class="logo-lg-text-light">UBold</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">U</span> -->
                        <img src="{{ asset('assets_us/images/logo-sm.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

        </div> <!-- end container-fluid-->
    </div>
    <!-- end Topbar -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{ route('bahan_pokok') }}"><i class="mdi mdi-chart-donut-variant"></i>Bahan Pokok & Bumbu Dapur</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-chart-donut-variant"></i>Makanan <div class="arrow-down">
                            </div></a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('makanan_instan') }}"><i class="mdi mdi-chart-donut-variant"></i>&nbsp; Makanan Instan</a>
                            </li>
                            <li>
                                <a href="{{ route('makanan_ringan') }}"><i class="mdi mdi-chart-donut-variant"></i>&nbsp; Makanan Ringan</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="{{ route('minuman') }}"><i class="mdi mdi-chart-donut-variant"></i>Minuman</a>
                    </li>

                    <li class="has-submenu">
                        <a href="{{ route('kebersihan_rumah') }}"><i class="mdi mdi-chart-donut-variant"></i>Kebersihan Rumah</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-chart-donut-variant"></i>Perawatan <div class="arrow-down">
                            </div></a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('perawatan_tubuh') }}"><i class="mdi mdi-chart-donut-variant"></i>&nbsp; Perawatan Tubuh</a>
                            </li>
                            <li>
                                <a href="{{ route('perawatan_rambut') }}"><i class="mdi mdi-chart-donut-variant"></i>&nbsp; Perawatan Rambut</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->

</header>
<!-- End Navigation Bar-->