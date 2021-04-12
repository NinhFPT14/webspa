@extends('backend.layouts.master')
@section('title')
Sửa ghế
@endsection
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('listLocation')}}">Danh sách ghê làm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa ghế</li>
        </ol>
    </nav>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Sửa ghế</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('updateLocation',['id'=>$data->id])}}" >
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tên ghế</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput" value="{{$data->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nhân viên</label>
                            <select name="staff_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($staff as $value)
                                <option value="{{$value->id}}"  {{$data->staff_id == $value->id ? 'selected':''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                            @error('staff_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng Thái</label>
                            <select class="form-control" name="status" id="exampleFormControlSelect1">
                                <option value="0" {{$data->status == 0 ? 'selected':''}}>Hoạt động</option>
                                <option value="1" {{$data->status == 1 ? 'selected':''}}>Chờ sau</option>
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