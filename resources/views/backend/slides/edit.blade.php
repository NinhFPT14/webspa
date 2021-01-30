@extends('backEnd.layouts.master')
@section('title')
  Sửa Slide
@endsection
@section('content')
<div class="container-fluid">
    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Sửa slide</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                        <form method="POST"  action="{{route('updateSlide',['id'=>$data->id])}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="formGroupExampleInput">Tiêu đề</label>
                              <input type="text" value="{{$data->title}}" name="title" class="form-control" id="formGroupExampleInput" placeholder="Nhập tiêu đề" >
                              @error('title')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                            </div>
                              <div class="form-group">
                              <label for="formGroupExampleInput2">Nội dung</label>
                              <textarea name="content" class="form-control" id="formGroupExampleInput2" placeholder="Nhập nội dung" cols="30" rows="4">{{$data->content}}</textarea>
                              @error('content')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Ảnh</label>
                                <input type="file" name="image" class="form-control" id="formGroupExampleInput"><br>
                                <img src="{{$data->image}}" style="width:200px">
                              </div>
                              <div class="form-group">
                                <label for="formGroupExampleInput">Đường dẫn</label>
                                <input type="text" value="{{$data->link}}" name="link" class="form-control" id="formGroupExampleInput" placeholder="Nhập đường dẫn">
                                @error('link')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Trạng Thái</label>
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                    <option value="0" {{$data->status == 0 ? 'selected':''}}>Dùng luôn</option>
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

