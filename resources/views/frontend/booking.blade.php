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
                                        <th class="product_name">Thời gian</th>
                                        <th class="product-price">Ngày</th>
                                        <th class="product_quantity">Trạng thái</th>
                                        <th class="product_quantity">Chi tiết</th>
                                        <th class="product_quantity">Hủy đơn</th>
                                        <th class="product_quantity">Chuyển lịch</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($data as $value)
                                    <tr id="key{{$value->id}}">
                                    <td class="product_total">{{$value->id}}</td>
                                    <td class="product_total">{{$value->name}}</td>
                                    <td class="product_total" id="time_ficked{{$value->id}}">{{$value->time_ficked}}</td>
                                    <td class="product_total" id="time_start{{$value->id}}">{{$value->time_start}}</td>
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
                                    <td class="product_total text-primary btn_chi_tiet" data-orderid="{{$value->id}}"><a>Xem</a></td>

                                    @if ($value->status == 1)
                                    <td class="product_total text-danger btn_huy_don" data-orderid="{{$value->id}}"><i class="fa fa-trash-o"></i></td>
                                    @else
                                    <td class="product_total text-primary"></td>
                                    @endif

                                    @if ($value->status == 1)
                                      <td class="product_total text-success btn_chuyen_lich" data-orderid="{{$value->id}}" ><i class="fa fa-history"></i></td>
                                    @else
                                    <td class="product_total text-primary"></td>
                                    @endif
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

 {{-- Modal chuyể lịch --}}
 <div class="modal fade" data-keyboard="false"  data-backdrop="static" id="modal_convert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header  btn-success">
          <h5 class="modal-title modal_ma_don " id="exampleModalLabel">CHUYỂN LỊCH LÀM</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputPassword1">Thời gian mong muốn <span>*</span></label>
                <select class="form-control" name="time_ficked" id="modal_time_ficked">
                    <option selected disabled value="">Chọn thời gian</option>
                    <option>Sáng</option>
                    <option>Chiều</option>
                    <option>Tối</option>
                </select>
               <p id="thong_bao_time_ficked" class="text-danger"></p>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ngày làm <span>*</span></label>
                <input type="date" class="form-control" name="time_start" id="modal_time_start">
               <p id="thong_bao_time_start" class="text-danger"></p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success modal_conver_appointment" name="">Chuyển</button>
        </div>
      </div>
    </div>
  </div>


  {{-- Modal otp --}}
  <div class="modal fade" data-keyboard="false"  data-backdrop="static" id="modal_otp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header  btn-success">
          <h5 class="modal-title modal_ma_don " id="exampleModalLabel">Xác nhận OTP</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nhập mã otp <span>*</span></label>
                  <input type="number" class="form-control" name="code" id="modal_code_otp">
                </div>

                <div class="form-group">
                    <p id="thong_bao_id" class="text-danger"></p>
                    <p id="thong_bao_code" class="text-danger"></p>
                    <p id="thong_bao_fail" class="text-danger"></p>
                 </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success modal-xac-nhan-otp" id="" name="">Gửi</button>
        </div>
      </div>
    </div>
  </div>


 <!-- Modal chi tiết-->
<div class="modal fade" data-keyboard="false"  data-backdrop="static" id="modal_chi_tiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header  btn-success">
          <h5 class="modal-title " id="exampleModalLabel">CHI TIẾT ĐƠN ĐẶT LỊCH</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Dịch vụ <span>*</span></label>
                  <select class="form-control mul-select"  name="service_id[]" id="modal_detail_service" multiple style="width:363px">
                    @foreach ($serviceAll as $value)
                      <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Họ tên <span>*</span></label>
                  <input type="text" class="form-control" name="full_name" id="modal_detail_full_name" placeholder="Nhập họ tên">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại<span>*</span></label>
                    <input type="text" class="form-control" phone="phone_number" maxlength="10" id="modal_detail_phone_number" placeholder="Nhập số điện thoại">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Thời gian mong muốn <span>*</span></label>
                    <select class="form-control" name="time_ficked" id="modal_detail_time_ficked">
                        <option selected disabled value="">Chọn thời gian</option>
                        <option  value="Sáng">Sáng</option>
                        <option  value="Chiều">Chiều</option>
                        <option  value="Tối">Tối</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ngày làm <span>*</span></label>
                    <input type="text" class="form-control" name="time_start" id="modal_detail_time_start">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Lời nhắn</label>
                    <textarea class="form-control"  name="note" id="modal_detail_note" rows="5"></textarea>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">TẮT</button>
        </div>
      </div>
    </div>
  </div>
@include('sweetalert::alert')
@endsection

