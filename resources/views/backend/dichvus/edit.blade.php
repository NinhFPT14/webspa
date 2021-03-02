@extends('backEnd.layouts.master')
@section('title')
Sửa danh mục
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Sửa dịch vụ</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('updateCategory',['id'=>$data->id])}}">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập tên danh mục" value="{{$data->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Loại danh mục</label>
                            <select name="type" class="form-control" id="exampleFormControlSelect1">
                                <option value="0" {{$data->type == 0 ? 'selected':''}}>Sản phẩm</option>
                                <option value="1" {{$data->type == 1 ? 'selected':''}}>Dịch vụ</option>
                                <option value="2" {{$data->type == 2 ? 'selected':''}}>Bài viết</option>
                            </select>
                            @error('type')
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