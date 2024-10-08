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

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

<!-- knob plugin -->
<script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

<!--Morris Chart-->
<script src="{{ asset('assets/libs/morris-js/morris.min.js') }}"></script>
<script src="{{ asset('assets/libs/raphael/raphael.min.js') }}"></script>

<!-- Dashboard init js-->
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ asset('assets_us/libs/select2/select2.min.js') }}"></script>

<!-- datatable js -->
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- dropify js -->
<script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>

<!-- form-upload init -->
<script src="{{ asset('assets/js/pages/form-fileupload.init.js') }}"></script>

<!-- App js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Plugins js -->
<script src="{{ asset('assets/libs/katex/katex.min.js') }}"></script>
<script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>

<!-- init js -->
<script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>

<!-- Plugins js -->
<script src="{{ asset('assets/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/libs/x-editable/bootstrap-editable.min.js') }}"></script>

<!-- Init js-->
<script src="{{ asset('assets/js/pages/form-xeditable.init.js') }}"></script>

@yield('js')

<script>
    $(".loading").hide();

    $(document).ready(function() {
        $('#barang_id').select2();
    });

    $(document).ready(function() {
        $('#pemasok_id').select2();
    });
    
    function hapus_data_pemasok(id_pemasok) {
        Swal.fire({
                title: "Hapus Pemasok",
                text: "Apakah anda ingin menghapus Data Pemasok ini?",
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
                    $.get("{{ url(''.Auth::user()->role_user->role->name.'/data_pemasok/hapus_data') }}/" +id_pemasok);
                    location.reload();
                }
            })
        }

    function hapus_data_kategori(id_kategori) {
        Swal.fire({
                title: "Hapus Kategori",
                text: "Apakah anda ingin menghapus Data Kategori ini?",
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
                    $.get("{{ url(''.Auth::user()->role_user->role->name.'/data_kategori/hapus_data') }}/" +id_kategori);
                    location.reload();
                }
            })
        }
    
    function hapus_data_barang(id_barang) {
        Swal.fire({
                title: "Hapus Barang",
                text: "Apakah anda ingin menghapus Data Barang ini?",
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
                    $.get("{{ url(''.Auth::user()->role_user->role->name.'/data_barang/hapus_data') }}/" +id_barang);
                    location.reload();
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

    function verifikasi_pembayaran(id_verif_bayar) {
        Swal.fire({
                title: "Verifikasi Pembayaran",
                text: "Apakah anda ingin melakukan verifikasi pada Kode Pesanan ini?",
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
                    $.get("{{ url(''.Auth::user()->role_user->role->name.'/verifikasi_pembayaran/verif') }}/" +id_verif_bayar);
                    location.reload();
                }
            })
        }
    
    function batalkan_pembayaran(id_batal_bayar) {
        Swal.fire({
                title: "Batalkan Pembayaran",
                text: "Apakah anda ingin melakukan batal pembayaran pada Kode Pesanan ini?",
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
                    $.get("{{ url(''.Auth::user()->role_user->role->name.'/verifikasi_pembayaran/batal') }}/" +id_batal_bayar);
                    location.reload();
                }
            })
        }

    function hapus_data_payment(id_payment) {
        Swal.fire({
                title: "Hapus Payment",
                text: "Apakah anda ingin menghapus Data Payment ini?",
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
                    $.get("{{ url(''.Auth::user()->role_user->role->name.'/data_payment/hapus_data') }}/" +id_payment);
                    location.reload();
                }
            })
        }
</script>

</body>
</html>