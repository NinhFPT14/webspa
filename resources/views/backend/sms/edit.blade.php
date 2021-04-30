@extends('backend.layouts.master')
@section('title')
Sửa cấu hình sms
@endsection
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('listSms') }}">Danh sách</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa</li>
        </ol>
    </nav>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Sửa cấu hình sms</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="GET" action="{{route('editSms',['id'=>$data->id])}}">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Mã API</label>
                            <input type="text" name="code_api" class="form-control" value="{{$data->code_api}}">
                            @error('code_api')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput">Mã thiết bị</label>
                            <input type="text" name="code_devices" class="form-control" value="{{$data->code_devices}}">
                            @error('code_devices')
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