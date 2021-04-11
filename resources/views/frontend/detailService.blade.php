@extends('frontend.layouts.master')
@section('title')
Chi tiết dịch vụ
@endsection
@section('content')

<div class="breadcrumbs_area">

        <div class="container">   
            <div class="row">

                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index-5.html">Trang Chủ</a></li>
                            <li><a href="">Dịch vụ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
</div>
    <!--kết thúc link bar-->
    
    <!-- chi tiết dịch vụ -->
    <div class="main_blog_area blog_fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog_left_area">
                        <div class="single_blog">   
                            <div class="blog_title">
                                <h2><a href="#">{{ $service->name }}</a></h2>
                            </div>
                            <div class="blog_container">
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img src="{{ $service->image }}" alt=""></a>
                                </div>
                                <div class="blog_content">
                                <p></p>
                                    {!! $service->description !!}
                                    {!! $service->detail !!}
                                    <div class="blog_footer">
                                        <div class="blog_social">
                                            <h3>Share this post</h3>
                                            <ul>
                                                <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" title="Facebook"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" title="Facebook"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#" title="Facebook"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#" title="Facebook"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!--blog pagination area start-->
                    <div class="blog_pagination">
                        <div class="pagination">
                            <ul>
                                
                            </ul>
                        </div>
                    </div>
                    <!--blog pagination area end-->
                </div>
            </div>
        </div>
    </div>
    <!-- chi tiết dịch vụ -->

@endsection
