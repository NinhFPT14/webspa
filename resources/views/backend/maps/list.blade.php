@extends('backend.layouts.master')
@section('title')
  Danh Sách Maps
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Danh sách bản đồ</li>
        </ol>
      </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addMap')}}" class="btn btn-primary" role="button">Tạo Mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Link</th>
                            <th scope="col">Hành động</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <th scope="row">{{$item->id}}</th>
                          <th scope="row">{{$item->link}}</th>
                          <th><a href="{{route('deleteMap',['id'=>$item->id])}}" class="btn btn-danger">Xóa</a>
                          <a href="{{route('editMap',['id'=>$item->id])}}"  role="button" class="btn btn-warning">Sửa</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

