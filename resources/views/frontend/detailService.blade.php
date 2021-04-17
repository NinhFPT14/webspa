@extends('frontend.layouts.master')
@section('title')
Chi tiết dịch vụ
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
                        <li><a>Chi tiết dịch vụ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
{{-- chi tiết dịch vụ  --}}
<div class="main_blog_area blog_details">
    <div class="container">
        <div class="row">  
            <div class="col-lg-9 col-md-12">
                <!--blog grid area start-->
                <div class="blog_details_wrapper">
                    <div class="single_blog">
                        <div class="blog_title">
                            <div class="blog_post flex">
                                <ul>
                                    <?php 
                                    $name_category = DB::table('categories')->find($data->category_id);
                                    ?>
                                    <p>Loại danh mục : {{$name_category->name}} </p>
                                    <li class="post_author">{{number_format($data->discount)}} vnđ</li>
                                    <li class="post_date" style="text-decoration-line:line-through">{{number_format($data->price)}} vnđ</li>
                                </ul>
                                <a class="button data_service" style="margin-left:50px" data-orderid="{{$data->id}}" data-toggle="modal" data-target="#exampleModal">Đặt lịch</a>
                            </div>
                        </div>
                        <div class="blog_content">
                            <div class="post_content">
                                <strong>{!! $data->name !!}</strong>
                                <blockquote>
                                    <p>{!! $data->description !!}</p>
                                </blockquote>
                                <p>{!! $data->detail !!}</p>
                            </div>
                       </div>
                    </div>
                </div>
                <!--blog grid area start-->
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
                </div>
            </div>
    </div>
</div>

<div class="product_wrapper special_products mb-60">
    <div class="row">
        <div class="col-12">
            <div class="section_title title_style4">
                    <h3>Dịch Vụ Liên Quan</h3>
            </div>
            <div class="row product_slick_row4">
            <?php
              $related_service = DB::table('services')->where('category_id',$data->category_id)->where('id','!=',$data->id)->where('status',0)->get();

            ?>
            @foreach($related_service as $value)
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a class="primary_img" href="{{ route('detailService',['slug'=>$value->slug,'id'=>$value->id]) }}"><img src="{{$value->image}}" alt=""></a>
                        </div>
                        <div class="product_content">
                            <div class="product_name">
                                <h4><a href="{{ route('detailService',['slug'=>$value->slug,'id'=>$value->id]) }}">{{$value->name}}</a></h4>
                                <p>{!! $value->description !!}</p>
                            </div>
                            <div class="price-container">
                                 <div class="price_box">
                                    <span class="current_price">{{number_format($value->discount)}}VNĐ</span>
                                    <span class="old_price">{{number_format($value->price)}}VNĐ</span>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>       
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header  btn-success">
          <h5 class="modal-title" id="exampleModalLabel">ĐẶT LỊCH</h5>
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
  <div class="modal fade" id="modal_otp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
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
                if(response.success == 'ok'){
                    $('#modal_otp').modal('hide');
                    swal("Đặt lịch thành công", "QueenSpa cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ ", "success");
                    window.location.href = '{{route("appointment.listBooking")}}';
                }else if(response.fail){
                    $("p#thong_bao_fail" ).html('- ' + response.fail);
                }else{
                    if(response.messages.id){
                    $("p#thong_bao_id" ).html('- ' + response.messages.id);
                    }
                    if(response.messages.code){
                        $("p#thong_bao_code" ).html('- ' + response.messages.code);
                    }
                }
           }
           
       })
   })

})
</script>
@endsection