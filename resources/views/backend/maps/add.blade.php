@extends('backend.layouts.master')
@section('title')
Tạo Map
@endsection
@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('listMap') }}">Danh sách bản đồ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tạo mới</li>
        </ol>
    </nav>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Tạo Map</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{route('storeMap')}}">
                      @csrf
                      <div class="form-group">
                                <label for="formGroupExampleInput">Link</label>
                                <input type="text" name="link" value="{{ old('link')}}" class="form-control" id="formGroupExampleInput" placeholder="Nhập link">
                                @error('link')
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