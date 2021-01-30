@extends('fontend.layouts.master')
@section('title')
Trang chủ
@endsection
@section('content')
    <!--slider area start-->
    <section class="slider_section slider_section_three">
        <div class="slider_area owl-carousel">
             <div class="single_slider d-flex align-items-center" data-bgimg="fontEnd/img/slider/slider5.jpg">
                 <div class="container">
                     <div class="row">
                         <div class="col-12">
                             <div class="slider_content slider_c_three">
                                 <h1>nurturing the skin’s</h1>
                                 <p>We’ve been squeezing oranges in Alista for over 20 years, and we are proud.</p>
                                 <a href="#">shop now</a>
                             </div>
                         </div>
                     </div>
                 </div> 
                 
             </div>
             <div class="single_slider d-flex align-items-center" data-bgimg="fontEnd/img/slider/slider6.jpg">
                 <div class="container">
                     <div class="row">
                         <div class="col-12">
                             <div class="slider_content slider_c_three color_three">
                                 <h1>maison Francis Kuja</h1>
                                 <p>Learn more about our product philosophy, and the benefits of microbiome-friendly skincare.</p>
                                 <a href="#">shop now</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
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

                                </div>
                                <div class="product_title">
                                    <h3><a href="">Kinh Nghiệm làm việc trong lĩnh vực spa</a></h3>
                                </div>
                                <div class="product_desc">
                                    <p>
                                        Thành lập từ năm 2005, Spa Queen Beauty vẫn đứng vững suốt 14 năm trong ngành
                                        Spa Việt cạnh tranh khốc liệt & đem đến vẻ đẹp hoàn hảo cho hàng triệu khách
                                        hàng

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
                            <img src="fontEnd/img/bg/banner22.jpg" alt="">
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


                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{route('detailService')}}"><img
                                                src="fontEnd/img/product/product25.jpg" alt=""></a>
                                        <a class="secondary_img" href="{{route('detailService')}}"><img
                                                src="fontEnd/img/product/product27.jpg" alt=""></a>
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
                                            <h4><a href="{{route('detailService')}}">Demo</a></h4>
                                        </div>

                                        <div class="text">
                                            <a href="{{route('appointment')}}">Đặt Lịch</a>
                                        </div>



                                    </div>
                                </div>


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
                            <a href="shop.html"><img src="fontEnd/img/bg/banner32.jpg" alt=""></a>
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
                            <a href="shop.html"><img src="fontEnd/img/bg/banner33.jpg" alt=""></a>
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
                            <a href="shop.html"><img src="fontEnd/img/bg/banner34.jpg" alt=""></a>
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
                            <a href="shop.html"><img src="fontEnd/img/bg/banner35.jpg" alt=""></a>
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
    <!--banner area end-->



    <!--new product area start-->
    <section class="product_area product_three mt-70 mb-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title title_style3">
                        <h3>Sản Phẩm Nổi Bật</h3>
                    </div>

                </div>
            </div>
            <div class="product_wrapper product_color3">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="Skincare" role="tabpanel">
                        <div class="row product_slick_row4">

                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{route('detailProduct')}}"><img
                                                src="fontEnd/img/product/product25.jpg" alt=""></a>
                                        <a class="secondary_img" href="{{route('detailProduct')}}"><img
                                                src="fontEnd/img/product/product27.jpg" alt=""></a>
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
                                        <div class="product_name">
                                            <h4><a href="{{route('detailProduct')}}">Demo</a></h4>
                                        </div>

                                        <div class="price-container">
                                            <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                            </div>
                           

                        </div>
                    </div>



                </div>

            </div>
        </div>
    </section>
    <!--new product area end-->






    <!--blog area start-->
    <section class="blog_area blog_three red-violet_color">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title title_style3">
                        <h3>Tin Tức</h3>
                    </div>
                </div>
                <div class="blog_gallery blog_column2 owl-carousel">
                    <div class="col-lg-12">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="fontEnd/img/blog/blog7.jpg" alt=""></a>
                                <div class="articles_date">
                                    <span class="date">Hot </span>
                                    <span>new</span>
                                </div>
                            </div>
                            <div class="blog_content">
                                <h4><a href="blog-details.html">GIẢM GIÁ 50 % TẤT CẢ DỊCH VỤ LÀM ĐẸP TẠI THANH HÒA SPA -
                                        NHÂN DỊP 8/3</a></h4>
                                <span> ngày đăng: 28/01/201</a></span>
                                <p>"Tháng 3 nồng nàn – Nhận ngàn ưu đãi” cùng Queen Beauty SPA. Từ 1/3 đến 31/3/2018,
                                    giảm 50% tất cả các dịch vụ làm đẹp cho các khách hàng nữ.</p>
                                <a href="blog-details.html">Đọc Thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="fontEnd/img/blog/blog7.jpg" alt=""></a>
                                <div class="articles_date">
                                    <span class="date">Hot </span>
                                    <span>new</span>
                                </div>
                            </div>
                            <div class="blog_content">
                                <h4><a href="blog-details.html">GIẢM GIÁ 50 % TẤT CẢ DỊCH VỤ LÀM ĐẸP TẠI THANH HÒA SPA -
                                        NHÂN DỊP 8/3</a></h4>
                                <span> ngày đăng: 28/01/201</a></span>
                                <p>"Tháng 3 nồng nàn – Nhận ngàn ưu đãi” cùng Queen Beauty SPA. Từ 1/3 đến 31/3/2018,
                                    giảm 50% tất cả các dịch vụ làm đẹp cho các khách hàng nữ.</p>
                                <a href="blog-details.html">Đọc Thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="fontEnd/img/blog/blog7.jpg" alt=""></a>
                                <div class="articles_date">
                                    <span class="date">Hot </span>
                                    <span>new</span>
                                </div>
                            </div>
                            <div class="blog_content">
                                <h4><a href="blog-details.html">GIẢM GIÁ 50 % TẤT CẢ DỊCH VỤ LÀM ĐẸP TẠI THANH HÒA SPA -
                                        NHÂN DỊP 8/3</a></h4>
                                <span> ngày đăng: 28/01/201</a></span>
                                <p>"Tháng 3 nồng nàn – Nhận ngàn ưu đãi” cùng Queen Beauty SPA. Từ 1/3 đến 31/3/2018,
                                    giảm 50% tất cả các dịch vụ làm đẹp cho các khách hàng nữ.</p>
                                <a href="blog-details.html">Đọc Thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="fontEnd/img/blog/blog7.jpg" alt=""></a>
                                <div class="articles_date">
                                    <span class="date">Hot </span>
                                    <span>new</span>
                                </div>
                            </div>
                            <div class="blog_content">
                                <h4><a href="blog-details.html">GIẢM GIÁ 50 % TẤT CẢ DỊCH VỤ LÀM ĐẸP TẠI THANH HÒA SPA -
                                        NHÂN DỊP 8/3</a></h4>
                                <span> ngày đăng: 28/01/201</a></span>
                                <p>"Tháng 3 nồng nàn – Nhận ngàn ưu đãi” cùng Queen Beauty SPA. Từ 1/3 đến 31/3/2018,
                                    giảm 50% tất cả các dịch vụ làm đẹp cho các khách hàng nữ.</p>
                                <a href="blog-details.html">Đọc Thêm</a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
    <!--blog area end-->

    <!--testimonial area start-->






    <div class="testimonial_area pt-0 red-violet_color">
        <div class="section_title title_style3">
            <h3>Ý Kiến Đóng Góp</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12">
                    <div class="testimonial_container testimonial_active owl-carousel">
                        <div class="single_testimonial">
                            <div class="testimonial_thumb">
                                <a href="#"><img src="fontEnd/img/about/testimonial.jpg" alt=""></a>
                            </div>
                            <div class="testimonial_content">
                                <h3><a href="#">Nguyễn Thanh Tâm</a></h3>
                                <i class="ion-quote"></i>
                                <p>Spa làm việc uy tín trách nhiệm</p>
                            </div>
                        </div>
                        <div class="single_testimonial">
                            <div class="testimonial_thumb">
                                <a href="#"><img src="fontEnd/img/about/testimonial.jpg" alt=""></a>
                            </div>
                            <div class="testimonial_content">
                                <h3><a href="#">Nguyễn Thanh Tâm</a></h3>
                                <i class="ion-quote"></i>
                                <p>Spa làm việc uy tín trách nhiệm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Load Facebook SDK for JavaScript -->


    <!-- Call -->
    @endsection