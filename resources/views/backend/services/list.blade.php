@extends("backend.layouts.master")
@section("title")
Danh sách dịch vụ
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Dịch vụ</li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{route('listService')}}">Danh sách dịch vụ</a></li>
        </ol>
      </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addService')}}" class="btn btn-primary" role="button">Tạo Mới</a>
            <form action="" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
                @csrf
                <div class="input-group">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm ..." name="key" value="{{$key}}">
                    </div>
                    <div class="form-group">
                        <select  name="type" class="form-control">
                            <option selected disabled>Chọn danh mục</option>
                            @foreach($category as $value)
                            <option value="{{$value->id}}" {{$type == $value->id ? 'selected':''}}>{{$value->name}}</option>
                            @endforeach
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
                            <th scope="col">#ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Giá cũ</th>
                            <th scope="col">Giá mới</th>
                            <th scope="col">Thời gian thực hiện</th>
                            <th scope="col">Số buổi</th>
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
                            <td scope="col">{{ $value->total_time }} buổi</td>
                            <td>
                                <a href="{{ route('detailService',['slug'=>$value->slug,'id'=>$value->id]) }}"
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


                            <td><a onclick="confirm('Bạn chắc chắn xóa chứ !?')" href="{{route('deleteService',['id'=>$value->id])}}" class="btn btn-danger">Xóa</a>
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

@include('sweetalert::alert')
@endsection