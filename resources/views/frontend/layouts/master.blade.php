<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/alista-preview/alista/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jun 2020 05:28:05 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="frontEnd/img/favicon.ico">

    {{-- <!-- CSS 
        {{-- scc --}}
<link rel="stylesheet" href="frontEnd/css/bootstrap.css">
<link rel="stylesheet" href="frontEnd/css/bootstrap.css.map">
<link rel="stylesheet" href="frontEnd/css/bootstrap.min.css">
<link rel="stylesheet" href="frontEnd/css/bootstrap.min.css.map">
<link rel="stylesheet" href="frontEnd/css/bootstrap-grid.css">
<link rel="stylesheet" href="frontEnd/css/bootstrap-grid.css.map">
<link rel="stylesheet" href="frontEnd/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="frontEnd/css/bootstrap-grid.min.css.map">
<link rel="stylesheet" href="frontEnd/css/bootstrap-reboot.css">
<link rel="stylesheet"  href="frontEnd/css/bootstrap-reboot.css.map">
<link rel="stylesheet"  href="frontEnd/css/bootstrap-reboot.min.css">
<link rel="stylesheet"  href="frontEnd/css/bootstrap-reboot.min.css.map">



{{-- ======= --}}
  
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('frontEnd/vendor/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="frontEnd/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="frontEnd/css/style.css">
    <link href="frontEnd/css/tailwind.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />


</head>

<body class="home-five_wrapper">

    <!--header area start-->
    @include('frontend.layouts.header')
    <!--header area end-->
    @yield('content')

    @include('frontend.layouts.footer')
    <!--footer area end-->

    <!-- JS
============================================ -->
   

</body>
<script src="frontEnd/js/plugins.js"></script>

<!-- Main JS -->
<script src="frontEnd/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('frontEnd/vendor/select2/js/select2.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.bundle.js.map')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.bundle.min.js.map')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.js.map')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js.map')}}"></script>
<!-- Plugins JS -->





@yield('page-script')

<!-- Mirrored from demo.hasthemes.com/alista-preview/alista/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jun 2020 05:28:21 GMT -->

</html>