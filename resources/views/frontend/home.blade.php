@extends('frontend.layouts.master')
@section('title')
Trang chủ
@endsection
@section('content')

<!--slider area start-->

<section class="slider_section slider_section_three">
    <div class="slider_area owl-carousel">
        @foreach ($slide as $value)
        <div class="single_slider d-flex align-items-center" data-bgimg="{{$value->image}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content slider_c_three">
                            <h1>{{$value->title}}</h1>
                            <p>{{$value->content}}</p>
                            <a href="{{$value->link}}" target="_blank">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</section>
<!--slider area end-->
<!--deals section area css here-->
<section class="deals_section deals_section_three">
    <div class="container">
        <div class="deals_inner_three">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="deals_carousel owl-carousel">
                        <div class="product_caption">
                            <div class="product_name">

                                    </p>
                                </div>
                                <div class="product_sale">
                                    <span>Queen Beauty nơi gửi gắm niềm tin</span>
                                </div>

                            </div>
                            <div class="product_caption">
                                <div class="product_name">

                                </div>
                                <div class="product_title">
                                    <h3><a href="">Tiên Phong Nghiên Cứu</a></h3>
                                </div>
                                <div class="product_desc">
                                    <p>
                                        Spa Queen Beauty luôn tiên phong trong việc nghiên cứu công nghệ, dịch vụ và xây
                                        dựng phác đồ trị liệu khoa học, thông minh, phù hợp với làn da phụ nữ Việt Nam
                                    </p>
                                </div>
                                <div class="product_sale">
                                    <span>Hành trình tôn vinh sắc đẹp</span>
                                </div>

                            </div>
                            <div class="product_caption">
                                <div class="product_name">

                                </div>
                                <div class="product_title">
                                    <h3><a href="">Đội Ngũ chuyên Gia</a></h3>
                                </div>
                                <div class="product_desc">
                                    <p>
                                        Quy tụ đội ngũ chuyên gia uy tín hàng đầu trong nước và thế giới. Mỗi một dịch
                                        vụ sẽ có ekip chuyên gia cố vấn và bác sĩ chuyên môn để giúp khách hàng đạt hiệu
                                        quả tối đa
                                    </p>
                                </div>
                                <div class="product_sale">
                                    <span>Nơi giữ gìn nét xuân</span>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="deals_banner">
                            <img src="frontEnd/img/bg/banner22.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--deals section area css end-->

    <!-- dịch vụ -->
    <section class="product_area product_three mt-70 mb-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title title_style3">
                        <h3>Dịch Vụ Yêu Thích</h3>
                    </div>

                </div>
            </div>
            <div class="product_wrapper product_color3">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Skincare" role="tabpanel">
                        <div class="row product_slick_row4">
                        @foreach($serviceLike as $item)
                        <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href=""><img
                                                src="{{ $item->image }}" alt=""></a>
                                        <a class="secondary_img" href=""><img
                                                src="{{ $item->image }}" alt=""></a>
                                        <div class="label_product">

                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="{{route('cart')}}" title="thêm vào giỏ hàng"><i
                                                            class="ion-bag"></i></a></li>

                                                <li class="quick_view"><a href="#" data-toggle="modal"
                                                        data-target="#modal_box" title="xem chi tiết"><i
                                                            class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="product_content">
                                        <div class="product_name" style="text-align: center;">
                                            <h4><a href="">{{ $item->name }}</a></h4>
                                            <h4>Giá tiền : {{ $item->discount }}</h4>
                                        </div>

                                        <div class="text">
                                            <a href="{{route('appointment')}}">Đặt Lịch</a>
                                        </div>



                                    </div>
                                </div>


                            </div>
                        @endforeach

                            
                           
                        </div>



                    </div>

                </div>
            </div>
        </div>