@section('page-script')
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<script>
$(document).ready(function() {
    $(".mul-select").select2();
    $('.btn_huy_don').on('click', function() {
        //set lại validate form otp
        $("p#thong_bao_code" ).html(' ');
        $("p#thong_bao_fail" ).html(' ');
        $("p#thong_bao_id" ).html(' ');
        $("#modal_code_otp").val( ' ');
       let appointment_id = $(this).data('orderid');
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
       let apiOtp = '{{route("appointment.apiOtp")}}';
       $.ajax({
           url: apiOtp,
           method: "POST",
           data: {
               id: appointment_id,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    $('#modal_otp').modal('show')
                    $('.modal-xac-nhan-otp').attr('name',response.data);
                    $('.modal-xac-nhan-otp').attr('id','id_huy_don');
                    //set trước name là id apppoinment cho nút chuyển lịch
                    $('.modal_conver_appointment').attr('name',response.data);
                }else{
                    swal("Đơn đặt lịch không tồn tại", "", "warning");
                }
           }
           
       })
	});
    })



    $('.btn_chuyen_lich').on('click', function() {
       let appointment_id = $(this).data('orderid');
        swal({
		title: "Bạn chắc chắn muốn chuyển lịch?",
		text: "Nếu chắc chắn ấn ĐỒNG Ý không ấn Từ chối!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#FFB90F',
        cancelButtonText: 'Từ chối',
		confirmButtonText: 'Đồng ý',
		closeOnConfirm: true,
	},
	function(){
       //set lại validate form otp
       $("p#thong_bao_code" ).html(' ');
        $("p#thong_bao_fail" ).html(' ');
        $("p#thong_bao_id" ).html(' ');
        $("#modal_code_otp").val( ' ');
        $("p#thong_bao_time_ficked" ).html(' ');
        $("p#thong_bao_time_start" ).html(' ');
        $("#modal_time_ficked").val(' ');
        $("#modal_time_start").val(' ');
        $('.modal-xac-nhan-otp').attr('id',' ');
       let apiOtp = '{{route("appointment.apiOtp")}}';
       $.ajax({
           url: apiOtp,
           method: "POST",
           data: {
               id: appointment_id,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    $('#modal_otp').modal('show')
                    $('.modal-xac-nhan-otp').attr('name',response.data);
                    //set trước name là id apppoinment cho nút chuyển lịch
                    $('.modal_conver_appointment').attr('name',response.data);
                }else{
                    swal("Đơn đặt lịch không tồn tại", "", "warning");
                }
           }
           
       })
	});
        
   })

   $('.modal-xac-nhan-otp').on('click', function() {
        $("p#thong_bao_code" ).html(' ');
        $("p#thong_bao_fail" ).html(' ');
        $("p#thong_bao_id" ).html(' ');
       let appointment_id =  $('.modal-xac-nhan-otp').attr('name');
       let code = $("#modal_code_otp").val();
       let apiconfirmOtp = '{{route("appointment.apiconfirmOtp")}}';
       $.ajax({
           url: apiconfirmOtp,
           method: "POST",
           data: {
               id: appointment_id,
               code: code,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.success){
                    $('#modal_otp').modal('hide');
                    if(  $('.modal-xac-nhan-otp').attr('id') == 'id_huy_don'){
                        let appointment_id = response.success;
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
                        swal("Hủy đơn thành công", "", "success");
                    }else{
                        $('#modal_convert').modal('show')
                    }
                }else if(response.fail){
                    $("p#thong_bao_fail" ).html('- ' + response.fail);
                }else if(response.messages.id){
                    $("p#thong_bao_id" ).html('- ' + response.messages.id);
                }else{
                    $("p#thong_bao_code" ).html('- ' + response.messages.code);
                }
           }
           
       })
   })

   $('.modal_conver_appointment').on('click', function() {
        $("p#thong_bao_time_ficked" ).html(' ');
        $("p#thong_bao_time_start" ).html(' ');
       let appointment_id =  $('.modal_conver_appointment').attr('name');
       let time_ficked = $("#modal_time_ficked").val();
       let time_start = $("#modal_time_start").val();
       let apiconfirmOtp = '{{route("appointment.apiConvert")}}';
       $.ajax({
           url: apiconfirmOtp,
           method: "POST",
           data: {
               id: appointment_id,
               time_ficked: time_ficked,
               time_start: time_start,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    $('#modal_convert').modal('hide')
                    swal("Chuyển lịch thành công", "", "success");
                    $( "td#time_ficked"+appointment_id ).html(time_ficked);
                    $( "td#time_start"+appointment_id ).html(time_start);
                }else if(response.messages){
                    if(response.messages.time_ficked){
                        $("p#thong_bao_time_ficked" ).html('- ' + response.messages.time_ficked);
                    }
                    if(response.messages.time_start){
                        $("p#thong_bao_time_start" ).html('- ' + response.messages.time_start);
                    }
                }else{
                    swal("Chuyển lịch không thành công", "", "warning");
                }
           }
           
       })
   })

   $('.btn_chi_tiet').on('click', function() {
       let appointment_id = $(this).data('orderid');
       let apiDetail = '{{route("appointment.apiDetail")}}';
       $.ajax({
           url: apiDetail,
           method: "POST",
           data: {
               id: appointment_id,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    $('#modal_chi_tiet').modal('show');
                    $('#modal_detail_full_name').val(response.data.name);
                    $('#modal_detail_phone_number').val(response.data.phone)
                    $('#modal_detail_note').val(response.data.note)
                    $('#modal_detail_time_start').val(response.data.time_start);
                    let modalOption = $('#modal_detail_service').find('option');
                    for (let i = 0; i < modalOption.length; i++) {
                        let index = response.data.services.findIndex(el => el.id == $(
                            modalOption[i]).val());
                        if (index != -1) {
                            $(modalOption[i]).prop('selected', true);
                        } else {
                            $(modalOption[i]).prop('selected', false);
                        }
                    }

                    let timeFicked = $('#modal_detail_time_ficked').find('option');
                    for (let i = 0; i < timeFicked.length; i++) {
                        if (response.data.time_ficked == $(timeFicked[i]).val()) {
                            $(timeFicked[i]).prop('selected', true);
                        } else {
                            $(timeFicked[i]).prop('selected', false);
                        }
                    }
                $(".mul-select").select2();
                }else{
                    swal("Đơn đặt lịch không tồn tại", "", "warning");
                }
           }
           
       })
   })
})
</script>
@endsection