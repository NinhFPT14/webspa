@extends('frontend.layouts.master')
@section('title')
Chi tiết bài viết
@endsection
@section('content')
  <!--breadcrumbs area start-->
  <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('home')}}">Trang Chủ</a></li>
                            <li>Chi Tiết Bài Viết</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--blog body area start-->
    <div class="main_blog_area blog_details">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_details_wrapper">
                        <div class="single_blog">
                            <div class="blog_title">
                                <h2><a href="#">{{ collect($detail)->first()->title }}</a></h2>
                                <div class="blog_post">
                                    <ul>
                                        <li class="post_author"></li>
                                        <li class="post_date"> Ngày đăng tải{{ collect($detail)->first()->created_at }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog_thumb">
                               <a href="#"><img src="{{ collect($detail)->first()->avatar }}" alt="{{ collect($detail)->first()->avatar }}"></a>
                           </div>
                            <div class="blog_content">
                                <div class="post_content">
                                    {!!
                                        collect($detail)->first()->detail
                                    !!}
                                </div>
                                <div class="entry_content">
                                    <div class="post_meta">
                                        <span>Tags: </span>
                                        <?php
                                             $category = DB::table('categories')->where('type',2)->where('status',0)->get();
                                            ?>
                                            @foreach($category as $item)
                                            <?php
                                             $post = DB::table('posts')->where('category_id',$item->id)->get();
                                            ?>
                                            <span><a href="#">{{$item->name}}</a></span>
                                            @endforeach
                                    </div>

                                    <div class="social_sharing">
                                        <p>Chia sẻ:</p>
                                        <ul>
                                            <li><a href="#" title="Facebook"><i class="ion-social-facebook"></i></a></li>
                                            <li><a href="#" title="Facebook"><i class="ion-social-youtube"></i></a></li>
                                            <li><a href="#" title="Facebook"><i class="ion-social-instagram"></i></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                           </div>
                        </div>
                        <div class="related_posts">
                           <h3>Bài Viết Liên Quan</h3>
                           <div class="row">
                            @foreach($lienquan as $key)
                            
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_related">
                                        <div class="related_thumb">
                                            <a href="{{route('detailBlog',['id'=>$key->id])}}"><img src="{{ $key->avatar }}" alt=""></a>
                                        </div>
                                        <div class="related_content">
                                           <h4><a href="{{route('detailBlog',['id'=>$key->id])}}">{{ $key->title }}</a></h4>
                                           <span><i class="fa fa-calendar" aria-hidden="true"></i> {{ $key->updated_at }} </span>
                                        </div>
                                    </div>
                                </div>
                            <@endforeach
                            </div>
                       </div> 
                       
                           
                        </div>    
                         
                    </div>
                    <!--blog grid area start-->
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
                                <a href="">{{$item->name}}
                                    <span>({{count($post)}})</span></a>
                            </li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="widget_list widget_search mb-30">
                           <h2>Tìm Kiếm Bài Viết</h2>
                           <form action="{{route('blog.search')}}" method="GET" >
                                @csrf
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Nhập từ khóa tìm kiếm...."
                                    aria-label="Search" aria-describedby="basic-addon2" name="name" >
                                    <button class="btn btn-primary" type="submit">
                                    </button>
                            </div>
                            </form> 
                        </div>
                       
                   </div>
                </div>
            </div>
                
        </div>
    </div>
</div>
    @endsection
