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

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('gambar_profil/'.Auth::user()->gambar_profil) }}" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ml-1">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> 
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Pengaturan</h6>
                </div>

                <!-- item-->
                <a href="{{ url(''.Auth::user()->role_user->role->name.'/accounts') }}" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="{{ url(''.Auth::user()->role_user->role->name.'/ubah_password') }}" class="dropdown-item notify-item">
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
        <a href="{{ url(''.Auth::user()->role_user->role->name.'') }}" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset('logo.png') }}" alt="" height="60">
                <!-- <span class="logo-lg-text-light">Xeria</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">X</span> -->
                <img src="{{ asset('logo.png') }}" alt="" height="60">
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