@extends('fontend.layouts.master')
@section('title')
Chi tiết sản phẩm
@endsection
@section('content')
<div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index-5.html">Trang Chủ</a></li>
                            <li><a href="product-details.html">Chi Tiết</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <div class="product_container">
        <div class="container">
            <div class="product_container_inner mb-60">
                <!--product details start-->
                <div class="product_details mb-60">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                           <div class="product-details-tab">
                                <div id="img-1" class="zoomWrapper single-zoom">
                                    <a href="#">
                                        <img id="zoom1" src="assets/img/product/productbig1.jpg" data-zoom-image="assets/img/product/productbig1.jpg" alt="big-1">
                                    </a>
                                </div>
                                <div class="single-zoom-thumb">
                                    <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/productbig2.jpg" data-zoom-image="assets/img/product/productbig2.jpg">
                                                <img src="assets/img/product/productbig2.jpg" alt="zo-th-1"/>
                                            </a>

                                        </li>
                                        <li >
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/productbig3.jpg" data-zoom-image="assets/img/product/productbig3.jpg">
                                                <img src="assets/img/product/productbig3.jpg" alt="zo-th-1"/>
                                            </a>

                                        </li>
                                        <li >
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/productbig4.jpg" data-zoom-image="assets/img/product/productbig4.jpg">
                                                <img src="assets/img/product/productbig4.jpg" alt="zo-th-1"/>
                                            </a>

                                        </li>
                                        <li >
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/productbig5.jpg" data-zoom-image="assets/img/product/productbig5.jpg">
                                                <img src="assets/img/product/productbig5.jpg" alt="zo-th-1"/>
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="product_d_right">
                               <form action="#">

                                    <h1>JWDA Penant Lamp Brshed Steel</h1>
                                   
                                    <div class="product_rating">
                                        <ul>
                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="price_box">
                                        <span class="current_price">$70.00</span>
                                        <span class="old_price">$80.00</span>

                                    </div>
                                    <div class="product_desc">
                                        <p>eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl</p>
                                    </div>
                                  
                                    <div class="product_variant quantity">
                                        <label>Số Lượng</label>
                                        <input min="0" max="100" value="1" type="number">
                                    </div>
                                     <div class="action_links">
                                        <ul>
                                            <li class="add_to_cart"><a href="cart.html" title="add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i> add to cart</a></li>
                                           <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                            <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_meta">
                                        <span>Danh Mục: <a href="#">Clothing</a></span>
                                    </div>

                                </form>
                               
                                <div class="rounded-3xl mt-30 bg-green-400 w-80 h-12 flex items-center bg-green-500 hover:bg-green-700">
                                    <a style="width: 100%; text-align: center; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande' sans-serif;" href="checkout.html">
                                        <i class="fas fa-cart-plus"></i>
                                      Mua Ngay
                                    </a>
                                </div>
                                <div class="rounded-3xl mt-30 bg-blue-400 w-80 h-12 flex items-center bg-blue-500 hover:bg-blue-700">
                                    <a style="width: 100%; text-align: center; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande' sans-serif;" href="cart.html">
                                        <i class="fas fa-cart-plus"></i>
                                      Thêm vào giỏ hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
                <!--product details end-->

                <!--product info start-->
                <div class="product_d_info">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_d_inner">   
                                <div class="product_info_button">    
                                    <ul class="nav" role="tablist">
                                        <li >
                                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Chi Tiết</a>
                                        </li>
                                       
                                        <li>
                                           <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh Giá </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                        <div class="product_info_content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                            <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p>
                                        </div>    
                                    </div>
                                    <div class="tab-pane fade" id="sheet" role="tabpanel" >
                                        <div class="product_d_table">
                                           <form action="#">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="first_child">Compositions</td>
                                                            <td>Polyester</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Styles</td>
                                                            <td>Girly</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Properties</td>
                                                            <td>Short Dress</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                        <div class="product_info_content">
                                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                        </div>    
                                    </div>

                                    <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                        <div class="reviews_wrapper">
                                            <h2></h2>
                                            <div class="reviews_comment_box">
                                                <div class="comment_thmb">
                                                    <img src="assets/img/blog/comment2.jpg" alt="">
                                                </div>
                                                <div class="comment_text">
                                                    <div class="reviews_meta">
                                                        <div class="star_rating">
                                                            <ul>
                                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                                <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            </ul>   
                                                        </div>
                                                        <p><strong>admin </strong>- September 12, 2018</p>
                                                        <span>roadthemes</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="comment_title">
                                                <h2>Bình Luận mới </h2>
                                                <p>Your email address will not be published.  Required fields are marked </p>
                                            </div>
                                            <div class="product_ratting mb-10">
                                               <h3>Đánh Giá</h3>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_review_form">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="review_comment">đánh giá của bạn </label>
                                                            <textarea name="comment" id="review_comment" ></textarea>
                                                        </div> 
                                                        <div class="col-lg-6 col-md-6">
                                                            <label for="author">Tên</label>
                                                            <input id="author"  type="text">

                                                        </div> 
                                                        <div class="col-lg-6 col-md-6">
                                                            <label for="email">Email </label>
                                                            <input id="email"  type="text">
                                                        </div>  
                                                    </div>
                                                    <button type="submit">Đánh Giá</button>
                                                 </form>   
                                            </div> 
                                        </div>     
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>  
                </div>  
                <!--product info end-->
            </div>
            <!--product area start-->
            <div class="product_wrapper special_products mb-60">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title title_style4">
                                <h3>Sản Phẩm Liên Quan</h3>
                        </div>
                        <div class="row product_slick_row4">
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="assets/img/product/product1.jpg" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product2.jpg" alt=""></a>
                                      
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Thêm Vào giỏ"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a href="product-details.html" data-toggle="modal" data-target="#modal_box" title="Chi Tiết"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h4><a href="product-details.html">Pendant, Made of White Pl...</a></h4>
                                        </div>
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="price-container">
                                             <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>   
                                            </div>
                                            <div class="wishlist_btn">
                                                <a href="wishlist.html" title="wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="assets/img/product/product1.jpg" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product2.jpg" alt=""></a>
                                      
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Thêm Vào giỏ"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a href="product-details.html" data-toggle="modal" data-target="#modal_box" title="Chi Tiết"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h4><a href="product-details.html">Pendant, Made of White Pl...</a></h4>
                                        </div>
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="price-container">
                                             <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>   
                                            </div>
                                            <div class="wishlist_btn">
                                                <a href="wishlist.html" title="wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="assets/img/product/product1.jpg" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product2.jpg" alt=""></a>
                                      
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Thêm Vào giỏ"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a href="product-details.html" data-toggle="modal" data-target="#modal_box" title="Chi Tiết"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h4><a href="product-details.html">Pendant, Made of White Pl...</a></h4>
                                        </div>
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="price-container">
                                             <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>   
                                            </div>
                                            <div class="wishlist_btn">
                                                <a href="wishlist.html" title="wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="product-details.html"><img src="assets/img/product/product1.jpg" alt=""></a>
                                        <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product2.jpg" alt=""></a>
                                      
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="cart.html" title="Thêm Vào giỏ"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a href="product-details.html" data-toggle="modal" data-target="#modal_box" title="Chi Tiết"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_name">
                                            <h4><a href="product-details.html">Pendant, Made of White Pl...</a></h4>
                                        </div>
                                        <div class="product_rating">
                                            <ul>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="price-container">
                                             <div class="price_box">
                                                <span class="current_price">$65.00</span>
                                                <span class="old_price">$70.00</span>   
                                            </div>
                                            <div class="wishlist_btn">
                                                <a href="wishlist.html" title="wishlist"><i class="ion-android-favorite-outline"></i></a>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>       
            </div>
            <!--product area end-->

           
        </div>
    </div>
@endsection
