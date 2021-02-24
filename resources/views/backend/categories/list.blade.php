@extends('backend.layouts.master')
@section('title')
Danh sách danh mục
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách danh mục</li>
            @if($type == 0)
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            @elseif($type == 1)
            <li class="breadcrumb-item active" aria-current="page">Dịch vụ</li>
            @elseif($type == 2)
            <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
            @endif
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addCategory')}}" class="btn btn-primary" role="button">Tạo Mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Loại</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                        <tr>
                            <th scope="row">{{$value->id}}</th>
                            <td>{{$value->name}}</td>
                            @if($value->type == 0)
                            <td>Sản phẩm</td>
                            @elseif($value->type == 1)
                            <td>Dịch vụ</td>
                            @elseif($value->type == 2)
                            <td>Bài viết</td>
                            @endif
                            <td>
                                @if($value->status == 0)
                                <a onclick="return confirm('Bạn có chắc chắn muốn tắt')" href="{{route('statusCategory',['id'=>$value->id,'status'=>1])}}"
                                    class="btn btn-success">ON</a>
                                @else
                                <a onclick="return confirm('Bạn có chắc chắn muốn bật')" href="{{route('statusCategory',['id'=>$value->id ,'status'=>0])}}"
                                    class="btn btn-danger">OFF</a>
                                @endif
                            </td>
                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="{{route('deleteCategory',['id'=>$value->id])}}"
                                    class="btn btn-danger">Xóa</a>
                                <a href="{{route('editCategory',['id'=>$value->id])}}"
                                    class="btn btn-warning">Sửa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection