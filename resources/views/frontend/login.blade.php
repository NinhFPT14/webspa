@extends('frontend.layouts.master')
@section('title')
Đăng nhập
@endsection
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="">Trang Chủ</a></li>
                            <li><a href="{{route('login')}}">Đăng nhập</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Đăng Nhập</h2>
                        <form action="{{route('getLogin')}}" method="POST">
                         @csrf
                
                            <p>   
                                <label>Tài Khoản <span>*</span></label>
                                <input type="number" name="phone" value="{{ old('phone') }}">
                             </p>
                             <p>   
                                <label>Mật Khẩu <span>*</span></label>
                                <input type="password" name="password" value="{{ old('password') }}">
                             </p>   
                            <div class="login_submit">
                               <a class="modal_phone">Quên Mật Khẩu?</a>
                                <button type="submit">Đăng Nhập</button>
                            </div>
                        </form>
                     </div>    
                </div>
                <!--login area start-->
            </div>
        </div>    
    </div>

    <!-- Modal chi tiết-->
 <div class="modal fade" data-keyboard="false"  data-backdrop="static" id="modal_nhap_phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header  btn-success">
          <h5 class="modal-title " id="exampleModalLabel">NHẬP SỐ ĐIỆN THOẠI LẤY LẠI MẬT KHẨU</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputPassword1">Nhập số điện thoại</label>
                <input type="text" class="form-control" id="modal_phone" >
                <p id="thong_bao_validate" class="text-danger"></p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn_xac_nhan_phone">GỬI</button>
        </div>
      </div>
    </div>
  </div>

     <!-- Modal chi tiết-->
 <div class="modal fade" data-keyboard="false"  data-backdrop="static" id="modal_otp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header  btn-success">
          <h5 class="modal-title " id="exampleModalLabel">XÁC NHẬN MÃ OTP LẤY LẠI MẬT KHẨU</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputPassword1">Nhập mã otp</label>
                <input type="text" class="form-control" id="code_otp" >
                <p id="thong_bao_otp" class="text-danger"></p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-gui-otp">GỬI</button>
        </div>
      </div>
    </div>
  </div>

@include('sweetalert::alert')
@endsection




@section('page-script')
<script>
$(document).ready(function() {
    $('.modal_phone').on('click', function() {
        $("p#thong_bao_validate" ).html(' ');
        $("#modal_phone").val(' ');
        $("p#thong_bao_otp" ).html(' ');
        $("#code_otp").val(' ');
        $('#modal_nhap_phone').modal('show')
        
    })

    $('.btn_xac_nhan_phone').on('click', function() {
        $("p#thong_bao_validate" ).html(' ');
        let phone =  $("#modal_phone").val();
        let apiConfirmPhone = '{{route("login.confirm.phone")}}';
       $.ajax({
           url: apiConfirmPhone,
           method: "POST",
           data: {
                phone: phone,
               _token: '{{csrf_token()}}'
           },
           dataType: 'json',
           success: function(response) {
                if(response.data){
                    $('#modal_nhap_phone').modal('hide');
                    $('#modal_otp').modal('show');
                    $('.btn-gui-otp').attr('name',response.data);
                }else if(response.messages){
                    $("p#thong_bao_validate" ).html('- ' + response.messages.phone);
                }else{
                    $("p#thong_bao_validate" ).html('- ' + response.fail);
                }
           }
           
       })
    })

    $('.btn-gui-otp').on('click', function() {
        $("p#thong_bao_otp" ).html(' ');
        let code = $("#code_otp").val();
        let id = $('.btn-gui-otp').attr('name');
        let apiConfirmOtp = '{{route("login.renew.password")}}';
        $.ajax({
            url: apiConfirmOtp,
            method: "POST",
            data: {
                id: id,
                code:code,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                if(response.data){
                    $('#modal_otp').modal('hide');
                    swal("Thành công", "Mật khẩu mới đã được cấp lại và gửi về số điện thoại", "success");
                }else if(response.messages){
                    $("p#thong_bao_otp" ).html('- ' + response.messages.code);
                }
                else{
                    $("p#thong_bao_otp" ).html('- ' + response.fail);
                }
            }
        })
    })
})
</script>
@endsection

