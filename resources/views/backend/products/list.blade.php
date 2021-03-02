@extends('backend.layouts.master')
@section('title')
Danh sách sản phẩm
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addProduct')}}" class="btn btn-primary" role="button">Tạo Mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá cũ</th>
                            <th scope="col">Giá giảm</th>
                            <th scope="col">Chi tiết</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                        <tr>
                            <th scope="row">{{$value->id}}</th>
                            <td>{{$value->name}}</td>
                            <?php 
                            $category = DB::table('categories')->find($value->category_id) ;
                            ?>
                            <td>{{$category->name}}</td>
                            <td>{{number_format($value->quality)}}</td>
                            <td>{{number_format($value->price)}} VNĐ</td>
                            <td>{{number_format($value->discount)}} VNĐ</td>
                            <td>
                                <a href="{{route('statusCategory',['id'=>$value->id ,'status'=>0])}}" 
                                    class="btn btn-primary" target="_blank">Xem</a>
                            </td>
                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa')"
                                    href="{{route('deleteCategory',['id'=>$value->id])}}" class="btn btn-danger">Xóa</a>
                                <a href="{{route('editCategory',['id'=>$value->id])}}" class="btn btn-warning">Sửa</a>
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