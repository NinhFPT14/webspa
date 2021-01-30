@extends('backEnd.layouts.master')
@section('title')
  Danh Sách Slide
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Footer</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách Footer</li>
        </ol>
      </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addFooter')}}" class="btn btn-primary" role="button">Tạo Mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại </th>
                            <th scope="col">Email</th>
                            <th scope="col">Link</th>
                            <th scope="col">Hành động</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <th scope="row">{{$item->id}}</th>
                          <th scope="row">{{$item->address}}</th>
                          <th scope="row">{{$item->phone_number}}</th>
                          <th scope="row">{{$item->email}}</th>
                          <th scope="row">{{$item->link_fanpage}}</th>
                          <th><a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="{{route('deleteFooter',['id'=>$item->id])}}" class="btn btn-danger">Xóa</a>
                          <a href="{{route('editFooter',['id'=>$item->id])}}"  role="button" class="btn btn-warning">Sửa</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

