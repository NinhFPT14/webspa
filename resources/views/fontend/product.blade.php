@extends('fontend.layouts.master')
@section('title')
Sản phẩm
@endsection
@section('content')
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Shop</h3>
                        <ul>
                            <li><a href="index.html">Trang chủ</a></li>
                            <li><a href="shop.html">Sản Phẩm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_reverse">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_list widget_filter">
                            <h2>Lọc Giá</h2>
                            <form action="#">
                                <div id="slider-range"></div>
                                <button type="submit">Lọc</button>
                                <input type="text" name="text" id="amount" />

                            </form>
                        </div>
                        <div class="widget_list">
                            <h2>Danh Mục Sản Phẩm</h2>
                            <ul>
                                <li>
                                    <a href="#">Danh Mục 1 <span>(6)</span></a>
                                </li>
                                <li>
                                    <a href="#">Danh Mục 1 <span>(6)</span></a>
                                </li>
                                <li>
                                    <a href="#">Danh Mục 1 <span>(6)</span></a>
                                </li>

                            </ul>
                        </div>
                       
                      
                        <div class="shop_sidebar_banner">
                            <a href="#"><img src="fontEnd/img/bg/banner31.jpg" alt=""></a>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_title">
                       
                    </div>
                    <div class="shop_banner">
                        <img src="fontEnd/img/bg/banner30.jpg" alt="">
                    </div>

                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip"
                                title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip"
                                title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                                title="List"></button>
                        </div>
                        <div class=" niceselect_option">

                            <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">Lọc sản phẩm</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form>


                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper">
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{route('detailProduct')}}"><img
                                            src="fontEnd/img/product/product1.jpg" alt=""></a>
                                    <a class="secondary_img" href="{{route('detailProduct')}}"><img
                                            src="fontEnd/img/product/product2.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">new</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="add_to_cart"><a href="{{route('cart')}}" title="Thêm vào giỏ hàng"><i
                                                        class="ion-bag"></i></a></li>
                                            <li class="quick_view"><a href="{{route('detailProduct')}}" title="xem chi tiết"><i
                                                            class="ion-eye"></i></a></li>
                                         
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content grid_content">
                                    <div class="product_name">
                                        <h4><a href="{{route('detailProduct')}}">Pendant, Made of White Pl...</a></h4>
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
                                            <a href="wishlist.html" title="wishlist"><i
                                                    class="ion-android-favorite-outline"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_content list_content">
                                    <div class="product_name">
                                        <h4><a href="{{route('detailProduct')}}">Hpoly and Bark Eames...</a></h4>
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
                                    <div class="price_box">
                                        <span class="current_price">$65.00</span>
                                        <span class="old_price">$70.00</span>
                                    </div>
                                    <div class="product_desc">
                                        <p>Engineered with pro-level features and performance, the
                                            12.3-effective-megapixel D300 combines brand new technologies with advanced
                                            features inherited from Nikon's newly announced D3 professional digital SLR
                                            camera to offer serious photographers remarkable performance combined with
                                            agility... </p>


                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="add_to_cart"><a href="cart.html" title="add to cart">Add to
                                                    Cart</a></li>
                                            <li class="compare"><a href="#" title="Add to Compare"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick_view"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="Quick View"><i
                                                        class="ion-eye"></i></a></li>
                                            <li><a href="wishlist.html" title="wishlist"><i
                                                        class="ion-android-favorite-outline"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                               
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->

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
