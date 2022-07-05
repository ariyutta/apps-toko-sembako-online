    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    Copyright &copy; Penjualanan Sembako 2022 | All Rights Reserved.
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        {{-- <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a> --}}
                        <a href="javascript:void(0);">Version 1.0</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

    <!-- Vendor js -->
    <script src="{{ asset('assets_us/js/vendor.min.js') }}"></script>

    <!-- knob plugin -->
    {{-- <script src="{{ asset('assets_us/libs/jquery-knob/jquery.knob.min.js') }}"></script> --}}

    <!--Morris Chart-->
    <script src="{{ asset('assets_us/libs/morris-js/morris.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/raphael/raphael.min.js') }}"></script>

    <!-- Dashboard init js-->
    <script src="{{ asset('assets_us/js/pages/dashboard.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('assets_us/js/app.min.js') }}"></script>
    <!-- App js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- dropify js -->
    <script src="{{ asset('assets_us/libs/dropify/dropify.min.js') }}"></script>

    <!-- form-upload init -->
    <script src="{{ asset('assets_us/js/pages/form-fileupload.init.js') }}"></script>

    <script src="{{ asset('assets_us/libs/select2/select2.min.js') }}"></script>

    <!-- datatable js -->
    <script src="{{ asset('assets_us/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets_us/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets_us/libs/pdfmake/vfs_fonts.js') }}"></script>

    <!-- Datatables init -->
    <script src="{{ asset('assets_us/js/pages/datatables.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#provinsi').select2();
        });

        $(document).ready(function() {
            $('#kota').select2();
        });

        function confirm_checkout() {
        Swal.fire({
                title: "Checkout",
                text: "Apakah anda ingin melakukan Checkout pada Pembelian ini?",
                icon: "question",
                showCancelButton: !0,
                confirmButtonText: "Ya!",
                cancelButtonText: "Batal!",
                confirmButtonClass: "btn btn-xl btn-success",
                cancelButtonClass: "btn btn-xl btn-danger ml-2",
                buttonsStyling: !1
            })
            .then(function(t) {
                if (t.value) {
                    $(".loading").show();
                    location.href = "{{ url('dashboard/checkout') }}"
                    var val = [];
                    $('.check-item:checked').each(function(i){
                        val[i] = $(this).val();
                    });

                    let data = {};
                    data.id_keranjang = val;

                    var numberOfChecked = $('.check-item:checked').length;

                    if( numberOfChecked != 0 ) {
                        // $.ajaxSetup({
                        //     headers: {
                        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //     }
                        // });
                        // $.ajax({
                        //     type: "POST",
                        //     url: "{{ url('dashboard/submit_checkout') }}",
                        //     data: data,
                        //     dataType: "JSON",
                        // })
                        // location.reload();
                    }
                }
            })
        }

        function confirm_pembayaran() {
        Swal.fire({
                title: "Pembayaran",
                text: "Apakah anda ingin melanjutkan Pembayaran pada Pembelian ini?",
                icon: "question",
                showCancelButton: !0,
                confirmButtonText: "Ya!",
                cancelButtonText: "Batal!",
                confirmButtonClass: "btn btn-xl btn-success",
                cancelButtonClass: "btn btn-xl btn-danger ml-2",
                buttonsStyling: !1
            })
            .then(function(t) {
                if (t.value) {
                    $(".loading").show();
                    location.href = "{{ url('/dashboard/pembayaran_pesanan') }}"
                }
            })
        }

        function confirm_logout() {
        Swal.fire({
                title: "Logout",
                text: "Apakah anda ingin logout dari halaman ini?",
                icon: "question",
                showCancelButton: !0,
                confirmButtonText: "Ya!",
                cancelButtonText: "Batal!",
                confirmButtonClass: "btn btn-xl btn-success",
                cancelButtonClass: "btn btn-xl btn-danger ml-2",
                buttonsStyling: !1
            })
            .then(function(t) {
                if (t.value) {
                    $(".loading").show();
                    location.href = "{{ url('/logout') }}"
                }
            })
        }

        function confirm_hapus_keranjang(id_keranjang) {
        Swal.fire({
                title: "Hapus Barang",
                text: "Apakah anda ingin menghapus barang ini dari daftar kerajang?",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Ya!",
                cancelButtonText: "Batal!",
                confirmButtonClass: "btn btn-xl btn-success",
                cancelButtonClass: "btn btn-xl btn-danger ml-2",
                buttonsStyling: !1
            })
            .then(function(t) {
                if (t.value) {
                    $(".loading").show();
                    $.get("{{ url('dashboard/hapus_keranjang') }}/" +id_keranjang);
                    location.reload();
                }
            })
        }

        function submit_pembayaran() {
        Swal.fire({
                title: "Pembayaran",
                text: "Apakah anda ingin melanjutkan Pembayaran pada Pembelian ini?",
                icon: "question",
                showCancelButton: !0,
                confirmButtonText: "Ya!",
                cancelButtonText: "Batal!",
                confirmButtonClass: "btn btn-xl btn-success",
                cancelButtonClass: "btn btn-xl btn-danger ml-2",
                buttonsStyling: !1
            })
            .then(function(t) {
                if (t.value) {
                    $(".loading").show();
                    location.href = "{{ url('/dashboard/submit_pembayaran') }}"
                }
            })
        }
    </script>