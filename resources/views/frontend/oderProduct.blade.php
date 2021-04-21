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
                        <li><a>Đặt sản phẩm</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="Checkout_section">
    <div class="container">
         <div class="checkout_form">
             <div class="row">
                 <div class="col-lg-6 col-md-6">
                     <form action="#">
                         <h3>THÔNG TIN ĐẶT HÀNG</h3>
                         <div class="row">
                             <div class="col-12 mb-20">
                                <label>Họ tên<span>*</span></label>
                                <input type="text">    
                                <label>Số điện thoại  <span>*</span></label>
                                <input type="text"> 
                                 <label>Địa chỉ</label>
                                 <input type="text">     
                                 <label for="order_note">Lời nhắn</label>
                                 <textarea name="note" class="form-control" cols="30" rows="10"></textarea>
                             </div>
                         </div>
                     </form>    
                 </div>
                 <div class="col-lg-6 col-md-6">
                     <form action="#">    
                         <h3>Sản phẩm</h3> 
                         <div class="order_table table-responsive">
                             <table>
                                 <thead>
                                     <tr>
                                         <th>Tên sản phẩm</th>
                                         <th>Đơn giá</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @if(Session::has('productId'))
                                    <?php 
                                    $cart=\Cookie::get('cartId');
                                    $cart=json_decode($cart);
                                      $product = DB::table('products')->where('status',0)->whereIn('id', $cart)->get();
                                      $total_money = 0;
                                    ?>
                                    @foreach ($product as $value)
                                         <?php 
                                           $number_product = 0;
                                           foreach ($cart as $key => $item) {
                                             if($cart[$key] == $value->id){
                                                $number_product++;
                                             }
                                           }
                                           $total_money += ($value->discount * $number_product);
                                         ?>
                                     <tr>
                                        <td>{{$value->name}}<strong> × {{$number_product}}</strong></td>
                                        <td>{{number_format($value->discount * $number_product)}} VNĐ</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                 </tbody>
                                 <tfoot>
                                     <tr class="order_total">
                                         <th>Tổng tiền</th>
                                         <td><strong> VNĐ</strong></td>
                                     </tr>
                                 </tfoot>
                             </table>     
                         </div>
                         
                             <div class="order_button">
                                 <button  type="submit">Đặt hàng</button> 
                             </div>    
                         </div> 
                     </form>         
                 </div>
             </div> 
         </div> 
     </div>       
 </div>

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