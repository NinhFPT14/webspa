@extends('backend.layouts.master')
@section('title')
Back-Danh sách bài viết
@endsection
@section('content')
<div class="container-fluid">
    <!-- DataTales Example -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Danh sách bài viết</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('addBaiviet')}}" class="btn btn-primary" role="button">Tạo Mới</a>
            <form action="{{route('baiviet.search')}}" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" >
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Nhập từ khóa tìm kiếm...."
                        aria-label="Search" aria-describedby="basic-addon2" name="name" >
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
                            <th scope="col">Tiêu đề bài viết</th>
                            <th scope="col">Miêu tả ngắn</th>
                            <th scope="col">Ảnh đại diện</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thuộc danh mục</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                        <tr>
                            <th scope="row">{{$value->id}}</th>
                            <td>{{$value->title}}</td>
                            
                            <td>{!! $value->description!!}</td>
                            <td><img class="img-thumbnail" width="250"  src="{{ $value->avatar}}" alt="{{ $value->avatar}}" srcset=""></td>
                            <td>
                                @if($value->status == 0)
                                <a href="{{route('statusBaiviet',['id'=>$value->id,'status'=>1])}}"
                                    class="btn btn-success">ON</a>
                                @else
                                <a href="{{route('statusBaiviet',['id'=>$value->id ,'status'=>0])}}"
                                    class="btn btn-danger">OFF</a>
                                @endif
                            </td>
                            <?php 
                            $category = DB::table('categories')->find($value->category_id) ;
                            ?>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{route('detailBlog',['id'=>$value->id])}}"
                                    class="btn btn-primary" target="_blank">Xem</a>
                                    <a onclick="return confirm('Bạn có chắc muốn sửa chứ')" href="{{route('editBaiviet',['id'=>$value->id])}}" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="{{route('deleteBaiviet',['id'=>$value->id])}}" class="btn btn-danger">Xóa</a>
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