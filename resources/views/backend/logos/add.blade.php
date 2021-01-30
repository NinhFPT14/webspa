@extends('backEnd.layouts.master')
@section('title')
Tạo Logo
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
                    <h4 class="m-0 font-weight-bold text-primary">Tạo Logo</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('storeLogo')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ảnh</label>
                            <input type="file" name="image"  value="{{ old('image')}}"  class="form-control" id="formGroupExampleInput">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right ">Tạo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection