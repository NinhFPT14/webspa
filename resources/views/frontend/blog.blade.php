@extends('frontend.layouts.master')
@section('title')
Bài viết
@endsection
@section('content')
<!--Fontawesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="assets/css/plugins.css">
<!-- fdsgs -->
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index-5.html">Trang Chủ</a></li>
                            <li><a href="blog.html">Bài Viết</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog area start-->
    <div class="main_blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="blog_wrapper">
                        <div class="blog_header">
                            <h1>Tin Tức</h1>
                        </div>
                        <div class="single_blog">
                            <div class="blog_title">
                                <h2><a href="#">Demo1</a></h2>
                                <div class="blog_post">
                                    <ul>
                                        <li class="post_author">Đăng bởi : admin</li>
                                        <li class="post_date"> Mar102015 </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog_container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5">
                                        <div class="blog_thumb">
                                            <a href="blog-details.html"><img src="frontEnd/img/blog/blog1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-7">
                                        <div class="blog_content">
                                            <p class="blog_desc">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Debitis inventore are id cumque dolore, ex dolor unde iste sunt,
                                                eos amet maxime sit dolore tortor?</p>
                                            <a href="{{route('detailBlog')}}">Đọc Thêm</a>
                                            <div class="blog_footer">
                                                <div class="blog_social">
                                                    <h3>Chia sẻ với</h3>
                                                    <ul>
                                                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#" title="Facebook"><i
                                                                    class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#" title="Facebook"><i
                                                                    class="fa fa-pinterest"></i></a></li>
                                                        <li><a href="#" title="Facebook"><i
                                                                    class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#" title="Facebook"><i
                                                                    class="fa fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_categories">
                            <h2>Danh Mục Bài Viết</h2>
                            <ul>
                                <li>
                                    <a href="#">Creative <span>(6)</span></a>
                                </li>
                                <li>
                                    <a href="#">Fashion <span>(10)</span></a>
                                </li>
                               

                            </ul>
                        </div>
                        <div class="widget_list widget_search mb-30">
                            <h2>Tìm Kiếm</h2>
                            <form action="#">
                                <input placeholder="Tìm Kiếm.." type="text">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                      
                    </div>
                </div>
                <div class="col-12">
                    <!--blog pagination area start-->
                    <div class="blog_pagination mt-60">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                              
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--blog pagination area end-->
                </div>
            </div>
        </div>
    </div>
    <!--blog area end-->
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
