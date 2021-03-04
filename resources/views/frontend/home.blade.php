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
<style>.fb-livechat, .fb-widget{display: none}.ctrlq.fb-button, .ctrlq.fb-close{position: fixed; right: 24px; cursor: pointer}.ctrlq.fb-button{z-index: 999; background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff; width: 60px; height: 60px; text-align: center; bottom: 210px;right:10px; border: 0; outline: 0; border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px; -ms-border-radius: 60px; -o-border-radius: 60px; box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16); -webkit-transition: box-shadow .2s ease; background-size: 80%; transition: all .2s ease-in-out}.ctrlq.fb-button:focus, .ctrlq.fb-button:hover{transform: scale(1.1); box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)}.fb-widget{background: #fff; z-index: 1000; position: fixed; width: 360px; height: 435px; overflow: hidden; opacity: 0; bottom: 0; right: 24px; border-radius: 6px; -o-border-radius: 6px; -webkit-border-radius: 6px; box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)}.fb-credit{text-align: center; margin-top: 8px}.fb-credit a{transition: none; color: #bec2c9; font-family: Helvetica, Arial, sans-serif; font-size: 12px; text-decoration: none; border: 0; font-weight: 400}.ctrlq.fb-overlay{z-index: 0; position: fixed; height: 100vh; width: 100vw; -webkit-transition: opacity .4s, visibility .4s; transition: opacity .4s, visibility .4s; top: 0; left: 0; background: rgba(0, 0, 0, .05); display: none}.ctrlq.fb-close{z-index: 4; padding: 0 6px; background: #365899; font-weight: 700; font-size: 11px; color: #fff; margin: 8px; border-radius: 3px}.ctrlq.fb-close::after{content: "X"; font-family: sans-serif}.bubble{width: 20px; height: 20px; background: #c00; color: #fff; position: absolute; z-index: 999999999; text-align: center; vertical-align: middle; top: -2px; left: -5px; border-radius: 50%;}.bubble-msg{width: 120px; left: -140px; top: 5px; position: relative; background: rgba(59, 89, 152, .8); color: #fff; padding: 5px 8px; border-radius: 8px; text-align: center; font-size: 13px;}</style><div class="fb-livechat"> <div class="ctrlq fb-overlay"></div><div class="fb-widget"> <div class="ctrlq fb-close"></div><div class="fb-page" data-href="https://www.facebook.com/1998" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div><div class="fb-credit"> <a href="https://www.facebook.com/1998-Confessions-104391394563784" target="_blank" >Queen Spa</a> </div><div id="fb-root"></div></div><a href="https://m.me/1998" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button"> <div class="bubble">1</div><div class="bubble-msg">Bạn cần hỗ trợ?</div></a></div><script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><script>jQuery(document).ready(function($){function detectmob(){if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) ){return true;}else{return false;}}var t={delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")}; setTimeout(function(){$("div.fb-livechat").fadeIn()}, 8 * t.delay); if(!detectmob()){$(".ctrlq").on("click", function(e){e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({bottom: 0, opacity: 0}, 2 * t.delay, function(){$(this).hide("slow"), t.button.show()})) : t.button.fadeOut("medium", function(){t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)})})}});</script>
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


                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{route('detailService')}}"><img
                                                src="frontEnd/img/product/product25.jpg" alt=""></a>
                                        <a class="secondary_img" href="{{route('detailService')}}"><img
                                                src="frontEnd/img/product/product27.jpg" alt=""></a>
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
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="frontEnd/img/product/product10.jpg" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img src="frontEnd/img/product/product11.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">new</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick View"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h4><a href="product-details.html">Pendant, Made of White Pl...</a></h4>
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
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="frontEnd/img/product/product10.jpg" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img src="frontEnd/img/product/product11.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">new</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick View"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h4><a href="product-details.html">Pendant, Made of White Pl...</a></h4>
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
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="frontEnd/img/product/product10.jpg" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img src="frontEnd/img/product/product11.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">new</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick View"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h4><a href="product-details.html">Pendant, Made of White Pl...</a></h4>
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
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="frontEnd/img/product/product10.jpg" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img src="frontEnd/img/product/product11.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">new</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick View"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h4><a href="product-details.html">Pendant, Made of White Pl...</a></h4>
                                        </div>
                                       
                                        <div class="price-container">
                                             <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>   
                                            </div>
                                            
                                        </div>



                                    </div>
                                </div>
                            </div> <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="frontEnd/img/product/product10.jpg" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img src="frontEnd/img/product/product11.jpg" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">new</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a href="#" data-toggle="modal" data-target="#modal_box" title="Quick View"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h4><a href="product-details.html">Pendant, Made of White Pl...</a></h4>
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
                            <a href="blog-details.html"><img src="frontEnd/img/blog/blog7.jpg" alt=""></a>
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
                            <a href="blog-details.html"><img src="frontEnd/img/blog/blog7.jpg" alt=""></a>
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
                            <a href="blog-details.html"><img src="frontEnd/img/blog/blog7.jpg" alt=""></a>
                            <div class="articles_date">
                                <span class="date">Hot </span>
                                <span>new</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.html"><img src="frontEnd/img/blog/blog7.jpg" alt=""></a>
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
                            <a href="#"><img src="frontEnd/img/about/testimonial.jpg" alt=""></a>
                        </div>
                        <div class="testimonial_content">
                            <h3><a href="#">Nguyễn Thanh Tâm</a></h3>
                            <i class="ion-quote"></i>
                            <p>Spa làm việc uy tín trách nhiệm</p>
                        </div>
                    </div>
                    <div class="single_testimonial">
                        <div class="testimonial_thumb">
                            <a href="#"><img src="frontEnd/img/about/testimonial.jpg" alt=""></a>
                        </div>
                        <div class="single_testimonial">
                            <div class="testimonial_thumb">
                                <a href="#"><img src="frontEnd/img/about/testimonial.jpg" alt=""></a>
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
</div>

    <!-- Call -->
    @endsection