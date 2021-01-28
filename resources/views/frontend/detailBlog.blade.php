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
                            <li><a href="{{route('detailBlog')}}">Chi Tiết Bài Viết</a></li>
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
                                <h2><a href="#">Blog image post</a></h2>
                                <div class="blog_post">
                                    <ul>
                                        <li class="post_author">Đăng Bởi : admin</li>
                                        <li class="post_date"> Mar102015	</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog_thumb">
                               <a href="#"><img src="frontEnd/img/blog/blog-big1.jpg" alt=""></a>
                           </div>
                            <div class="blog_content">
                                <div class="post_content">
                                    <p>Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.</p>
                                    <blockquote>
                                        <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.</p>
                                    </blockquote>
                                    <p>Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.</p>
                                    <p>Suspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis. Praesent pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan placerat justo ultricies vel. Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit. Curabitur sagittis quam quis consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque. Nunc ante quam, luctus et neque a, interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam. Suspendisse quis eros cursus, viverra urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis nunc. Curabitur vitae orci id nulla maximus maximus. Nunc pulvinar sollicitudin molestie.</p>
                                </div>
                                <div class="entry_content">
                                    <div class="post_meta">
                                        <span>Tags: </span>
                                        <span><a href="#">, fashion</a></span>
                                        <span><a href="#">, t-shirt</a></span>
                                        <span><a href="#">, white</a></span>
                                    </div>

                                    <div class="social_sharing">
                                        <p>Chia sẻ:</p>
                                        <ul>
                                            <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" title="Facebook"><i class="fab fa-youtube"></i></a></li>
                                            <li><a href="#" title="Facebook"><i class="fab fa-instagram-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                           </div>
                        </div>
                        <div class="related_posts">
                           <h3>Bài Viết Liên Quan</h3>
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_related">
                                        <div class="related_thumb">
                                            <a href="{{route('detailBlog')}}"><img src="frontEnd/img/blog/blog3.jpg" alt=""></a>
                                            
                                        </div>
                                        <div class="related_content">
                                           <h4><a href="{{route('detailBlog')}}">Post with Gallery</a></h4>
                                           <span><i class="fa fa-calendar" aria-hidden="true"></i> December 10, 2019 </span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                       </div> 
                        <div class="comments_area">
                            <div class="comments_box">
                            <h3>Bình Luận	</h3>
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="frontEnd/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">Admin</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span> 
                                    </div>
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure</p>
                                    <div class="comment_reply">
                                        <a href="#">Trả Lời</a>
                                    </div>
                                </div>

                            </div>
                            <div class="comment_list list_two">
                                <div class="comment_thumb">
                                    <img src="frontEnd/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">Demo</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span> 
                                    </div>
                                    <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur</p>
                                    <div class="comment_reply">
                                        <a href="#">Trả Lời</a>
                                    </div>
                                </div>
                            </div>
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="frontEnd/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">Admin</a></h5>
                                        <span>October 16, 2018 at 1:38 am</span> 
                                    </div>
                                    <p>Quisque orci nibh, porta vitae sagittis sit amet, vehicula vel mauris. Aenean at</p>
                                    <div class="comment_reply">
                                        <a href="#">Trả Lời</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="comments_form">
                                <h3>Bản có thể bình luận </h3>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">Bình Luận </label>
                                            <textarea name="comment" id="review_comment" ></textarea>
                                        </div> 
                                        <div class="col-lg-4 col-md-4">
                                            <label for="author">Tên</label>
                                            <input id="author"  type="text">

                                        </div> 
                                        <div class="col-lg-4 col-md-4">
                                            <label for="email">Email </label>
                                            <input id="email"  type="text">
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label for="email">Số điện thoại </label>
                                            <input id="email"  type="text">
                                        </div>
                                           
                                    </div>
                                    <button class="button" type="submit">Bình Luận</button>
                                 </form>    
                            </div>
                        </div>    
                         
                    </div>
                    <!--blog grid area start-->
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
                               <input placeholder="..." type="text">
                               <button type="submit"><i class="fa fa-search"></i></button>
                           </form>
                        </div>
                       
                   </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
