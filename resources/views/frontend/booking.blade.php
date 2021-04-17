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
                        <li><a >Đanh sách đơn đặt lịch</a></li>
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
                                        <th class="product_thumb">Số điện thoại</th>
                                        <th class="product_name">Thời gian</th>
                                        <th class="product-price">Ngày</th>
                                        <th class="product_quantity">Trạng thái</th>
                                        <th class="product_quantity">Chi tiết</th>
                                        <th class="product_quantity">Hủy đơn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($data as $value)
                                    <tr id="key{{$value->id}}">
                                    <td class="product_total">{{$value->id}}</td>
                                    <td class="product_total">{{$value->name}}</td>
                                     <td class="product_total">{{$value->phone}}</td>
                                    <td class="product_total">{{$value->time_ficked}}</td>
                                    <td class="product_total">{{$value->time_start}}</td>
                                    @if($value->status == 0)
                                    <td class="product_total text-danger">Chưa xác nhận</td>
                                    @elseif($value->status == 1)
                                    <td class="product_total text-warning">Chờ lên lịch</td>
                                    @elseif($value->status == 2)
                                    <td class="product_total text-primary">Đã lên lịch</td>
                                    @elseif($value->status == 3)
                                    <td class="product_total text-success">Làm xong</td>
                                    @elseif($value->status == 4)
                                    <td class="product_total text-danger">Hủy đơn</td>
                                    @endif
                                    <td class="product_total text-primary"><button >Xem</button></td>
                                    <td class="product_total text-warning btn_huy_don" name="{{$value->id}}"><a id="">Hủy</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@include('sweetalert::alert')
@endsection

@section('page-script')
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<script>
$(document).ready(function() {
    $('.btn_huy_don').on('click', function() {
        swal({
		title: "Bạn chắc chắn muốn hủy đơn?",
		text: "Nếu chắc chắn ấn đồng ý để hủy không ấn Cancel!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Đồng ý',
		closeOnConfirm: false,
	},
	function(){
        let appointment_id =  $('.btn_huy_don').attr('name');
        let urlHuyDon = '{{route("appointment.apiCancel")}}';
        $.ajax({
           url: urlHuyDon,
           method: "POST",
           data: {
               id: appointment_id,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    swal("Hủy đơn thành công", " ", "success");
                    $( "#key"+appointment_id ).remove();
                }else{
                    swal("Hủy đơn thất bại", "", "warning");
                }
           }
           
       })
	});
    })
})
</script>
@endsection