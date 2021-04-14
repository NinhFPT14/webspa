@extends('backend.layouts.master')
@section('title')
Sửa Voucher
@endsection
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('listVoucherProduct')}}">Danh sách mã giảm giá Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa</li>
        </ol>
    </nav>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Sửa Voucher</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('updateVoucherService',['id'=>$data->id])}}">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Mã code</label>
                            <input type="text" value="{{$data->code}}" name="code" class="form-control" id="formGroupExampleInput" value="{{ old('code')}}">
                            @error('code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2" >Giảm giá</label>
                                <input type="text" value="{{$data->discount}}"  maxlength="7" name="discount" class="form-control" id="formGroupExampleInput" value="{{ old('code')}}">
                            @error('discount')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày bắt đầu</label>
                            <input type="date" value="{{date('Y-m-d', strtotime($data->time_start))}}"  class="form-control pr-4" name="time_start">
                            @error('time_start')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày kết thúc</label>
                            <input type="date" value="{{date('Y-m-d', strtotime($data->time_end))}}"  class="form-control pr-4" name="time_end">
                            @error('time_end')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn dịch vụ</label>
                            <select class="form-control" value="{{$data->service_id}}"  name="service_id" id="exampleFormControlSelect1">
                               @foreach($products as $value)
                                <option value="{{ $value->id}}" {{$data->service_id == $value->id ? 'selected':''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng Thái</label>
                            <select class="form-control" name="status" id="exampleFormControlSelect1">
                                <option value="0" {{$data->status == 0 ? 'selected':''}}>Dùng luôn</option>
                                <option value="1" {{$data->status == 1 ?'selected':''}}>Chờ sau</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning float-right ">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection