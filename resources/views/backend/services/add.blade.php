@extends('backend.layouts.master')
@section('title')
Tạo dịch vụ
@endsection
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('listService') }}">Dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tạo dịch vụ</li>
        </ol>
    </nav>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Tạo dịch vụ</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('saveService')}}">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tên dịch vụ</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập tên dịch vụ" value="{{ old('name')}}"> 
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thời gian thực hiện (phút)</label>
                            <input type="number" name="time_working" class="form-control" id="formGroupExampleInput"
                                placeholder="Chọn thời gian" value="{{ old('time_working')}}">
                            @error('time_working')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Giá tiền</label>
                            <input type="number" name="price" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập giá tiền" value="{{ old('price')}}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tiêu đề</label>
                            <textarea class="form-control" name="description" id="description" rows="1" >{{ old('description')}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                            
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Chi tiết</label>
                            <textarea class="form-control" name="detail" id="detail" rows="4">{{ old('detail') }}</textarea>
                            @error('detail')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                            
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Giảm giá</label>
                            <input type="number" name="discount" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập % giảm giá của dịch vụ" value="{{ old('discount')}}">
                            @error('discount')
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
@section('ckeditor')
<script src="{{asset('backEnd/ckeditor.js')}}"> </script>
<script>    
    ClassicEditor.create(document.getElementById ('description' ));
    ClassicEditor.create(document.getElementById ('detail' ));

    </script>
@endsection
