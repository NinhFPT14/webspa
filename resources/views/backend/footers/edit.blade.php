@extends('backEnd.layouts.master')
@section('title')
  Tạo footer
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
                    <h4 class="m-0 font-weight-bold text-primary">Tạo Footer</h4>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                        <form method="POST"   action="{{route('updateFooter',['id'=>$data->id])}}"  >
                            @csrf
                            <div class="form-group">
                              <label for="formGroupExampleInput">Địa chỉ</label>
                              <input type="text" value="{{$data->address}}"  name="address" class="form-control" id="formGroupExampleInput" placeholder="Nhập địa chỉ">
                              @error('address')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Số điện thoại</label>
                                <input type="text" value="{{$data->phone_number}}"  name="phone_number" class="form-control" id="formGroupExampleInput" placeholder="Nhập số điện thoại">
                                @error('phone_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                              </div>  
                              <div class="form-group">
                                <label for="formGroupExampleInput">Email</label>
                                <input type="text" value="{{$data->email}}"  name="email" class="form-control" id="formGroupExampleInput" placeholder="Nhập email">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                              </div>
                            
                            <div class="form-group">
                                <label for="formGroupExampleInput">Link_fanpage</label>
                                <input type="text" value="{{$data->link_fanpage}}"  name="link_fanpage" class="form-control" id="formGroupExampleInput" placeholder="Nhập link">
                                @error('link_fanpage')
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

