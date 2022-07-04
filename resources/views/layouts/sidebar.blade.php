<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" class="rounded-circle img-thumbnail avatar-lg">
            <div class="dropdown">
                <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted"><span>({{ Auth::user()->role_user->role->display_name }})</span></p>
        </div>

        <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul class="metismenu" id="side-menu">
                    
                    {{-- Developer --}}
                        <li class="menu-title">Admin Panel</li>
                        <li><a href="{{ url('dashboard') }}"><i class="fas fa-tachometer-alt"></i><span> Dashboard </span></a></li>
                        <li><a href="{{ url('dashboard/admins/data_pemasok') }}"><i class="fas fa-truck-loading mr-2"></i> Data Pemasok</a></li>
                        <li><a href="{{ url('dashboard/admins/data_kategori') }}"><i class="fas fa-tags mr-2"></i> Data Kategori</a></li>
                        <li><a href="{{ url('dashboard/admins/data_barang') }}"><i class="fas fa-th-list mr-2"></i> Data Barang</a></li>
                        <li><a href="{{ url('dashboard/admins/data_pesanan') }}"><i class="fas fa-window-restore mr-2"></i> Data Pesanan</a></li>
                        <li><a href="{{ url('dashboard/admins/verifikasi_pembayaran') }}"><i class="fas fa-money-check mr-2"></i> Verifikasi Pembayaran</a></li>
                        <li><a href="{{ url('dashboard/admins/laporan') }}"><i class="fas fa-chart-bar"></i><span> Laporan </span></a></li>
                </ul>
            </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->