<head>
    <meta charset="utf-8" />
    <title>{{ $title_user }} | Penjualanan Sembako</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets_us/images/favicon.ico') }}">

    <!--Morris Chart-->
    <link rel="stylesheet" href="{{ asset('assets_us/libs/morris-js/morris.css') }}" />

    <!-- dropify -->
    <link href="{{ asset('assets_us/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('assets_us/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets_us/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets_us/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    {{-- Datatable CSS --}}
    <link href="{{ asset('assets_us/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets_us/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets_us/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets_us/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets_us/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>