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
            <li class="breadcrumb-item active" aria-current="page">Sửa đơn đặt lịch #</li>
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
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Họ tên</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Số điện thoại</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Thời gian mong muốn</label>
                            <select class="form-control" name="time_ficked">
                                <option selected disabled value="">Chọn thời gian</option>
                                <option  value="Sáng">Sáng</option>
                                <option  value="Chiều">Chiều</option>
                                <option  value="Tối">Tối</option>
                            </select>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ngày làm</label>
                            <input type="date" name="name" class="form-control" id="formGroupExampleInput">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Lời nhắn</label>
                            <textarea class="form-control" name="description" id="descs" cols="30" rows="4"></textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning float-right ">Sửa</button>
                    </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Xếp lịch</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Giá cũ</label>
                            <input type="text" name="price" class="form-control" id="formGroupExampleInput" >
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Giá giảm</label>
                            <input type="text" name="discount" class="form-control" id="formGroupExampleInput">
                            @error('discount')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Số lượng</label>
                            <input type="text" name="quality" class="form-control" id="formGroupExampleInput" >
                            @error('quality')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right ">Tạo</button>
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