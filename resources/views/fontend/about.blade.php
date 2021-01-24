@extends('fontend.layouts.master')
@section('title')
Giới thiệu
@endsection
@section('content')
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><a href="about.html">about us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <div class="about_page_section">
        <div class="container">
            <!--about section area -->
            <div class="about_section">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about_thumb">
                            <img src="assets/img/about/about1.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about_content">
                            <h1>Welcome To alista Store!</h1>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident ducimus id mollitia
                                quisquam accusamus recusandae enim dolorem vitae laborum amet molestiae, molestias
                                alias, neque impedit, assumenda corporis. Facere esse, error? Molestias explicabo
                                voluptate, odit excepturi molestiae pariatur facilis facere, sunt laborum earum tenetur
                                inventore! Error voluptatum iusto quidem officia, et omnis cupiditate rem, tenetur odit
                                explicabo adipisci totam, eius?</p>
                            <div class="view__work">
                                <a href="#">view work </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--about section end-->

            <!--counterup area -->
            <div class="counterup_section">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_counterup">
                            <div class="counter_img">
                                <img src="assets/img/about/count.png" alt="">
                            </div>
                            <div class="counter_info">
                                <h2 class="counter_number">2170</h2>
                                <p>happy customers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_counterup count-two">
                            <div class="counter_img">
                                <img src="assets/img/about/count2.png" alt="">
                            </div>
                            <div class="counter_info">
                                <h2 class="counter_number">8080</h2>
                                <p>AWARDS won</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_counterup">
                            <div class="counter_img">
                                <img src="assets/img/about/count3.png" alt="">
                            </div>
                            <div class="counter_info">
                                <h2 class="counter_number">2150</h2>
                                <p>HOURS WORKED</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_counterup count-two">
                            <div class="counter_img">
                                <img src="assets/img/about/count4.png" alt="">
                            </div>
                            <div class="counter_info">
                                <h2 class="counter_number">2170</h2>
                                <p>COMPLETE PROJECTS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--counterup end-->

            <!--about progress bar -->
            <div class="about_progressbar">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="progressbar_inner">
                            <h2>We have Skills to show</h2>
                            <div class="progress_skill one">
                                <div class="progress">
                                    <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s"
                                        data-wow-delay=".3s" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100">
                                        <span class="progress_persent">html/css</span>
                                    </div>
                                </div>
                                <span class="progress_discount">60%</span>
                            </div>
                            <div class="progress_skill two">
                                <div class="progress">
                                    <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s"
                                        data-wow-delay=".5s" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100">

                                        <span class="progress_persent">ecommerce theme </span>
                                    </div>

                                </div>
                                <span class="progress_discount">90%</span>
                            </div>
                            <div class="progress_skill three">
                                <div class="progress">
                                    <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s"
                                        data-wow-delay=".7s" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100">

                                        <span class="progress_persent">Typhography </span>
                                    </div>

                                </div>
                                <span class="progress_discount">70%</span>
                            </div>
                            <div class="progress_skill four">
                                <div class="progress">
                                    <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s"
                                        data-wow-delay=".7s" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100">

                                        <span class="progress_persent">Branding </span>
                                    </div>

                                </div>
                                <span class="progress_discount">80%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="about__img">
                            <img src="assets/img/about/about2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!--about progress bar end -->
        </div>
    </div>

    <!-- Call -->

    <div class="fix_tel">
        <div class="ring-alo-phone ring-alo-green ring-alo-show" id="ring-alo-phoneIcon"
            style="right: -7px; bottom: -12px;">
            <div class="ring-alo-ph-circle"></div>
            <div class="ring-alo-ph-circle-fill"></div>
            <div class="ring-alo-ph-img-circle">
                <a href="tel:0946673322"><img class="lazy" src="https://khomaythegioi.com/icon/goi.png" alt="G"></a>
            </div>
        </div>
        <div class="tel">

        </div>
    </div>

@endsection
