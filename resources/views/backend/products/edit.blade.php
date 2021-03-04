@extends('backend.layouts.master')
@section('title')
Tạo sản phẩm
@endsection
@section('content')

<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tạo sản phẩm</li>
        </ol>
    </nav>
   
   

    <form method="POST"  action="{{route('updateProduct',['id'=>$data->id])}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tạo sản phẩm</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput" value="{{$data->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Danh mục</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($category as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Mô tả</label>
                            <textarea class="form-control" name="description" id="descs" cols="30" rows="4">{{$data->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chi tiết</label>
                            <textarea class="form-control" name="detail" id="details" cols="30" rows="10">{{$data->detail}}</textarea>
                            @error('detail')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Giá cũ</label>
                            <input type="text" name="price" class="form-control" id="formGroupExampleInput" value="{{$data->price}}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Giá giảm</label>
                            <input type="text" name="discount" class="form-control" id="formGroupExampleInput" value="{{$data->discount}}">
                            @error('discount')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Số lượng</label>
                            <input type="text" name="quality" class="form-control" id="formGroupExampleInput" value="{{$data->quality}}">
                            @error('quality')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ảnh chính</label>
                            <input type="file"  name="avatar">
                            @error('avatar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ảnh phụ</label>
                            <input type="file"  name="image[]" multiple="multiple">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning float-right ">Sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@section('ckeditor')
<script src="{{asset('backEnd/ckeditor.js')}}"> </script>
<script>    
    ClassicEditor.create(document.getElementById ('descs' ));
    ClassicEditor.create(document.getElementById ('details' ));

    </script>
@endsection
    
   

@endsection