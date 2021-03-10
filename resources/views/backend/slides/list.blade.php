@extends('backend.layouts.master')
@section('title')
  Danh Sách Slide
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Slide</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách slide</li>
        </ol>
      </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addSlide')}}" class="btn btn-primary" role="button">Tạo Mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Link</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <th scope="row">{{$item->id}}</th>
                          <th scope="row">{{$item->title}}</th>
                          <th scope="row">{{$item->content}}</th>
                          <th><img src="{{$item->image}}" style="width: 100px"></th>
                          <th scope="row">{{$item->link}}</th>
                          <td>
                            @if($item->status == 0)
                            <a  href="{{route('statusSlide',['id'=>$item->id,'status'=>1])}}"
                                class="btn btn-success">ON</a>
                            @else
                            <a  href="{{route('statusSlide',['id'=>$item->id ,'status'=>0])}}"
                                class="btn btn-danger">OFF</a>
                            @endif
                        </td>
                          <th><a  href="{{route('deleteSlide',['id'=>$item->id])}}" class="btn btn-danger">Xóa</a>
                          <a href="{{route('editSlide',['id'=>$item->id])}}"  role="button" class="btn btn-warning">Sửa</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

