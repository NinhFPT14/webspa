@extends('frontend.layouts.master')
@section('title')
Dịch Vụ
@endsection
@section('content')
<div class="shop_area shop_reverse">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!--sidebar widget start-->
                <aside class="sidebar_widget">
                    <!-- List dịch vụ -->
                    <div class="widget_list">
                        <h2>Danh mục dịch vụ</h2>
                        <ul>
                            @foreach($service as $item)
                            <li>
                                <a href="#">{{ $item->name }}</a>
                            </li>
                            @endforeach



                        </ul>
                    </div>

                    <!-- <div class="widget_list widget_categories">
                            <h2>categories</h2>
                            <ul>
                                <li>
                                    <a href="#">Categories1 <span>(6)</span></a> 
                                </li>
                                <li>
                                    <a href="#">Categories2 <span>(10)</span></a> 
                                </li>
                                <li>
                                    <a href="#">Categories3 <span>(4)</span></a> 
                                </li>
                                <li>
                                    <a href="#">Categories4 <span>(10)</span></a> 
                                </li>
                                <li>
                                    <a href="#">Categories5 <span>(8)</span></a> 
                                </li>

                            </ul>
                        </div>     -->


                    <div class="shop_sidebar_banner">
                        <a href="#"><img src="{{ asset('assets/img/bg/banner31.jpg') }}" alt=""></a>
                    </div>
                </aside>
                <!--List dịch vụ end-->
            </div>
            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_title">
                    <h1>Dịch Vụ</h1>
                </div>

                <div class="shop_banner">
                    <img src="{{ asset('assets/img/bg/banner30.jpg') }}" alt="">
                </div>

                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">

                        <button data-role="grid_3" type="button" class=" btn-grid-3" data-toggle="tooltip"
                            title="3"></button>

                        <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip"
                            title="4"></button>

                        <button data-role="grid_list" type="button" class="active btn-list" data-toggle="tooltip"
                            title="List"></button>
                    </div>
                    <div class=" niceselect_option" style="display: none;">

                        <form class="select_option" action="#" style="display: none;">
                            <select name="orderby" id="short">

                                <option selected="" value="1">Sort by average rating</option>
                                <option value="2">Sort by popularity</option>
                                <option value="3">Sort by newness</option>
                                <option value="4">Sort by price: low to high</option>
                                <option value="5">Sort by price: high to low</option>
                                <option value="6">Product Name: Z</option>
                            </select>
                        </form>
                        <div class="nice-select select_option" tabindex="0"><span class="current">Sort by average
                                rating</span>
                            <ul class="list">
                                <li data-value="1" class="option selected">Sort by average rating</li>
                                <li data-value="2" class="option">Sort by popularity</li>
                                <li data-value="3" class="option">Sort by newness</li>
                                <li data-value="4" class="option">Sort by price: low to high</li>
                                <li data-value="5" class="option">Sort by price: high to low</li>
                                <li data-value="6" class="option">Product Name: Z</li>
                            </ul>
                        </div>


                    </div>
                    <div class="nice-select niceselect_option" tabindex="0"><span class="current">Sort by average
                            rating</span>
                        <ul class="list">
                            <li data-value="1" class="option selected">Sort by average rating</li>
                            <li data-value="2" class="option">Sort by popularity</li>
                            <li data-value="3" class="option">Sort by newness</li>
                            <li data-value="4" class="option">Sort by price: low to high</li>
                            <li data-value="5" class="option">Sort by price: high to low</li>
                            <li data-value="6" class="option">Product Name: Z</li>
                        </ul>
                    </div>
                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                <!--shop toolbar end-->

                <div class="row shop_wrapper grid_list">
                    @foreach( $service as $value)
                    <div class="col-12 ">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href=""><img src="{{ $value->image }}" alt=""></a>
                                <a class="secondary_img" href=""><img src="{{ $value->image }}" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">new</span>
                                </div>
                                <div class="action_links">
                                    <ul>
                                        <li class="add_to_cart"><a href="cart.html" title=""
                                                data-original-title="add to cart"><i class="ion-bag"></i></a></li>
                                        <li class="compare"><a href="#" title="" data-original-title="Add to Compare"><i
                                                    class="ion-ios-shuffle-strong"></i></a></li>
                                        <li class="quick_view"><a href="#" data-toggle="modal" data-target="#modal_box"
                                                title="" data-original-title="Quick View"><i class="ion-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content grid_content">
                                <div class="product_name">
                                    <h4><a href="">{{ $value->name }}/a></h4>
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
                                        <span class="current_price">{{ $value->discount }}</span>
                                        <span class="old_price">{{ $value->price }}/span>
                                    </div>
                                    <div class="wishlist_btn">
                                        <a href="wishlist.html" title="" data-original-title="wishlist"><i
                                                class="ion-android-favorite-outline"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product_content list_content">
                                <div class="product_name">
                                    <h4><a href="product-details.html">{{ $value->name }}</a></h4>
                                </div>
                                <div class="price_box">
                                    <span class="current_price">{{ $value->discount}} VNĐ</span>
                                    <span class="old_price">{{ $value->price}} VNĐ</span>
                                </div>
                                <div class="product_desc">
                                    {!! $value->description !!}

                                </div>
                                <div class="action_links">
                                    <ul>
                                        <li class="add_to_cart"><a href="" title=""
                                                data-original-title="Đặt lịch ngay">Đặt Lịch</a></li>
                                        <li class="quick_view"><a href="#" data-toggle="modal" data-target="#modal_box"
                                                title="" data-original-title="Chi tiết dịch vụ"><i
                                                    class="ion-eye"></i></a>
                                        </li>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="{{route('cart')}}"
                                                        title="add to cart">Thêm Vào Giỏ</a></li>

                                                <li class="quick_view"><a href="#" data-toggle="modal"
                                                        data-target="#modal_box" title="Xem Chi tiết"><i
                                                            class="ion-eye"></i></a></li>
                                                <li class="add_to_cart"><a href="{{route('appointment')}}"
                                                        title="đặt lịch">Đặt Lịch</a></li>

                                            </ul>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        <ul>
                            {!!$service->links()!!}
                        </ul>

                    </div>
                </div>
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
@endsection