</section>
<!-- dịch vụ -->
<!--banner area start-->
<div class="banner_section_two mb-77">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="frontEnd/img/bg/banner32.jpg" alt=""></a>
                            <div class="banner_content">
                                <h3>NAil</h3>

                                <h3>Chuyên Nghiệp</h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="frontEnd/img/bg/banner33.jpg" alt=""></a>
                            <div class="banner_content">
                                <h3>Trang điểm</h3>

                                <h3>Chất Lượng</h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="frontEnd/img/bg/banner34.jpg" alt=""></a>
                            <div class="banner_content">
                                <h3>Nối Mi</h3>

                                <h3>Cực xinh</h3>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="frontEnd/img/bg/banner35.jpg" alt=""></a>
                            <div class="banner_content">
                                <h3>Phun Xăm</h3>
                                <h3>Độc Lạ</h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--banner area end-->
    <section class="product_area pb-50 mb-50">
        <div class="container">
           <div class="row">
               <div class="col-lg-3 d-flex align-items-center">
                   <div class="section_title title_style1">
                        <h3>Sản Phẩm Yêu Thích</h3>
                        <p> An Toàn - Uy Tín - Chất Lượng</p>
                    </div>
               </div>
               <div class="col-lg-9">
                   <div class="product_wrapper">
                        <div class="row product_slick_column3">
                            <?php

                            $favorite_product = DB::table('products')->where('category_id',12)->get();
                            ?>
                            @foreach ($favorite_product as $value)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}"><img src="{{$value->avatar}}" alt=""></a>
                                        <a class="secondary_img" href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}"><img src="{{$value->avatar}}" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">new</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="{{route('cart.add',['id'=>$value->id])}}" title="add to cart"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a
                                                    href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}"
                                                    title="xem chi tiết"><i class="ion-eye"></i></a></li>
    
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h4><a href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}">{{$value->name}}</a></h4>
                                        </div>
                                       
                                        <div class="price-container">
                                             <div class="price_box">
                                                <span class="current_price">{{number_format($value->discount)}}VNĐ</span>
                                                <span class="old_price">{{number_format($value->price)}}VNĐ</span>  
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
               </div>
           </div>
        </div>
    </section>

<section class="blog_area blog_three red-violet_color">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title title_style3">
                    <h3>Tin Tức</h3>
                </div>
            </div>
            <div class="blog_gallery blog_column2 owl-carousel">
                @foreach($blog as $item)
                <div class="col-lg-12">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="{{route('detailBlog',['id'=>$item->id])}}"><img src="{{ $item->avatar }}" alt=""></a>
                            <div class="articles_date">
                                <span class="date">Hot </span>
                                <span>new</span>
                            </div>
                        </div>
                        
                        <div class="blog_content">
                            <h4><a href="{{route('detailBlog',['id'=>$item->id])}}">{!! $item->title !!}</a></h4>
                            <span> ngày đăng: {{ $item->created_at }}</a></span>
                            <p>
                            {!! $item->description !!}
                            </p>
                            <a class="btn btn-info" href="{{route('detailBlog',['id'=>$item->id])}}">Đọc Thêm</a>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--blog area end-->

    <!--testimonial area start-->






<div class="testimonial_area pt-0 red-violet_color">
    <div class="section_title title_style3">
        <h3>Khách hàng nói gì về chúng tôi</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12">
                <div class="testimonial_container testimonial_active owl-carousel">
                    <div class="single_testimonial">
                        <div class="testimonial_thumb">
                            <a href="#"><img class="rounded-circle" src="frontEnd/img/about/khach-hang1.jpg" alt=""></a>
                        </div>
                        <div class="testimonial_content">
                            <h3><a href="#">Chị Bích Thủy</a></h3>
                            <i class="ion-quote"></i>
                            <p>Làm đẹp đòi hỏi sự nhân lại, có thể lúc đầu sẽ chưa thấy rõ kết quả nhưng dần dần mới cảm nhận những biến chuyển. Da khỏe lên theo thời gian, cết nhăn mờ dần. Tôi thực sự hài lòng</p>
                        </div>
                    </div>
                    <div class="single_testimonial">
                        <div class="testimonial_thumb">
                            <a href="#"><img class="rounded-circle" src="frontEnd/img/about/khach-hang2.jpg" alt=""></a>
                        </div>
                        <div class="testimonial_content">
                            <h3><a href="#">Chị Khánh Linh</a></h3>
                            <i class="ion-quote"></i>
                            <p>Bạn bè tôi ai cũng bị nám. Chúng tôi  ở nhiều nơi, dùng nhiều cách nhưng da mặt vẫn không tiến triển. 
May làm sao tôi rất hợp với liệu trình cuả Venesa. Đến bây giờ da vẫn đẹp, chẳng thấy bị nám nữa. Tôi bảo cả bạn bè sang Venesa làm rồi</p>
                        </div>
                    </div>
                    <div class="single_testimonial">
                        <div class="testimonial_thumb">
                            <a href="#"><img class="rounded-circle" src="frontEnd/img/about/khach-hang3.jpg" alt=""></a>
                        </div>
                        <div class="testimonial_content">
                            <h3><a href="#">Chị Hoảng Yến</a></h3>
                            <i class="ion-quote"></i>
                            <p>Bản thân chị thì hài lòng vô cùng. Chị khổ lắm em, khổ vì nám đó. Thử đủ mọi cách từ đông sang tây luôn.
Cũng mai làm sao có người ta giới thiệu tới đây. Lúc đầu cũng lo lắm chớ, mà đúng làm làm xong lại tiếc quá mà . Tiếc vì không đến đây sớm hơn đó (cười).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Load Facebook SDK for JavaScript -->
</div>

    <!-- Call -->
    @include('sweetalert::alert')
    @endsection