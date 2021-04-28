@extends('frontend.layouts.master')
@section('title', 'Đặt Lịch')

@section('content')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                <div class="breadcrumb_content">
                    <h1 class="text-center "
                        style="font-weight:bold;font-family:'Times New Roman', Times, serif;font-size:30px;margin-top:40px;">
                        ĐẶT
                        LỊCH HẸN</h1>
                    <p class="text-center pt-6">KHUYẾN KHÍCH ĐẶT LỊCH HẸN TRƯỚC. XIN VUI LÒNG LIÊN HỆ VỚI CHÚNG TÔI NẾU
                        QUÝ KHÁCH CÓ
                        BẤT KỲ THẮC MẮC NÀO
                        LIÊN QUAN ĐẾN <br> CÁC GÓI DỊCH VỤ </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container  pt-4" style="background-color:#f9f9f9;">
    <form style=" margin-top:-90px">
        @csrf
        <div class="pt-24 ">
            <div class="p-4">
                <div class="row pl-10 pt-4 pr-3 ">
                    <strong>Chọn dịch vụ<span class="text-danger">*</span></strong>
                    <select class="mul-select form-control " id="modal_service" name="service_id[]" multiple>
                        <?php
                        $category = DB::table('categories')->where('type',1)->where('status',0)->get();
                        ?>
                        @foreach($category as $value)
                        <?php
                            $service = DB::table('services')->where('status',0)->where('category_id', $value->id)->get();
                        ?>
                        @foreach($service as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        @endforeach
                    </select>
                    <p id="thong_bao_service" class="text-danger"></p><br>
                </div>

                <div class="pt-4 ">
                    <div class=" row pl-4">
                        <div class="col-md-6 ">
                            <label><strong>Chọn thời gian<span class="text-danger">*</span></strong></label>
                            <select class="form-control" id="modal_time_ficked" name="time_ficked">
                                <option selected disabled value="">Chọn thời gian</option>
                                <option  value="Sáng">Sáng</option>
                                <option  value="Chiều">Chiều</option>
                                <option  value="Tối">Tối</option>
                            </select>
                            <p id="thong_bao_time_ficked" class="text-danger"></p><br>
                        </div>
                        <div class="col-md-6">
                            <label><strong> Ngày Hẹn<span class="text-danger"> *</span></strong></label>
                            <input type="date" id="modal_time_start"  class="form-control pr-4" name="time_start">
                            <p id="thong_bao_time_start" class="text-danger"></p><br>
                        </div>

                    </div>
                </div>
                <div class="row pl-4 pt-4">
                    <div class="col">
                        <label><strong>Họ tên<span class="text-danger">*</span></strong></label>
                        <input type="text" id="modal_full_name" class="form-control" name="name">
                        <p id="thong_bao_name" class="text-danger"></p><br>
                    </div>
                    <div class="col">
                        <label><strong>Số Điện Thoại<span class="text-danger">*</span></strong></label>
                        <input type="text" id="modal_phone_number" class="form-control" name="phone" maxlength="10">
                        <p id="thong_bao_phone" class="text-danger"></p><br>
                    </div>
                </div>
                <div class="row pl-10 pt-4 pr-3 ">
                    <label><strong>Lời nhắn</strong></label>
                    <textarea name="note" id="modal_note" class="form-control" cols="30" rows="10">{{ old('note') }}</textarea>
                    <p id="thong_bao_note" class="text-danger"></p>
                </div>
                   
            </div>
            <div class="col-12 w-64 h-20 pt-4 pl-6 pr-1 " style="width:100%">
                <button class="btn  form-control modal-dat-lich" style="background-color:#ae307c; color:white" type="button">Đặt lịch</button>
            </div>
        </div>
    </form>
    
</div>
</div>
</div>
</div>



  {{-- Modal otp --}}
  <div class="modal fade" id="modal_otp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false"  data-backdrop="static">
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
          <button type="button" class="btn btn-success modal-xac-nhan-otp" name="">Gửi</button>
        </div>
      </div>
    </div>
  </div>


@endsection
@section('page-script')
<script>
$(document).ready(function() {
    $(".mul-select").select2();
    $('.modal-dat-lich').on('click', function() {
//set lại thông báo validate form đặt lịch
        $("p#thong_bao_name" ).html(' ');
        $("p#thong_bao_phone" ).html(' ');
        $("p#thong_bao_service" ).html(' ');
        $("p#thong_bao_time_ficked" ).html(' ');
        $("p#thong_bao_time_start" ).html(' ');
        $("p#thong_bao_note" ).html(' ');
// Set lại thông báo validata modal otp
        $("p#thong_bao_code" ).html(' ');
        $("p#thong_bao_fail" ).html(' ');
        $("p#thong_bao_id" ).html(' ');
        $("#modal_code_otp").val( ' ');


       let service_id = $("#modal_service").val();
       let name = $("#modal_full_name").val();
       let phone = $("#modal_phone_number").val();
       let time_ficked = $("#modal_time_ficked").val();
       let time_start = $("#modal_time_start").val();
       let note = $("#modal_note").val();
       let apiApopointmentSave = '{{route("appointment.apiSave")}}';
       $.ajax({
           url: apiApopointmentSave,
           method: "POST",
           data: {
               name: name,
               service_id: service_id,
               phone: phone,
               time_ficked: time_ficked,
               time_start: time_start,
               note: note,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
               if(response.data){
                   $('#modal_otp').modal('show');
                   $("h5.modal_ma_don" ).html('XÁC NHẬN OTP - '+' Mã đơn #' + response.data);
                   $('.modal-xac-nhan-otp').attr('name',response.data);
               }else{
                    if(response.messages.name){
                        $("p#thong_bao_name" ).html('- ' + response.messages.name);
                        }
                    if(response.messages.phone){
                        $("p#thong_bao_phone" ).html('- ' + response.messages.phone);
                            }
                    if(response.messages.service_id){
                        $("p#thong_bao_service" ).html('- ' + response.messages.service_id);
                        }
                    if(response.messages.time_ficked){
                        $("p#thong_bao_time_ficked" ).html('- ' + response.messages.time_ficked);
                        }
                    if(response.messages.time_start){
                        $("p#thong_bao_time_start" ).html('- ' + response.messages.time_start);
                        }
                    if(response.messages.note){
                        $("p#thong_bao_note" ).html('- ' + response.messages.note);
                        }
               }
           }
       })
   })

   $('.modal-xac-nhan-otp').on('click', function() {
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
                    swal("Đặt lịch thành công", "QueenSpa cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ ", "success");
                    window.location.href = '{{route("appointment.listBooking")}}';
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
})
</script>
@endsection


