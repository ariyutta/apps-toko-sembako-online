@include('layouts.header')
    <body class="left-side-menu-dark">
        <div id="wrapper">
            @include('sweetalert::alert')
            @include('layouts.navbar')
            @include('layouts.sidebar')
                <div class="content-page">
                    <div class="content">
                        <div class="container-fluid">
                            <!-- start page title -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box">
                                            @yield('title')
                                        </div>
                                    </div>
                                </div>
                            <!-- end page title -->
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.footer')
            

    