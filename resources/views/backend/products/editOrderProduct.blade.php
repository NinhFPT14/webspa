@extends('backend.layouts.master')
@section('title')
Sửa đơn đặt hàng
@endsection
@section('content')

<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<div class="container-fluid">
    <!-- Content Row -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('product.order.admin')}}">Danh sách đơn đặt lịch</a></li>
            <li class="breadcrumb-item">Sửa đơn đặt lịch #{{$data->id}}</li>
        </ol>
    </nav>

    <form method="POST" action="">
        @csrf
        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin đặt hàng</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Họ tên</label>
                            <input type="text" name="name" class="form-control" value="{{$data->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" value="{{$data->phone_number}}" maxlength="10">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" value="{{$data->address}}">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Lời nhắn</label>
                            <textarea class="form-control" name="note" id="" cols="30" rows="10">{{$data->note}}</textarea>
                            @error('note')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">id</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>30000</td>
                                <td>
                                    <input class="number_product" name="number" min="1" max="100" value="10" type="number">
                                </td>
                                <td class="product_id_remove" ><a href="" class="text-danger">Xoá</a></td>
                              </tr>

                              <tr>
                                <th scope="row"><strong>Thuế VAT 10%</strong></th>
                                <th></th>
                                <th></th>
                                <th>200000 VNĐ</th>
                              </tr>
                              <tr>
                                <th scope="row"><strong>Tổng tiền</strong></th>
                                <th></th>
                                <th></th>
                                <th>2000000 VNĐ</th>
                              </tr>
                            </tbody>
                          </table>
                        <button type="submit" class="btn btn-warning float-right ">Sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection