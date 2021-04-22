@extends('frontend.layouts.master')
@section('title')
Danh sách đơn đặt lịch
@endsection
@section('content')


<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a>Trang Chủ</a></li>
                        <li><a >Đanh sách đơn đặt hàng </a></li>
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
                                        <th class="product_remove">Mã đơn</th>
                                        <th class="product_thumb">Họ tên</th>
                                        <th class="product_name">Số điện thoại</th>
                                        <th class="product_quantity">Chi tiết</th>
                                        <th class="product_quantity">Trạng thái</th>
                                        <th class="product_quantity">Hủy đơn</th>
                                    </tr>
                                </thead>
                                @if(\Cookie::get('oderId'))
                                <?php 
                                $oder=\Cookie::get('oderId');
                                $oder=json_decode($oder);
                                $listOder = DB::table('oders')->whereIn('id', $oder)->orderBy('id', 'DESC')->get();
                                ?>
                                <tbody>
                                @foreach($listOder as $value )
                                <tr id="key{{$value->id}}">
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->phone_number}}</td>
                                    <td class="product_total text-primary detail_oder" data-orderid="{{$value->id}}"><a>Xem</a></td>
                                    @if($value->status == 0)
                                    <td class="text-warning order_status{{$value->id}}">Chờ xác nhận</td>
                                    @elseif($value->status == 1)
                                    <td class="text-primary order_status{{$value->id}}">Đã xác nhận</td>
                                    @elseif($value->status == 2)
                                    <td class="text-success order_status{{$value->id}}">Đang gửi</td>
                                    @elseif($value->status == 3)
                                    <td class="text-success order_status{{$value->id}}">Đã nhận hàng</td>
                                    @elseif($value->status == 4)
                                    <td class="text-danger">Từ chối</td>
                                    @else
                                    <td class="text-danger">Đã huỷ</td>
                                    @endif
                                    @if($value->status == 0 || $value->status == 1)
                                    <td class="product_total text-danger btn_huy_don" data-orderid="{{$value->id}}"><i class="fa fa-trash-o"></i></td>
                                    @endif
                                </tr>
                                @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



 <!-- Modal chi tiết-->
 <div class="modal fade" data-keyboard="false"  data-backdrop="static" id="modal_chi_tiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header  btn-success">
          <h5 class="modal-title " id="exampleModalLabel">CHI TIẾT ĐƠN ĐẶT HÀNG</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Họ tên</label>
                  <input type="text" class="form-control" id="modal_name" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Số điện thoại</label>
                  <input type="text" class="form-control" id="modal_phone" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Địa chỉ</label>
                  <input type="text" class="form-control" id="modal_address" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Lời nhắn</label>
                    <textarea class="form-control"  name="note" id="modal_detail_note" rows="5"></textarea>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Tên sản phẩm </th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        </tr>
                    </thead>
                    <tbody id="modal_tbody">
                    </tbody>
                    <thead>
                        <tr>
                        <th scope="col">Tổng tiền </th>
                        <th scope="col"></th>
                        <th scope="col" class="modal_total_monney_detail"></th>
                        </tr>
                    </thead>
                </table>
                <p class="modal_created_at"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">TẮT</button>
        </div>
      </div>
    </div>
  </div>
@endsection



@section('page-script')
<script>
$(document).ready(function() {
    $('.detail_oder').on('click', function() {
        $('#modal_chi_tiet').modal('show')
        let order_id = $(this).data('orderid');
        let apiOrderDetail = '{{route("product.order.detail")}}';
       $.ajax({
           url: apiOrderDetail,
           method: "POST",
           data: {
               id: order_id,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    $("#modal_name").val(response.data.name);
                    $("#modal_address").val(response.data.address);
                    $("#modal_phone").val(response.data.phone_number);
                    $("#modal_note").val(response.data.note);
                    $("p.modal_created_at").html('Thời gian đặt : ' + moment(response.data.created_at).format('DD-MM-YYYY h:mm'));
                    $("th.modal_total_monney_detail").html(new Intl.NumberFormat().format(response.data.total_monney)+ ' VNĐ');
                }
                if(response.product){
                    let output = "";
                    for(let i = 0; i < response.product.length; i++) {
                        var obj = response.product[i];
                        var price = new Intl.NumberFormat().format(obj.price);
                        output += `<tr>
                        <th scope="row"> `+obj.name+`</th>
                        <td> `+obj.quality+`</td>
                        <td> `+price+` VNĐ</td>
                        </tr>`;
                    }
                    $("#modal_tbody").html(output);
                }else{
                    swal("Đơn đặt hàng không tồn tại", "", "warning");
                }
           }
           
       })
    })

    $('.btn_huy_don').on('click', function() {
       let oder_id = $(this).data('orderid');
        swal({
		title: "Bạn chắc chắn muốn hủy đơn?",
		text: "Nếu chắc chắn ấn ĐỒNG Ý không ấn Từ chối!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
        cancelButtonText: 'Từ chối',
		confirmButtonText: 'Đồng ý',
		closeOnConfirm: true,
	},
	function(){
       let apiOderDelete = '{{route("product.oder.delete")}}';
       $.ajax({
           url: apiOderDelete,
           method: "POST",
           data: {
               id: oder_id,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    $("td.order_status"+response.data ).html('Đã huỷ');
                    $("td.order_status"+response.data).attr('class','text-danger');
                }else{
                    swal("Đơn đặt hàng không tồn tại", "", "warning");
                }
           }
           
       })
	});
    })
    

})
</script>
@endsection
