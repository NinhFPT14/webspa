@extends('backend.layouts.master')
@section('title')
Danh sách đơn đặt hàng
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('product.order.admin')}}">Danh sách đơn đặt hàng</a></li>
        </ol>
    </nav>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
                @csrf
                <div class="input-group">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm ..." name="key" value="{{$key}}">
                    </div>
                    <div class="input-group input-daterange">
                        <input type="text" class="form-control" name="from_time" autocomplete="off" value="{{$from_time}}">
                        <div class="input-group-addon">đến</div>
                        <input type="text" class="form-control" name="to_time" autocomplete="off" value="{{$to_time}}">
                    </div>
                    <div class="form-group">
                        <select  name="type" class="form-control">
                            <option value="0" {{$type == 0 ? 'selected':''}} >Chờ xác nhận</option>
                            <option value="1" {{$type == 1 ? 'selected':''}}>Đã lên đơn </option>
                            <option value="2"{{$type == 2 ? 'selected':''}}>Đã gửi hàng</option>
                            <option value="3"{{$type == 3 ? 'selected':''}}>Đã nhận hàng</option>
                            <option value="4"{{$type == 4 ? 'selected':''}}>Từ chối đơn</option>
                            <option value="6"{{$type == 6 ? 'selected':''}}>Hoàn trả</option>
                        </select>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Mã đơn</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Trạng thái </th>
                            <th scope="col">Ngày</th>
                            <th scope="col">Chi tiết</th>
                            <th scope="col">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $value)
                        <tr>
                            <th scope="row">{{$value->id}}</th>
                            <th>{{$value->name}}</th>
                            <th>{{$value->phone_number}}</th>
                            <th>
                                @if($value->status == 0)
                                <p style="color:#FFCC33">Chờ xác nhận<p>
                                @elseif($value->status == 1)
                                <p style="color:#00aeff">Đã lên đơn<p>
                                @elseif($value->status == 2)
                                <p style="color:#00FFCC">Đã gửi hàng<p>
                                @elseif($value->status == 3)
                                <p style="color:#009966">Đã nhận hàng<p>
                                @elseif($value->status == 4)
                                <p style="color:#FF0033">Từ chối đơn<p>
                                @elseif($value->status == 6)
                                <p style="color:#0000FF">Hoàn trả<p>
                                @endif
                                {{-- <div class="form-group">
                                    <select  name="type" class="form-control">
                                        <option value="0" {{$value->status == 0 ? 'selected':''}} >Chờ xác nhận</option>
                                        <option value="1" {{$value->status == 1 ? 'selected':''}}>Đã lên đơn </option>
                                        <option value="2"{{$value->status == 2 ? 'selected':''}}>Đã gửi hàng</option>
                                        <option value="3"{{$value->status == 3 ? 'selected':''}}>Đã nhận hàng</option>
                                        <option value="4"{{$value->status == 4 ? 'selected':''}}>Từ chối đơn</option>
                                        <option value="6"{{$value->status == 6 ? 'selected':''}}>Hoàn trả</option>
                                    </select>
                                </div> --}}
                            </th>
                            <th>{{date("d/m/Y H:i", strtotime($value->created_at))}}</th>
                            <td>
                                <a class="btn btn-primary detail_oder" data-orderid="{{$value->id}}">Xem</a>
                            </td>
                            <td>
                                <a class="btn btn-warning " href="{{route('product.order.edit',['id'=>$value->id])}}">Sửa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$data->links()!!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal chi tiết-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header btn-success">
        <h5 class="modal-title" id="staticBackdropLabel">CHI TIẾT ĐƠN ĐẶT HÀNG</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
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
                        
                    </thead>
                </table>
                <p class="modal_tax"></p>
                <p class="modal_total_monney_detail"></p>
                <p class="modal_created_at"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TẮT</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('.input-daterange input').each(function() {
        $(this).datepicker({
            clearDates: true,
            format: "dd/mm/yyyy"
        });
    });
    $('.detail_oder').on('click', function() {
        $('#staticBackdrop').modal('show')
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
                    $("p.modal_created_at").html('Thời gian đặt : ' + moment(response.data.created_at).format('DD-MM-YYYY HH:mm'));
                    $("p.modal_tax").html('  Thuế VAT 10 % :' +new Intl.NumberFormat().format(response.data.tax)+ ' VNĐ');
                    $("p.modal_total_monney_detail").html('  Tổng tiền :' + new Intl.NumberFormat().format(response.data.total_monney)+ ' VNĐ');
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

})
</script>
@endsection