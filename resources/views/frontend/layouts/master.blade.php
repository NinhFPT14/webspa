<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <base href="{{asset('')}}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="frontEnd/img/favicon.ico">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="frontEnd/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="frontEnd/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="frontEnd/css/style.css">
    <link href="frontEnd/css/tailwind.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
    
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


<script src="{{asset('frontEnd/js/plugins.js')}}"></script>
<script src="{{asset('frontEnd/js/main.js')}}"></script>

<script src="{{asset('backEnd/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backEnd/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Main JS -->

<script src="{{asset('frontEnd/vendor/select2/js/select2.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.bundle.js.map')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.bundle.min.js.map')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.js.map')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js.map')}}"></script>
<script src="{{asset('frontEnd/js/dropzone.min.js')}}"></script>
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<!-- Plugins JS -->
@include('sweetalert::alert')
@yield('page-script')

</html>