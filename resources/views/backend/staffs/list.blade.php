@extends('backend.layouts.master')
@section('title')
Danh sách nhân viên
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('listStaff')}}">Nhân viên</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách nhân viên</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addStaff')}}" class="btn btn-primary" role="button">Thêm Mới</a>
            <form action="{{route('staff.search')}}" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
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
                            <th scope="col">ID</th>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Ảnh đại diện</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <th scope="row">{{$item->name}}</th>
                            <th><img src="{{$item->image}}" style="width: 100px"></th>
                            <td>
                                @if($item->status == 0)
                                <a href="{{route('statusStaff',['id'=>$item->id,'status'=>1])}}"
                                    class="btn btn-success">ON</a>
                                @else
                                <a href="{{route('statusStaff',['id'=>$item->id ,'status'=>0])}}"
                                    class="btn btn-danger">OFF</a>
                                @endif
                            </td>
                            <th><a href="{{route('deleteStaff',['id'=>$item->id])}}" class="btn btn-danger">Xóa</a>
                                <a href="{{route('editStaff',['id'=>$item->id])}}" role="button"
                                    class="btn btn-warning">Sửa</a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection