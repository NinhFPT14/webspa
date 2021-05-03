@extends('backend.layouts.master')
@section('title')
Danh Sách Voucher
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('listVoucherService')}}">Mã giảm giá dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
    </nav>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addVoucherService')}}" class="btn btn-primary" role="button">Tạo Mới</a>
            
            <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
                @csrf
                <div class="input-group">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm ..." name="key" value="{{$key}}">
                    </div>
                    <div class="input-group input-daterange">
                        <input type="text" class="form-control" name="from_time" autocomplete="off" value="{{$from_time}}">
                        <div class="input-group-addon">đến</div>
                        <input type="text" class="form-control" name="to_time" autocomplete="off" value="{{$to_time}}">
                    </div>
                    <div class="form-group">
                        <select  name="type" class="form-control">
                            <option value="0" {{$type == 0 ? 'selected':''}} >Bật </option>
                            <option value="1" {{$type == 1 ? 'selected':''}}>Tắt</option>
                        </select>
                    </div>
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
                            <th scope="col">Giảm giá (VNĐ)</th>
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
                <div class="d-flex justify-content-center">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$data->links()!!}
                    </ul>
            </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('.input-daterange input').each(function() {
        $(this).datepicker({
            clearDates: true,
            format: "dd/mm/yyyy"
        });
    });
})
</script>
@endsection