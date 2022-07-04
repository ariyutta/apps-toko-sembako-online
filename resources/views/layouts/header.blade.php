<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ $title_admin }} | Penjualanan Sembako</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="#">

        <!--Morris Chart-->
        <link rel="stylesheet" href="{{ asset('assets/libs/morris-js/morris.css') }}" />

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        {{-- Datatable CSS --}}
        <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />

        <!-- dropify -->
        <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Plugins css -->
        <link href="{{ asset('assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('css/loading.css') }}" rel="stylesheet" type="text/css" />

        <!-- Plugins css -->
        <link href="{{ asset('assets/libs/x-editable/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />

        @yield('css')
    </head>
        <div class="loading">Loading&#8230;</div>