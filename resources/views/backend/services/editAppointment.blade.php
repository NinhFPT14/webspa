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
                        <form method="POST"  action="{{route('storeProduct')}}" enctype="multipart/form-data">
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
                            <input type="text" name="name" class="form-control" value="{{$data->phone}}" >
                            @error('name')
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
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ngày làm</label>
                            <input type="date" name="name" class="form-control" value="{{date("Y-m-d", strtotime($data->time_start))}}" >
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Lời nhắn</label>
                            <textarea class="form-control" name="description" id="descs" cols="30" rows="4">{{$data->note}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Gọi xác nhận</label>
                            <select class="form-control" name="time_ficked">
                                <option selected disabled value="">Chọn trạng thái</option>
                                <option  value="1">Đã gọi</option>
                                <option  value="2">Không nghe</option>
                            </select>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning float-right ">Lưu</button>
                    </form>
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
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Huỷ lịch</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($sort as $value)
                                <tr>
                                    <th scope="row">{{$value->name_location}}</th>
                                    <td>{{$value->name_service}}</td>
                                    <td>{{$value->time_start}}</td>
                                    <td>{{$value->time_end}}</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" name="time_ficked">
                                                <option  value="0" {{$value->status == 0 ? 'selected':''}}>Chờ đến làm </option>
                                                <option  value="1" {{$value->status == 1 ? 'selected':''}}>Đang làm</option>
                                                <option  value="2" {{$value->status == 2 ? 'selected':''}}>Làm xong</option>
                                                <option  value="3" {{$value->status == 3 ? 'selected':''}}>Đã huỷ</option>
                                            </select>
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>    
                                    </td>
                                    <td>
                                        @if($value->status == 0)
                                        <a href="{{route('cancelAppointment',['id'=>$value->id])}}" class="text-danger">Huỷ</a>
                                        @endif
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
            
        </div>
</div>
@endsection



@section('js')
<script>
$(document).ready(function() {
    $(".mul-select").select2();
})
</script>
@endsection