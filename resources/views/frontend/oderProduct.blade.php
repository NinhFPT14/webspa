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
                         <h3>THÔNG TIN ĐẶT HÀNG</h3>
                         <div class="row">
                             <div class="col-12 mb-20">
                                <label>Họ tên<span>*</span></label>
                                <input type="text" name="name" id="input_name">    
                                <p id="thong_bao_name" class="text-danger"></p>
                                <label>Số điện thoại  <span>*</span></label>
                                <input type="text" name="phone"  id="input_phone"> 
                                <p id="thong_bao_phone" class="text-danger"></p>
                                 <label>Địa chỉ <span>*</span></label>
                                 <input type="text" name="address"  id="input_address">     
                                 <p id="thong_bao_address" class="text-danger"></p>
                                 <label for="order_note" name="note">Lời nhắn</label>
                                 <textarea name="note"  id="input_note" class="form-control" cols="30" rows="10"></textarea>
                                 <p id="thong_bao_note" class="text-danger"></p>
                             </div>
                         </div>
                 </div>
                 <div class="col-lg-6 col-md-6">
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
                                    @if(\Cookie::has('oderProductId'))
                                    <?php 
                                    $cart=\Cookie::get('oderProductId');
                                    $cart =json_decode($cart);
                                      $product = DB::table('products')->where('status',0)->whereIn('id', $cart)->get();
                                      $total_monney = 0;
                                    ?>
                                    @foreach ($product as $value)
                                         <?php 
                                           $number_product = 0;
                                           foreach ($cart as $key => $item) {
                                             if($cart[$key] == $value->id){
                                                $number_product++;
                                             }
                                           }
                                           $total_monney += ($value->discount * $number_product);
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
                                         <td><strong>{{number_format($total_monney)}}VNĐ</strong></td>
                                     </tr>
                                 </tfoot>
                             </table>     
                         </div>
                         
                             <div class="order_button">
                               <a class="btn btn-success submit_oder" data-total="{{$total_monney}}">Đặt hàng</a>
                             </div>    
                         </div> 
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



@section('page-script')
<script>
$(document).ready(function() {
    $('.submit_oder').on('click', function() {
        $("p#thong_bao_name" ).html(' ');
        $("p#thong_bao_phone" ).html(' ');
        $("p#thong_bao_address" ).html(' ');
        $("p#thong_bao_note" ).html(' ');

        let total_monney = $(this).data('total');
        let name = $("#input_name").val();
        let phone = $("#input_phone").val();
        let address = $("#input_address").val();
        let note = $("#input_note").val();
console.log(name);
console.log(phone);
console.log(address);
console.log(note);
console.log(total_monney);
       let apiOderSave = '{{route("product.oder.save")}}';
       $.ajax({
           url: apiOderSave,
           method: "POST",
           data: {
               name:name ,
               phone: phone,
               address: address,
               note: note,
               total_monney:total_monney,
               _token: '{{csrf_token()}}',
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    swal("Đặt hàng thành công", "QueenSpa cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ ", "success");
                    window.location.href = '{{route("home")}}';
                }else{
                    if(response.messages.name){
                        $("p#thong_bao_name" ).html('- ' + response.messages.name);
                        }
                    if(response.messages.phone){
                        $("p#thong_bao_phone" ).html('- ' + response.messages.phone);
                            }
                    if(response.messages.address){
                        $("p#thong_bao_address" ).html('- ' + response.messages.address);
                        }
                    if(response.messages.note){
                        $("p#thong_bao_note" ).html('- ' + response.messages.note);
                        }
                    if(response.fail){
                        swal("Đặt hàng thất bại", " ", "warning");
                    }
               }
           }
           
       })

   })

   

})
</script>
@endsection