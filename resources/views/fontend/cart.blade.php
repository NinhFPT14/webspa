@extends('fontEnd.layouts.master')
@section('title')
Giỏ Hàng
@endsection
@section('content')
<!--Fontawesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
<link rel="stylesheet" href="assets/css/plugins.css">

<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index-5.html">Trang Chủ</a></li>
                        <li><a href="cart.html">Giỏ Hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area">
    <div class="container">  
        <form action="#"> 
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                        <thead>
                            <tr>
                                <th class="product_remove"></th>
                                <th class="product_thumb">Ảnh</th>
                                <th class="product_name">Sản Phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product_quantity">Số Lượng</th>
                                <th class="product_total">tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               <td class="product_remove"><a href="#"><i class="far fa-trash-alt"></i></a></td>
                                <td class="product_thumb"><a href="#"><img src="fontEnd/img/s-product/product.jpg" alt=""></a></td>
                                <td class="product_name"><a href="#">Handbag fringilla</a></td>
                                <td class="product-price">£65.00</td>
                                <td class="product_quantity"><label>Quantity</label> <input min="0" max="100" value="1" type="number"></td>
                                <td class="product_total">£130.00</td>


                            </tr>

                           

                        </tbody>
                    </table>   
                        </div>  
                        <div class="cart_submit">
                            <button type="submit">Cập Nhập</button>
                            <a href="{{route('checkout')}}" class="btn btn-success">  Thanh Toán</a>

                        </div>      
                    </div>
                 </div>
             </div>
             <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                            <h3>Giảm Giá</h3>
                            <div class="coupon_inner">   
                                <p>Mời Nhập Mã Giảm Giá.</p>                                
                                <input placeholder="..." type="text">
                                <button type="submit">Áp Dụng</button>
                            </div>    
                        </div>
                    </div>
                  
                </div>
            </div>
            <!--coupon code area end-->
        </form> 
    </div>     
</div>
<!--shopping cart area end -->

@endsection
