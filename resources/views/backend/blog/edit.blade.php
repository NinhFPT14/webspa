@extends('backend.layouts.master')
@section('title')
Sửa bài viết
@endsection
@section('content')

<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('baiviet')}}">Tất Cả Bài Viết</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa bài viết</li>
        </ol>
    </nav>

    <form method="POST"  action="{{ route('updateBaiviet',['id'=> collect($post)->first()->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-6">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa bài viết</h6>
                        <a target="_blank" class="btn btn-info" href="{{ route('detailBlog',['id'=> collect($post)->first()->id ]) }} ">Xem bài viết</a>
                    </div>
                    <div class="card-body form-row">

                        <div class="form-group col-md-6">
                            
                            <label for="formGroupExampleInput">Tiêu đề bài viết</label>
                            <input type="text" name="title" class="form-control" id="formGroupExampleInput" value="{{ collect($post)->first()->title }}">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Danh mục</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($category as $value)
                                <option value="{{$value->id}}" {{ collect($post)->first()->category_id == $value->id ? 'selected':''}}>{{$value->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="formGroupExampleInput">Ảnh đại diện</label>
                            <img class="img-thumbnail" src="{{ collect($post)->first()->avatar }}" alt="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="formGroupExampleInput">Ảnh mới</label>
                            <input type="file"  name="avatar">
                            @error('avatar')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Trạng Thái</label>
                            <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option value="0" {{ collect($post)->first()->status == 0 ? 'selected':''}}>Dùng luôn</option>
                                <option value="1" {{ collect($post)->first()->status == 1 ? 'selected':''}}>Chờ sau</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect1">Mô tả</label>
                            <textarea class="form-control" name="description" id="descs" >{{ collect($post)->first()->description }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlSelect1">Nội dung bài viết</label>
                            <textarea class="form-control" name="detail" id="details" >{{ collect($post)->first()->detail }}</textarea>
                            @error('detail')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            <button class="col-md-12 bg-success text-light" type="submit" class="btn btn-primary ">Cập nhật bài viết</button>

            </div>
        </div>
    </form>
</div>
@section('ckeditor')
<script src="{{asset('backEnd/ckeditor/ckeditor.js')}}"> </script>
<script>
CKEDITOR.replace( 'descs', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserWindowWidth : '1000',
    filebrowserWindowHeight : '700'
});
CKEDITOR.replace( 'details', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserWindowWidth : '1000',
    filebrowserWindowHeight : '700'
});
</script>
@endsection
@endsection