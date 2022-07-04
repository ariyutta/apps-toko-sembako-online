<!DOCTYPE html>
<html lang="en">
    @include('layouts.header_user')
    <body>
        @include('layouts.navbar_user')
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="wrapper">
            @include('sweetalert::alert')
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

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
        @include('layouts.modal_user')

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
        @include('layouts.footer_user')
    </body>
</html>