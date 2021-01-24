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
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS 
    ========================= -->
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />


</head>

<body class="home-five_wrapper">

    <!--header area start-->
    @include('fontend.layouts.header')
    <!--header area end-->
    @yield('content')

    @include('fontend.layouts.footer')
    <!--footer area end-->

    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>



</body>


<!-- Mirrored from demo.hasthemes.com/alista-preview/alista/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jun 2020 05:28:21 GMT -->

</html>