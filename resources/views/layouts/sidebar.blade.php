<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('gambar_profil/'.Auth::user()->gambar_profil) }}" alt="user-img" class="rounded-circle img-thumbnail avatar-xl">
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
                    
                    {{-- Panel Menu --}}
                    @if(Auth::user()->role_user->role_id == 1)
                        <li class="menu-title">Developer Panel</li>
                    @elseif(Auth::user()->role_user->role_id == 2)
                        <li class="menu-title">Admin Panel</li>
                    @elseif(Auth::user()->role_user->role_id == 3)
                        <li class="menu-title">User Panel</li>
                    @endif
                        
                    @if(Auth::user()->role_user->role_id == 1)
                        <li><a href="{{ url(''.Auth::user()->role_user->role->name.'') }}"><i class="fas fa-tachometer-alt"></i><span> Dashboard </span></a></li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fas fa-chart-bar"></i>
                                <span> Data Master </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_pemasok') }}"><i class="fas fa-truck-loading mr-2"></i> Data Pemasok</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_kategori') }}"><i class="fas fa-tags mr-2"></i> Data Kategori</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_pembelian') }}"><i class="fas fa-window-restore mr-2"></i> Data Pembelian</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_barang') }}"><i class="fas fa-th-list mr-2"></i> Data Barang</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_pesanan') }}"><i class="fas fa-window-restore mr-2"></i> Data Pesanan</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_payment') }}"><i class="fas fa-window-restore mr-2"></i> Data Payment</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/verifikasi_pembayaran') }}"><i class="fas fa-money-check mr-2"></i> Verifikasi Pembayaran</a></li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fas fa-chart-bar"></i>
                                <span> Laporan </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/daftar_pelanggan') }}"><i class="fas fa-users mr-2"></i>Daftar Pelanggan</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/laporan_penjualan') }}"><i class="fas fa-chart-bar mr-2"></i>Laporan Penjualan</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/laporan_pembelian') }}"><i class="fas fa-chart-bar mr-2"></i>Laporan Pembelian</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/laporan_persediaan') }}"><i class="fas fa-chart-bar mr-2"></i>Laporan Persediaan</a></li>
                            </ul>
                        </li>
                        <li><a href="#" onclick="confirm_logout()"><i class="fe-log-out"></i><span> Logout </span></a></li>
                    
                    @elseif(Auth::user()->role_user->role_id == 2)
                        <li><a href="{{ url(''.Auth::user()->role_user->role->name.'') }}"><i class="fas fa-tachometer-alt"></i><span> Dashboard </span></a></li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fas fa-chart-bar"></i>
                                <span> Data Master </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_pemasok') }}"><i class="fas fa-truck-loading mr-2"></i> Data Pemasok</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_kategori') }}"><i class="fas fa-tags mr-2"></i> Data Kategori</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_barang') }}"><i class="fas fa-th-list mr-2"></i> Data Barang</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_pesanan') }}"><i class="fas fa-window-restore mr-2"></i> Data Pesanan</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/verifikasi_pembayaran') }}"><i class="fas fa-money-check mr-2"></i> Verifikasi Pembayaran</a></li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="fas fa-chart-bar"></i>
                                <span> Laporan </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/daftar_pelanggan') }}"><i class="fas fa-users mr-2"></i>Daftar Pelanggan</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/laporan_penjualan') }}"><i class="fas fa-chart-bar mr-2"></i>Laporan Penjualan</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/laporan_pembelian') }}"><i class="fas fa-chart-bar mr-2"></i>Laporan Pembelian</a></li>
                                <li><a href="{{ url(''.Auth::user()->role_user->role->name.'/laporan_persediaan') }}"><i class="fas fa-chart-bar mr-2"></i>Laporan Persediaan</a></li>
                            </ul>
                        </li>
                        <li><a href="#" onclick="confirm_logout()"><i class="fe-log-out"></i><span> Logout </span></a></li>
                    @endif
                </ul>
            </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->