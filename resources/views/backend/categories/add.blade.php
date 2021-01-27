@extends('backEnd.layouts.master')
@section('title')
Tạo danh mục
@endsection
@section('content')
<div class="container-fluid">
    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Tạo danh mục</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                                placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Loại danh mục</label>
                            <select name="type" class="form-control" id="exampleFormControlSelect1">
                                <option value="0">Sản phẩm</option>
                                <option value="1">Dịch vụ</option>
                                <option value="2">Bài viết</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-right ">Tạo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection