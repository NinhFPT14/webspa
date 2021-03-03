@extends("backEnd.layouts.master")
@section("title")
Danh sách dịch vụ
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addService')}}" class="btn btn-primary" role="button">Tạo Mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Mô Tả</th>
                            <th scope="col">Giá tiền</th>
                            <th scope="col">Giảm giá</th>
                            <th scope="col">Thời gian thực hiện</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thuộc danh mục</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                        <tr>
                        <td scope="col">{{ $value->id }}</td>    
                        <td scope="col">{{ $value->name }}</td>    
                        <td scope="col">{{ $value->description }}</td>    
                        <td scope="col">{{ $value->price }}</td>
                        <td scope="col">{{ $value->discount }}</td>
                        <td scope="col">{{ $value->time_working }} phút</td>
                        <td>
                                @if($value->status == 0)
                                <a class="btn btn-success" href="{{route('statusService',['id'=>$value->id,'status'=>1])}}" onclick="return confirm('Bạn có chắc chắn muốn tắt')">ON</a>
                                @else
                                <a class="btn btn-danger" href="{{route('statusService',['id'=>$value->id,'status'=>0])}}" onclick="return confirm('Bạn có chắc chắn muốn bật')">OFF</a>
                                @endif
                        </td>
                        <td>{{ $value->category_id }}</td>

                        <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="{{route('deleteService',['id'=>$value->id])}}"
                            class="btn btn-danger">Xóa</a>
                                <a href="{{route('editService',['id'=>$value->id])}}" class="btn btn-warning">Sửa</a>
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