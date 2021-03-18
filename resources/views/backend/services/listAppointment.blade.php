@extends("backend.layouts.master")
@section("title")
Danh sách đơn đặt lịch
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Danh sách đơn đặt lịch</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Mã đơn</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Ngày hẹn</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chi tiết</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                        <tr>
                            <td scope="col">#{{ $value->id }}</td>
                            <td>{{$value->name}}</td>
                            <td scope="col">0{{chunk_split($value->phone, 3, ' ')}}</td>
                            <td scope="col">{{$value->time_ficked}}</td>
                            <td scope="col">{{date('Y-m-d', strtotime($value->time_start))}}</td>
                            <td>
                                @if($value->status == 0)
                                <p class="text-warning">Chờ xếp lịch</p>
                                @else
                                <p class="text-success">Đã xếp lịch</p>
                                @endif
                            </td>
                            <td>
                                <a href=""
                                    class="btn btn-primary" target="_blank">Xem</a>
                            </td>
                            <td><a href="{{route('deleteService',['id'=>$value->id])}}" class="btn btn-danger">Xóa</a>
                                <a href="{{route('editService',['id'=>$value->id])}}" class="btn btn-warning">Sửa</a>
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