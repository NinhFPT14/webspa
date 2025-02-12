@extends('frontend.layouts.master')
@section('title')
Sản phẩm
@endsection
@section('content')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{route('home')}}">Trang chủ</a></li>
                        <li><a href="{{route('product',['id'=>'all'])}}">Sản Phẩm</a></li>
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
                    <div class="widget_list widget_search mb-30">
                        <h2>Tìm kiếm</h2>
                        <form action="{{route('product.search.user')}}" method="POST">
                         @csrf
                            <input placeholder="Nhập từ khóa tìm kiếm ..." type="text" name="name">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                     </div>
                    <div class="widget_list">
                        <h2>Danh Mục Sản Phẩm</h2>
                        <ul>
                            <?php
                             $category = DB::table('categories')->where('type',0)->where('status',0)->get();
                            ?>
                            @foreach($category as $item)
                            <?php
                             $product = DB::table('products')->where('category_id',$item->id)->get();
                            ?>
                            <li>
                                <a href="{{route('product',['id'=> $item->id])}}">{{$item->name}}
                                    <span>({{count($product)}})</span></a>
                            </li>
                            @endforeach
                        </ul>
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
                    <img src="frontEnd/img/bg/banner-san-pham.png" alt="">
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
                                <option value="2">Theo thứ tự A-Z</option>
                                <option value="3">Sản phẩm mới nhất</option>
                                <option value="4">Giá cao đến thấp</option>
                                <option value="5">Giá thấp đến cao</option>
                            </select>
                        </form>


                    </div>
                    
                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper">
                    @foreach($data as $value)
                    <div class="col-lg-4 col-md-4 col-12 ">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img"
                                    href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}"><img
                                        src="{{$value->avatar}}" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">new</span>
                                </div>
                                <div class="action_links">
                                    <ul>
                                        <li class="add_to_cart"><a href="{{route('cart.add',['id'=>$value->id])}}" title="Thêm vào giỏ hàng"><i
                                                    class="ion-bag"></i></a></li>
                                        <li class="quick_view"><a
                                                href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}"
                                                title="xem chi tiết"><i class="ion-eye"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="product_content grid_content">
                                <div class="product_name">
                                    <h4><a
                                            href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}">{{$value->name}}</a>
                                    </h4>
                                </div>
                                <div class="price-container">
                                    <div class="price_box">
                                        <span class="current_price">{{number_format($value->discount)}}VNĐ</span>
                                        <span class="old_price">{{number_format($value->price)}}VNĐ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product_content list_content">
                                <div class="product_name">
                                    <h4><a
                                            href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}">{{$value->name}}</a>
                                    </h4>
                                </div>
                                <div class="price_box">
                                    <span class="current_price">{{number_format($value->discount)}}VNĐ</span>
                                    <span class="old_price">{{number_format($value->price)}}VNĐ</span>
                                </div>
                                <div class="product_desc">
                                    <p>{!!($value->description)!!} </p>


                                </div>
                                <div class="action_links">
                                    <ul>
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="{{route('cart.add',['id'=>$value->id])}}"
                                                        title="add to cart">Thêm Vào Giỏ</a></li>

                                                <li class="quick_view"><a
                                                        href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}"
                                                        title="xem chi tiết"><i class="ion-eye"></i></a></li>
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
                            <li class="current">{!!$data->links()!!}</li>
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