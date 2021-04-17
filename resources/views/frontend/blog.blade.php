@extends('frontend.layouts.master')
@section('title')
Bài viết
@endsection
@section('content')
<!--Fontawesome-->


<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="">Trang Chủ</a></li>
                            <li><a href="{{route('listBlog')}}">Bài Viết</a></li>
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
                         <!-- Bắt đầu để tin ra các bài viết từ batabasse -->
                        @foreach($data as $value)
                        <div class="single_blog">
                            <div class="blog_title">
                                <div class="blog_post">
                                    <ul>
                                        <li class="post_author"></li>
                                        <li class="post_date"> {{ $value->created_at }} </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog_container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5">
                                        <div class="blog_thumb">
                                            <a href="{{route('detailBlog',['id'=> $value->id])}}"><img src="{{ $value->avatar }}" alt="{{ $value->title }}"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-7">
                                        <div class="blog_content">
                                            <p class="blog_desc">{!! $value->description !!}</p>
                                            <a href="{{route('detailBlog',['id'=> $value->id])}}">Đọc Thêm</a>
                                            <div class="blog_footer">
                                                <div class="blog_social">
                                                    <h3>Chia sẻ với</h3>
                                                    <ul>
                                                        <li><a href="#" title="Facebook"><i class="ion-social-facebook"></i></a></li>
                                                        <li><a href="#" title="youtube"><i class="ion-social-youtube"></i></a></li>
                                                        <li><a href="#" title="intagram"><i class="ion-social-instagram"></i></i></a></li>
                                                       
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_categories">
                            <h2>Danh Mục Bài Viết</h2>
                            <ul>
                            <?php
                             $category = DB::table('categories')->where('type',2)->where('status',0)->get();
                            ?>
                            @foreach($category as $item)
                            <?php
                             $post = DB::table('posts')->where('category_id',$item->id)->get();
                            ?>
                            <li>
                                <a href="{{route('danhmucbaiviet',['id'=> $item->id])}}">{{$item->name}}
                                    <span>({{count($post)}})</span></a>
                            </li>
                            @endforeach
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
                            {!!$data->links()!!}
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
