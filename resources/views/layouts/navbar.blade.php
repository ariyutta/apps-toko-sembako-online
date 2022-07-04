<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

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


        <li class="dropdown notification-list mt-1">
            <a class="nav-link dropdown-toggle  waves-effect"href="" target="_blank">
                <i class="fas fa-home fa-2x"></i>
            </a>
        </li>


        <li class="dropdown notification-list mt-1">
            <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fas fa-bell fa-2x"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-right">
                            <a href="#" class="text-dark">
                                <small>Tandai sudah dibaca</small>
                            </a>
                        </span>Notifikasi
                    </h5>
                </div>

                {{-- Log Notifikasi --}}
                <div class="slimscroll noti-scroll">
                </div>
                <!-- All-->
                <a href="#" class="dropdown-item text-center text-primary notify-item notify-all">
                    Tampilkan Semua
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> 
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Pengaturan</h6>
                </div>

                <!-- item-->
                <a href="#" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="#" class="dropdown-item notify-item">
                    <i class="fas fa-lock"></i>
                    <span>Ubah Password</span>
                </a>

                <div class="dropdown-divider"></div>

                    <button onclick="confirm_logout()" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </button>
                </div>
            </li>
        </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="16">
                <!-- <span class="logo-lg-text-light">Xeria</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">X</span> -->
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="16">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li>
            <h4 class="page-title-main"></h4>
        </li>

    </ul>
</div>
<!-- end Topbar -->