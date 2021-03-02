@extends('backend.layouts.master')
@section('title')
Danh sách danh mục
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('tao-dich-vu)}}" class="btn btn-primary" role="button">Tạo Mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                        <tr scope="col">{{ $value->id}}</tr>    
                        <tr scope="col">{{ $value->name}}</tr>

                        <tr>
                            <td>
                                @if($value->status == 0)
                                <a class="btn btn-success" href=" {{route('trang-thai-dich-vu',['id'=>$value->id, 'status' => 1])}} " onclick="return confirm('Bạn có chắc chắn muốn tắt')">ON</a>
                                @else
                                <a class="btn btn-danger" href="{{route('trang-thai-dich-vu',['id'=>$value->id ,'status' => 0])}}" onclick="return confirm('Bạn có chắc chắn muốn bật')">OFF</a>
                                @endif
                            </td>
                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="{{route('xoa-dich-vu',['id'=>$value->id])}}"
                                    class="btn btn-danger">Xóa</a>
                                <a href="{{route('sua-dich-vu',['id'=>$value->id])}}"
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