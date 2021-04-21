@extends('backend.layouts.master')
@section('title')
Tạo dịch vụ
@endsection
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('listService') }}">Dịch vụ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tạo dịch vụ</li>
        </ol>
    </nav>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Tạo dịch vụ</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('saveService')}}">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tên dịch vụ</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập tên dịch vụ" value="{{ old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Hình ảnh</label>
                            <input type="file"  name="image">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlSelect1">Danh mục</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($cate as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select name="status" class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Sử dụng ngay</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thời gian thực hiện (phút)</label>
                            <input type="number" name="time_working" class="form-control" id="formGroupExampleInput"
                                placeholder="Chọn thời gian" value="{{ old('time_working')}}">
                            @error('time_working')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Giá cũ</label>
                            <input type="number" name="price" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập giá tiền" value="{{ old('price')}}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Giảm mới</label>
                            <input type="number" name="discount" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập % giảm giá của dịch vụ" value="{{ old('discount')}}">
                            @error('discount')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tiêu đề</label>
                            
                            <textarea class="form-control" name="description" id="description"
                                rows="2" data-sample-short>>{{ old('description')}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Chi tiết</label>
                            <textarea class="form-control" name="detail" id="detail"
                                rows="11" cols="80" >{{ old('detail') }}</textarea>
                            @error('detail')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="view" value="1">
                        <button type="submit" class="btn btn-primary float-right ">Tạo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ckeditor')

<script type="text/javascript">
    CKEDITOR.replace( 'detail', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        uiColor: '#CCEAEE',
        
    } );
    CKEDITOR.replace( 'description',
 {
     filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
     filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
     filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
     filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}'
 });
</script>

    

@endsection