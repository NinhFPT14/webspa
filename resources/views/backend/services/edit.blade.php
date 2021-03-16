@extends('backend.layouts.master')
@section('title')
Sửa dịch vụ
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Sửa dịch vụ</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('updateService',['id'=>$data->id])}}">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập tên dịch vụ" value="{{ $data->name }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Danh mục</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($cate as $value)
                                <option value="{{$value->id}}" {{$data->category_id == $value->id ? 'selected':''}}>
                                    {{$value->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Thời gian thực hiện (phút)</label>
                            <input type="number" name="time_working" class="form-control" id="formGroupExampleInput"
                                placeholder="Chọn thời gian" value="{{ $data->time_working }}">
                            @error('time_working')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Giá cũ</label>
                            <input type="number" name="price" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập giá tiền" value="{{ $data->price }}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Giảm mới</label>
                            <input type="number" name="discount" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập % giảm giá của dịch vụ" value="{{ $data->discount }}">
                            @error('discount')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tiêu đề</label>
                            <textarea class="form-control" name="description" id="description">
                            {{ $data->description }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Chi tiết</label>
                            <textarea class="form-control" name="detail" id="detail">{{ $data->detail }}</textarea>
                            @error('detail')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning float-right ">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ckeditor')
<script src="{{asset('backEnd/ckeditor/ckeditor.js')}}"> </script>
<script>
CKEDITOR.replace('detail');
CKEDITOR.replace('description', {
    // Define the toolbar groups as it is a more accessible solution.
    toolbarGroups: [{
            "name": "basicstyles",
            "groups": ["basicstyles"]
        },
        {
            "name": "links",
            "groups": ["links"]
        },
        {
            "name": "paragraph",
            "groups": ["list", "blocks"]
        },
        {
            "name": "document",
            "groups": ["mode"]
        },
        {
            "name": "insert",
            "groups": ["insert"]
        },
        {
            "name": "styles",
            "groups": ["styles"]
        },
        {
            "name": "about",
            "groups": ["about"]
        }
    ],
    // Remove the redundant buttons from toolbar groups defined above.
    removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
});
</script>
@endsection