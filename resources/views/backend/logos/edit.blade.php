@extends('backend.layouts.master')
@section('title')
  Sửa Logo
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
                    <h4 class="m-0 font-weight-bold text-primary">Sửa Logo</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                        <form method="POST"  action="{{route('updateLogo',['id'=>$data->id])}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Ảnh</label>
                                <input type="file" name="image" class="form-control" id="formGroupExampleInput"><br>
                                <img src="{{$data->image}}" style="width:200px">
                              </div>
                              <button type="submit" class="btn btn-warning float-right ">Lưu</button>
                          </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

