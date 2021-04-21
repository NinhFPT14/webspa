@extends('frontend.layouts.master')
@section('title')
Dịch Vụ
@endsection
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{route('home')}}">Trang chủ</a></li>
                        <li><a href="{{route('service',['id'=>'all'])}}">Dịch vụ</a></li>
                        <li><a>Danh sách dịch vụ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->

<!--blog area start-->
<div class="main_blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="blog_wrapper">
                    <div class="single_blog">   
                        @foreach ($data as $value)
                        <div class="blog_container">
                            <div class="row">
                                <div class="col-lg-4 col-md-5">
                                    <div class="blog_thumb">
                                        <a href="{{ route('detailService',['slug'=>$value->slug,'id'=>$value->id]) }}"><img  src="{{$value->image}}" style="width:300px" alt="" ></a>
                                    </div>
                                </div>
                                
                                <div class="col-lg-8 col-md-7">
                                    <div class="blog_content">
                                        <div class="blog_title">
                                            <h2><a href="{{ route('detailService',['slug'=>$value->slug,'id'=>$value->id]) }}">{{$value->name}}</a></h2>
                                        </div>
                                        <p class="blog_desc">{!! $value->description !!}</p>
                                        <div class="blog_post">
                                            <ul>
                                                <li class="post_author">{{number_format($value->discount)}} vnđ</li>
                                                <li class="post_date" style="text-decoration-line:line-through">{{number_format($value->price)}} vnđ</li>
                                            </ul>
                                        </div><br>
                                        <a class="data_service" data-orderid="{{$value->id}}" data-toggle="modal" data-target="#exampleModal">Đặt lịch</a>
                                    </div>
                                </div>
                            </div>
                        </div><br><br>
                        @endforeach
                        <div class="shop_toolbar t_bottom">
                            <div class="pagination">
                                <ul>
                                    <li class="current">{!!$data->links()!!}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="blog_sidebar_widget">
                    <div class="widget_list widget_categories">
                        <h2>Danh mục</h2>
                        <?php 
                        $category = DB::table('categories')->where('type',1)->where('status',0)->get();
                        ?>
                        <ul>
                            @foreach ($category as $value)
                            <?php
                             $service = DB::table('services')->where('category_id',$value->id)->get();
                            ?>
                            @if(count( $service) >=1)
                            <li>
                                <a href="{{route('service',['id'=> $value->id])}}">{{$value->name}} <span>({{count($service)}})</span></a> 
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget_list widget_search mb-30">
                       <h2>Tìm kiếm</h2>
                       <form action="{{route('service.search.user')}}" method="POST">
                        @csrf
                           <input placeholder="Nhập từ khóa tìm kiếm ..." type="text" name="name">
                           <button type="submit"><i class="fa fa-search"></i></button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" data-keyboard="false"  data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header  btn-success">
          <h5 class="modal-title " id="exampleModalLabel">ĐẶT LỊCH</h5>
          <button type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Dịch vụ <span>*</span></label>
                  <select class="form-control mul-select" name="service_id[]" id="modal_service" multiple style="width:363px">
                    @foreach ($serviceAll as $value)
                      <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
                <p id="thong_bao_service" class="text-danger"></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Họ tên <span>*</span></label>
                  <input type="text" class="form-control" name="full_name" id="modal_full_name" placeholder="Nhập họ tên">
                  <p id="thong_bao_name" class="text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại<span>*</span></label>
                    <input type="text" class="form-control" phone="phone_number" maxlength="10" id="modal_phone_number" placeholder="Nhập số điện thoại">
                    <p id="thong_bao_phone" class="text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Thời gian mong muốn <span>*</span></label>
                    <select class="form-control" name="time_ficked" id="modal_time_ficked">
                        <option selected disabled value="">Chọn thời gian</option>
                        <option  value="Sáng">Sáng</option>
                        <option  value="Chiều">Chiều</option>
                        <option  value="Tối">Tối</option>
                    </select>
                   <p id="thong_bao_time_ficked" class="text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ngày làm <span>*</span></label>
                    <input type="date" class="form-control" name="time_start" id="modal_time_start">
                   <p id="thong_bao_time_start" class="text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Lời nhắn</label>
                    <textarea class="form-control"  name="note" id="modal_note" rows="5"></textarea>
                   <p id="thong_bao_note" class="text-danger"></p>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">HỦY</button>
          <button type="button" class="btn btn-success modal-dat-lich">ĐẶT LỊCH</button>
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
    $('.data_service').on('click', function() {
        let service_id = $(this).data('orderid');
        let modalOption = $('#modal_service').find('option');
                for (let i = 0; i < modalOption.length; i++) {
                    let index = $(modalOption[i]).val();
                    if (index == service_id) {
                        $(modalOption[i]).prop('selected', true);
                    } else {
                        $(modalOption[i]).prop('selected', false);
                    }
                    $(".mul-select").select2();
                }
    })

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
                   $('#exampleModal').modal('hide');
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