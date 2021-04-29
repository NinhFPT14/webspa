@extends("backend.layouts.master")
@section("title")
Danh sách đơn đặt lịch
@endsection
@section('content')
@section("link")
{{--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
@endsection
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('listAppointment')}}">Danh sách đơn đặt lịch</a></li>
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
                        <option selected disabled value="">Chọn trạng thái</option>
                        <option value="1" {{$type == 1 ? 'selected':''}} >Chờ lên lịch</option>
                        <option value="2" {{$type == 2 ? 'selected':''}}>Đã lên lịch</option>
                        <option value="3" {{$type == 3 ? 'selected':''}}>Làm xong</option>
                        <option value="4" {{$type == 4 ? 'selected':''}}>Từ chối</option>
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
                            <th scope="col">Tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Ngày hẹn</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chi tiết</th>
                            <th scope="col">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($appointment as $value)
                        <tr>
                            <td scope="col">{{$value->id}}</td>
                            <td scope="col">{{$value->name}}</td>
                            <td scope="col">{{$value->phone}}</td>
                            <td scope="col">{{$value->time_ficked}}</td>
                            <td scope="col">{{date('d/m/Y',strtotime($value->time_start))}}</td>
                            <td>
                                @if($value->status == 1)
                                <p style="color:#FFCC33">Chờ lên lịch<p>
                                @elseif($value->status == 2)
                                <p style="color:#00aeff">Đã lên lịch<p>
                                @elseif($value->status == 3)
                                <p style="color:#00FFCC">Làm xong<p>
                                @elseif($value->status == 4)
                                <p style="color:#FF0033">Từ chối<p>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary btn-xem-chi-tiet" data-appointmentid="{{$value->id}}" target="_blank">Xem</a>
                            </td>
                            <td>
                                <a class="btn btn-warning " href="{{route('editAppointment',['id'=>$value->id])}}">Sửa</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$appointment->links()!!}
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
        <h5 class="modal-title" id="staticBackdropLabel">CHI TIẾT ĐƠN ĐẶT LỊCH</h5>
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
                  <label for="exampleInputPassword1">Thời gian mong muốn</label>
                  <input type="text" class="form-control" id="modal_time_ficked" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ngày làm</label>
                  <input type="text" class="form-control" id="modal_time_start" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Lời nhắn</label>
                    <textarea class="form-control"  name="note" id="modal_detail_note" rows="5"></textarea>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Tên dịch vụ </th>
                        <th scope="col">Giá</th>
                        </tr>
                    </thead>
                    <tbody id="modal_tbody">
                    </tbody>
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col"></th>
                        </tr>

                        <tr>
                            <th scope="col">Tạm tính </th>
                            <th scope="col" class="tam_tinh"></th>
                        </tr>

                        <tr>
                            <th scope="col">VAT(10%)</th>
                            <th scope="col" class="thue_vat"></th>
                        </tr>
                        <tr>
                            <th scope="col">Mã giảm giá</th>
                            <th scope="col" class="ma_giam_gia"></th>
                        </tr>
                        <tr>
                            <th scope="col">Tổng tiền </th>
                            <th scope="col" class="modal_total_monney_detail"></th>
                        </tr>
                    </thead>
                </table>
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
    $('.btn-xem-chi-tiet').on('click', function() {
        $('#staticBackdrop').modal('show')
        let id = $(this).data('appointmentid');
        let apiDetail = '{{route("detailAppointment")}}';
        $.ajax({
            url: apiDetail,
            method: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                    if(response.data){
                        $("#modal_name").val(response.data.name);
                        $("#modal_phone").val(response.data.phone);
                        $("#modal_time_ficked").val(response.data.time_ficked);
                        $("#modal_time_start").val(response.data.time_start);
                        $("#modal_detail_note").val(response.data.note);

                        let output = "";
                        let total = "";
                        for(let i = 0; i < response.service.length; i++) {
                        var obj = response.service[i];
                        var price = new Intl.NumberFormat().format(obj.discount);
                        output += `<tr>
                        <th scope="row"> `+obj.name+`</th>
                        <td> `+price+` VNĐ</td>
                        </tr>`;
                    }

                    $("#modal_tbody").html(output);
                    $(".tam_tinh").html(new Intl.NumberFormat().format(response.data.total_money) + ' VNĐ');
                    $(".thue_vat").html(new Intl.NumberFormat().format((response.data.total_money*10)/100) + ' VNĐ');
                    $(".ma_giam_gia").html(new Intl.NumberFormat().format(response.data.discount_money) + ' VNĐ');
                    $(".modal_total_monney_detail").html(new Intl.NumberFormat().format((response.data.total_money)+(response.data.total_money*10)/100-(response.data.discount_money)) + ' VNĐ');
                    }else{
                        swal("Đơn đặt hàng không tồn tại", "", "warning");
                    }
            }

        })

    })

})
</script>
@endsection
