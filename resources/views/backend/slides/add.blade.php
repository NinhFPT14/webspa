@extends('backEnd.layouts.master')
@section('title')
  Thêm slide
@endsection
@section('content')
<div class="container-fluid">
    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Tạo slide</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                        <form>
                            <div class="form-group">
                              <label for="formGroupExampleInput">Tiêu đề</label>
                              <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Nhập tiêu đề">
                            </div>
                              <div class="form-group">
                              <label for="formGroupExampleInput2">Nội dung</label>
                              <textarea name="content" class="form-control" id="formGroupExampleInput2" cols="30" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Ảnh</label>
                                <input type="file" name="image" class="form-control" id="formGroupExampleInput">
                              </div>
                              <div class="form-group">
                                <label for="formGroupExampleInput">Đường dẫn</label>
                                <input type="text" name="link" class="form-control" id="formGroupExampleInput" placeholder="Nhập đường dẫn">
                              </div>
                              <button type="submit" class="btn btn-primary float-right ">Tạo</button>
                          </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

