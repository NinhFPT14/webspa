@extends('backend.layouts.master')
@section('title')
Sửa nhân viên
@endsection
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('listStaff')}}">Danh sách nhân viên</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa nhân viên</li>
        </ol>
    </nav>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Sửa nhân viên</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('updateStaff',['id'=>$data->id])}}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tên nhân viên</label>
                            <input type="text" value="{{$data->name}}" name="name" class="form-control"
                                id="formGroupExampleInput" placeholder="Nhập tiêu đề">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ảnh đại diện</label>
                            <input type="file" name="image" class="form-control" id="formGroupExampleInput"><br>
                            <img src="{{$data->image}}" style="width:200px">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
                        <button type="submit" class="btn btn-warning float-right ">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection