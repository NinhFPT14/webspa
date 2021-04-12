@extends('backend.layouts.master')
@section('title')
Danh Sách Voucher
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addVoucherService')}}" class="btn btn-primary" role="button">Tạo Mới</a>
            <form action="{{route('voucherservice.search')}}" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
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
                            <th scope="col">Mã code</th>
                            <th scope="col">Giảm giá</th>
                            <th scope="col">Ngày bắt đầu</th>
                            <th scope="col">Ngày kết thúc</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <th scope="row">{{$item->code}}</th>
                            <th scope="row">{{$item->discount}}</th>
                            <th scope="row">{{$item->time_start}}</th>
                            <th scope="row">{{$item->time_end}}</th>
                            <td>
                                @if($item->status == 0)
                                <a href="{{route('statusVoucherService',['id'=>$item->id,'status'=>1])}}"
                                    class="btn btn-success">ON</a>
                                @else
                                <a href="{{route('statusVoucherService',['id'=>$item->id ,'status'=>0])}}"
                                    class="btn btn-danger">OFF</a>
                                @endif
                            </td>
                            <th><a href="{{route('deleteVoucherService',['id'=>$item->id])}}" class="btn btn-danger">Xóa</a>
                                <a href="{{route('editVoucherService',['id'=>$item->id])}}" role="button"
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