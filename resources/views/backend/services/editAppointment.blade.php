@extends('backend.layouts.master')
@section('title')
Sửa đơn đặt lịch
@endsection
@section('content')

<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('listAppointment')}}">Danh sách đơn</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa đơn đặt lịch #{{$data->id}}</li>
        </ol>
    </nav>

    
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin đơn</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="myform"  action="{{route('updateAppointment',['id'=>$data->id])}}" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <select class="mul-select form-control " id="modal_service" name="service_id[]" multiple>
                                <?php
                                $category = DB::table('categories')->where('type',1)->where('status',0)->get();
                                ?>
                                @foreach($category as $value)
                                <?php
                                    $service = DB::table('services')->where('status',0)->where('category_id', $value->id)->get();
                                ?>
                                @foreach($service as $item)
                                    @foreach($service_id as $id)
                                        <option value="{{$item->id}}" {{$item->id == $id->service_id ? 'selected':''}}>{{$item->name}}</option>
                                    @endforeach
                                @endforeach
                                @endforeach
                            </select>
                            @error('service_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Họ tên</label>
                            <input type="text" name="name" class="form-control"  value="{{$data->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" value="{{$data->phone}}" >
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Thời gian mong muốn</label>
                            <select class="form-control" name="time_ficked">
                                <option selected disabled value="">Chọn thời gian</option>
                                <option  value="Sáng" {{$data->time_ficked == 'Sáng' ? 'selected':''}}>Sáng</option>
                                <option  value="Chiều" {{$data->time_ficked == 'Chiều' ? 'selected':''}}>Chiều</option>
                                <option  value="Tối" {{$data->time_ficked == 'Tối' ? 'selected':''}}>Tối</option>
                            </select>
                            @error('time_ficked')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ngày làm</label>
                            <input type="date" name="time_start" class="form-control" value="{{date("Y-m-d", strtotime($data->time_start))}}" >
                            @error('time_start')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Lời nhắn</label>
                            <textarea class="form-control" name="note" id="descs" cols="30" rows="4">{{$data->note}}</textarea>
                            @error('note')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Gọi xác nhận</label>
                            <select class="form-control" name="call_confirmation">
                                <option selected disabled value=""></option>
                                <option  value="1" {{$data->call_confirmation == 1 ? 'selected':''}}>Đã gọi</option>
                                <option  value="2" {{$data->call_confirmation == 2 ? 'selected':''}}>Không nghe</option>
                            </select>
                            @error('call_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Thanh toán</label>
                            <select class="form-control" name="payment_methods">
                                <option selected disabled value=""></option>
                                <option  value="1" {{$data->payment_methods == 1 ? 'selected':''}}>Thanh toán chuyển khoản</option>
                                <option  value="2" {{$data->payment_methods == 2 ? 'selected':''}}>Thanh toán tiền mặt</option>
                            </select>
                            @error('payment_methods')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Trạng thái đơn</label>
                            <select  name="status" class="form-control">
                                <option value="1" {{$data->status == 1 ? 'selected':''}} >Chờ lên lịch</option>
                                <option value="2" {{$data->status == 2 ? 'selected':''}}>Đã lên lịch</option>
                                <option value="3" {{$data->status == 3 ? 'selected':''}}>Làm xong</option>
                                <option value="4" {{$data->status == 4 ? 'selected':''}}>Từ chối</option>
                            </select>
                        </div>
                       </form>
                       <form method="POST"  action="{{route('voucherAppointment',['id'=>$data->id])}}">
                           @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="code" class="form-control" placeholder="Nhập mã giảm giá" >
                                <button class="btn btn-success" type="submit" id="button-addon2">Áp dụng</button>
                            </div>
                             
                            @if (\Session::has('message'))
                                <div class="alert alert-danger">{!! \Session::get('message') !!}</div>
                             @endif
                      </form>
                        <button type="submit" form="myform" class="btn btn-warning float-right ">Lưu</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách lịch làm</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Ghế</th>
                                <th scope="col">Dịch vụ</th>
                                <th scope="col">Bắt đầu</th>
                                <th scope="col">Kết thúc</th>
                                <th scope="col">Huỷ lịch</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($sort as $value)
                                <tr id="key{{$value->id}}">
                                    <th scope="row">{{$value->name_location}}</th>
                                    <td>{{$value->name_service}}</td>
                                    <td>{{$value->time_start}}</td>
                                    <td>{{$value->time_end}}</td>
                                    <td>
                                        @if($value->status == 0)
                                        <a  data-appointmentid="{{$value->id}}" class="text-danger btn_xoa_lich">Xoá</a>
                                        @endif
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>

                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Tạm tính : {{number_format($data->total_money)}} VNĐ</th>
                              </tr>
                              <tr>
                                <th scope="col">VAT(10%) : {{number_format(($data->total_money*10)/100)}} VNĐ</th>
                              </tr>
                              <tr>
                                <th scope="col">Mã giảm giá : {{number_format($data->discount_money)}} VNĐ</th>
                              </tr>
                              <tr>
                                <th scope="col">Tổng tiền : {{number_format($data->total_money +(($data->total_money*10)/100)- ($data->discount_money))}} VNĐ </th>
                              </tr>
                            </thead>
                          </table>
                    </div>
                </div>
            </div>
            
        </div>
</div>
@endsection



@section('js')
<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<script>
$(document).ready(function() {
    $(".mul-select").select2();
    $('.btn_xoa_lich').on('click', function() {
    let id = $(this).data('appointmentid');
    let apiDelete = '{{route("deleteSortAppointment")}}';
    swal({
        title: "Xoá lịch làm",
        text: "Nếu chắc chắn muốn xoá lịch làm ấn ĐỒNG Ý không ấn TỪ CHỐI!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: 'success',
        cancelButtonText: 'Từ chối',
        confirmButtonText: 'Đồng ý',
        closeOnConfirm: true,
    },
    function(){
        $.ajax({
        url: apiDelete,
        method: "POST",
        data: {
            id: id,
            _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(response) {
                if(response.data){
                    swal("Xoá lịch làm thành công", "", "warning");
                    location.reload();
                }
            
            }

    })
    });
    
})
})
</script>
@endsection