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
                                <th class="product_remove"></th>
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
                            <tr id="key{{$value->id}}">
                                 <td><input type="checkbox" class="form-check-input checkbox" name="choose" value="{{$value->id}}"></td>
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
                                 <td class="product_quantity"><label>Số lượng</label> <input class="number_product" name="number" min="1" max="100" value="{{$number_product}}" data-productid="{{$value->id}}" type="number">
                                </td>
                               </form>
                            <td id="product_total{{$value->id}}">{{number_format($value->discount * $number_product)}} VNĐ</td>
                                <td class="product_id_remove text-danger" data-productid="{{$value->id}}"><i class="fa fa-trash-o"></i></td>
                             </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>   
                        </div>  
                        <div class="cart_submit">
                            <a class="float-left ml-11"><input type="checkbox" id="checkboxAll">  Tất cả</a>
                            <a class="btn btn-success oder_product">Đặt hàng</a>
                        </div>      
                    </div>
                 </div>
             </div>
    </div>     
</div>
<!--shopping cart area end -->

@endsection


@section('page-script')
<script>
$(document).ready(function() {
    $('#checkboxAll').on('click', function() {
        var status = $('#checkboxAll').is(':checked');
        if(status == true){
            $("input.checkbox").prop('checked',true);
        }else{
            $("input.checkbox").prop('checked',false);
        }
   })

   $('.oder_product').on('click', function() {
            var checkbox = document.getElementsByName('choose');
            var result = new Array();
            // Lặp qua từng checkbox để lấy giá trị
            for (var i = 0; i < checkbox.length; i++){
                if (checkbox[i].checked === true){
                    result.push(checkbox[i].value);
                }
            }
            if(result.length >=1){
                let apiOderAdd = '{{route("product.oder.add")}}';
                $.ajax({
                url: apiOderAdd,
                method: "POST",
                data: {
                    id: result,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(response) {
                        if(response.data){
                            swal("Thành công", "", "success");
                        }else{
                            swal("Thất bại", "", "warning");
                            }
                        }
                    })
            }else{
                swal("Từ chối", "Bạn phải chọn sản phẩm trước khi đặt", "warning");
            }
   })

   $('.product_id_remove').on('click', function() {
    let product_id = $(this).data('productid');
    let apiDeleteCart = '{{route("cart.delete")}}';
    swal({
		title: "Bạn chắc chắn muốn xoá sản phẩm này?",
		text: "Nếu chắc chắn ấn ĐỒNG Ý không ấn Từ chối!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#ce1126',
        cancelButtonText: 'Từ chối',
		confirmButtonText: 'Đồng ý',
		closeOnConfirm: true,
	},
	function(){
        $.ajax({
           url: apiDeleteCart,
           method: "POST",
           data: {
               id: product_id,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    $( "#key"+product_id ).remove();
                }else{
                    swal("Thất bại", "", "warning");
                }
           }
           
       })
	});
   })
    $('.number_product').on('change', function() {
        let product_id = $(this).data('productid');
        let number = $(this).val();
       let apiUpdateCart = '{{route("cart.update")}}';
       $.ajax({
           url: apiUpdateCart,
           method: "POST",
           data: {
               id: product_id,
               number: number,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    $("td#product_total"+product_id ).html(new Intl.NumberFormat().format(response.data * number)+ 'VNĐ');
                }else{
                    swal("Thất bại", "", "warning");
                }
           }
           
       })
   })

   

})
</script>
@endsection