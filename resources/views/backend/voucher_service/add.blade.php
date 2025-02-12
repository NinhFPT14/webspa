@extends('backend.layouts.master')
@section('title')
Tạo Voucher
@endsection
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('listVoucherService')}}">Danh sách mã giảm giá dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tạo mới</li>
        </ol>
    </nav>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Tạo Voucher</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('saveVoucherService')}}">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Mã code</label>
                            <input type="text" name="code" class="form-control" id="formGroupExampleInput" value="{{ old('code')}}">
                            @error('code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2" >Giảm giá (VNĐ)</label>
                                <input type="text" maxlength="7" name="discount" class="form-control" id="formGroupExampleInput" value="{{ old('discount')}}">
                            @error('discount')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày bắt đầu</label>
                            <input type="date" class="form-control pr-4" name="time_start">
                            @error('time_start')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ngày kết thúc</label>
                            <input type="date" class="form-control pr-4" name="time_end">
                            @error('time_end')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng Thái</label>
                            <select class="form-control" name="status" id="exampleFormControlSelect1">
                                <option value="0">Dùng luôn</option>
                                <option value="1">Chờ sau</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right ">Tạo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection