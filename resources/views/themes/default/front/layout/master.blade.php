<!DOCTYPE html>
<html @if (app()->getLocale()=='ar')
lang="ar" dir="rtl" 
@else lang="en" dir="ltr" 

@endif> 

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VEXA</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" type="text/css">
</head>

<body>
    {{-- Page Preloder --}}
    <div id="preloder">
        <div class="loader"></div>
    </div>

        
            @include('themes.default.front.partials.navbar') <!-- navbar partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content') <!-- content الخاص بالdashboard -->
                </div>
                @include('themes.default.front.partials.footer') <!-- footer partial -->
            </div>
       
    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('front/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
</body>