@extends('frontend.layouts.master')
@section('title')
Giỏ Hàng
@endsection
@section('content')


<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="">Trang Chủ</a></li>
                        <li><a href="{{route('cart')}}">Giỏ Hàng</a></li>
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
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                        <thead>
                            <tr>
                                <th class="product_remove"></th>
                                <th class="product_thumb">Ảnh</th>
                                <th class="product_name">Tên sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product_quantity">Số Lượng</th>
                                <th class="product_total">tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>

                          
                            @if(\Cookie::get('cartId'))
                            <?php 
                              $cart=\Cookie::get('cartId');
                              $cart=json_decode($cart);
                              $product = DB::table('products')->where('status',0)->whereIn('id', $cart)->get();
                            ?>
                            @foreach ($product as $value)
                            <tr>
                                <td class="product_remove"><a href="{{route('cart.delete',['id'=>$value->id])}}"><i class="fa fa-trash-o"></i></a></td>
                                 <td class="product_thumb"><a href="#"><img src="{{$value->avatar}}" alt="" class="w-20"></a></td>
                                 <td class="product_name"><a href="#">{{$value->name}}</a></td>
                                 <td class="product-price">{{number_format($value->discount)}} VNĐ</td>
                                 <?php 
                                   $number_product = 0;
                                   foreach ($cart as $key => $item) {
                                     if($cart[$key] == $value->id){
                                        $number_product++;
                                     }
                                   }
                                 ?>
                                 <form action="{{route('cart.update',['id'=>$value->id])}}" method="POST">
                                    @csrf
                                 <td class="product_quantity"><label>Số lượng</label> <input name="number" min="0" max="100" value="{{$number_product}}" type="number">
                                    <button type="submit" class="btn btn-secondary">Cập Nhập</button>
                                </td>
                               </form>
                                 <td class="product_total">{{number_format($value->discount * $number_product)}} VNĐ</td>
                             </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>   
                        </div>  
                        <div class="cart_submit">
                            <a href="{{route('product.oder.product')}}" class="btn btn-success">Đặt hàng</a>
                        </div>      
                    </div>
                 </div>
             </div>
    </div>     
</div>
<!--shopping cart area end -->

@endsection
