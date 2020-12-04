<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    {{-- <link rel="icon" href="images/favicon.png" type="image/x-icon"> --}}

    <link href="{{ asset('vendor/datatable/datatables.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/reload.css')}}" rel="stylesheet">

    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link href="{{ asset('css/select2.css')}}" rel="stylesheet">

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">


    @notifyCss

</head>


<body id="page-top">

    <div id="wrapper">

        @include('layouts.admin.menu')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @include('layouts.admin.header')

                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>
            <br>
            @include('layouts.admin.footer')

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('layouts.admin.reload')
    @include('layouts.admin.modals')
    @include('notify::messages')
    @include('acl::_msg')

    {{-- <script src="{{ asset('vendor/jquery/jquery.mask.js') }}"></script> --}}

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}" ></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
    @notifyJs
    @stack('scripts')

</body>

</html>
