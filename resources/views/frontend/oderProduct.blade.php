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
                                      $cart = Session::get('productId');
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
                                         <td><strong>{{number_format($total_money)}} VNĐ</strong></td>
                                     </tr>
                                 </tfoot>
                             </table>     
                         </div>
                         <div class="payment_method">
                            <div class="panel-default">
                                 <input id="payment" name="check_method" type="radio" data-target="createp_account" />
                                 <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Thanh toán qua chuyển khoản</label>

                                 <div id="method" class="collapse one" data-parent="#accordion">
                                     <div class="card-body1">
                                        <p>
                                        </p> Các bạn vui lòng chuyển khoản tới các số TK của QueenSpa:</p>

                                        <p> Số TK: 0081000830127</p>
        
                                        <p> DƯƠNG THỊ QUYÊN</p>
        
        
                                        <p> Vietinbank:</p>
        
                                        <p> Số TK: 100000335060</p>
        
                                        <p> DƯƠNG THỊ QUYÊN</p>
                                        </p> Nội dung chuyển khoản gồm số điện thoại và mã đơn đặt hàng </p>
                                        </p>
                                     </div>
                                 </div>
                             </div> 
                            <div class="panel-default">
                                 <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" />
                                 <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Thanh toán khi giao hàng (COD)<img src="assets/img/icon/papyel.png" alt=""></label>

                                 <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                     <div class="card-body1">
                                        <p> Đối với các bạn ở xa , muốn sử dụng hình thức COD (thanh toán khi nhận hàng), khách hàng vui lòng để lại đầy đủ thông tin QueenSpa sẽ gửi hàng sớm nhất</p>
                                        <p> - Các bạn sẽ thanh toán trực tiếp cho bên chuyển phát sau khi đã nhận được hàng.</p>
                                        <p> - QueenSpa sẽ gửi hàng đi ngay trong ngày sau khi nhận được đơn đặt hàng. </p>
                                     </div>
                                 </div>
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