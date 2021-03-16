@extends("backend.layouts.master")
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
                            <th scope="col">Danh mục</th>
                            <th scope="col">Giá cũ</th>
                            <th scope="col">Giá mới</th>
                            <th scope="col">Thời gian thực hiện</th>
                            <th scope="col">Chi tiết</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                        <tr>
                            <td scope="col">{{ $value->id }}</td>
                            <td>{{$value->name}}</td>
                            <?php 
                            $category = DB::table('categories')->find($value->category_id) ;
                            ?>
                            <td>{{$category->name}}</td>
                            <td scope="col">{{ number_format($value->price) }}đ</td>
                            <td scope="col">{{ number_format($value->discount) }}đ</td>
                            <td scope="col">{{ $value->time_working }} phút</td>
                            <td>
                                <a href=""
                                    class="btn btn-primary" target="_blank">Xem</a>
                            </td>
                            <td>
                                @if($value->status == 0)
                                <a class="btn btn-success"
                                    href="{{route('statusService',['id'=>$value->id,'status'=>1])}}">ON</a>
                                @else
                                <a class="btn btn-danger"
                                    href="{{route('statusService',['id'=>$value->id,'status'=>0])}}">OFF</a>
                                @endif
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