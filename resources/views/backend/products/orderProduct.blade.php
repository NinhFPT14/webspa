@extends('backend.layouts.master')
@section('title')
Danh sách đơn đặt hàng
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Danh đơn đặt hàng</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form action="{{route('product.search')}}" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
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
                            <th scope="col">Mã đơn</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Chi tiết</th>
                            <th scope="col">Trạng thái </th>
                            <th scope="col">Huỷ đơn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <th scope="row">1</th>
                            <th scope="row">1</th>
                            <th scope="row">1</th>
                            <th scope="row">1</th>
                            <th scope="row">1</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection