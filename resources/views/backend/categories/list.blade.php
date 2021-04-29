@extends('backend.layouts.master')
@section('title')
Danh sách danh mục
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
            @if($type == 0)
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('listCategory',['type'=>0])}}">Sản phẩm</a></li>
            @elseif($type == 1)
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('listCategory',['type'=>1])}}">Dịch vụ</a></li>
            @elseif($type == 2)
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('listCategory',['type'=>2])}}">Bài viết</a></li>
            @endif
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addCategory')}}" class="btn btn-primary" role="button">Tạo Mới</a>
            <form action="{{route('category.search',['type'=>$type])}}" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Nhập từ khóa tìm kiếm ..."
                        aria-label="Search" aria-describedby="basic-addon2" name="name">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Danh mục</th>
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
                <div class="d-flex justify-content-center">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$data->links()!!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection