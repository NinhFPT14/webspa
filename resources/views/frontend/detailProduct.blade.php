@extends('frontend.layouts.master')
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
                                        <img id="zoom1" src="{{$data->avatar}}" data-zoom-image="{{$data->avatar}}" alt="big-1">
                                    </a>
                                </div>
                                <div class="single-zoom-thumb">
                                    <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                       <?php
                                          $image = DB::table('product_images')->where('product_id',$data->id)->get();
                                        ?>
                                        @foreach($image as $value)
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{$value->image}}" data-zoom-image="{{$value->image}}">
                                                <img src="{{$value->image}}" alt="zo-th-1"/>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="product_d_right">
                               <form action="#">

                                    <h1>{{$data->name}}</h1>
                                   
                                    <div class="price_box">
                                        <span class="current_price text-danger" ><strong>{{number_format($data->discount)}}đ</strong></span>
                                        <span class="old_price">{{number_format($data->price)}}đ</span>

                                    </div>
                                    <div class="product_desc">
                                        <p>{!! $data->description !!}</p>
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
                                    <a style="width: 100%; text-align: center; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande' sans-serif;" href="">
                                        <i class="ion-ios-cart fa-2x"></i>
                                     <span>Mua Ngay</span>
                                    </a>
                                </div>
                                <div class="rounded-3xl mt-30 bg-blue-400 w-80 h-12 flex items-center bg-blue-500 hover:bg-blue-700">
                                    <a style="width: 100%; text-align: center; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande' sans-serif;" href="">
                                        <i class="ion-ios-cart fa-2x"></i>
                                      <span>Thêm Vào Giỏ Hàng</span>
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
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                        <div class="product_info_content">
                                            <p>{!! $data->detail !!}</p>
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
                        <?php
                          $related_products = DB::table('products')->where('category_id',$data->category_id)->where('id','!=',$data->id)->where('status',0)->get();

                        ?>
                        @foreach($related_products as $value)
                            <div class="col-lg-3">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}"><img src="{{$value->avatar}}" alt=""></a>
                                      
                                        <div class="action_links">
                                            <ul>
                                                <li class="add_to_cart"><a href="{{route('cart.add',['id'=>$value->id])}}" title="Thêm Vào giỏ"><i class="ion-bag"></i></a></li>
                                                <li class="quick_view"><a href="{{route('detailProduct',['slug'=>$value->slug,'id'=>$value->id])}}" title="Chi Tiết"><i class="ion-eye"></i></a></li>
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
                                            <div class="wishlist_btn">
                                                <a href="wishlist.html" title="wishlist"><i class="ion-android-favorite-outline"></i></a>
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
    </div>
@endsection
