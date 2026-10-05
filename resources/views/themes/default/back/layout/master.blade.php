<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/popupwindows.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>
<body>
    <div class="container-scroller">
        @include('themes.default.back.partials.sidebar') <!-- sidebar partial -->
        <div class="container-fluid page-body-wrapper">
            @include('themes.default.back.partials.header') <!-- navbar partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content') <!-- content الخاص بالdashboard -->
                </div>
                @include('themes.default.back.partials.footer') <!-- footer partial -->
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js')}}"></script>
    <script src="{{ asset('assets/js/todolist.js')}}"></script>
    <script src="{{asset('assets/js/file-upload.js')}}"></script>
    <script src="{{asset('assets/js/typeahead.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>
    <script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>
    <script src="{{asset('assets/js/rolemodal.js')}}"></script>
    <script src="{{asset('assets/js/permissions.js')}}"></script>
    <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    




