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
            <li class="breadcrumb-item"><a href="{{route('product.order.admin')}}">Danh sách đơn</a></li>
            <li class="breadcrumb-item">Sửa đơn đặt hàng #{{$data->id}}</li>
        </ol>
    </nav>

        <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin đặt hàng</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('product.order.update',['id'=>$data->id])}}">
                        @csrf
                        <p>Thời gian đặt hàng : {{date("d/m/Y H:i", strtotime($data->created_at))}}</p>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Họ tên</label>
                            <input type="text" name="name" class="form-control" value="{{$data->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Số điện thoại</label>
                            <input type="text" name="phone_number" class="form-control" value="{{$data->phone_number}}" maxlength="10">
                            @error('phone_number')
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
                        <div class="form-group">
                            <select name="status" class="form-control" >
                                <option value="0"{{$data->status == 0 ? 'selected':''}} >Chờ xác nhận</option>
                                <option value="1"{{$data->status == 1 ? 'selected':''}}>Đã lên đơn </option>
                                <option value="2"{{$data->status == 2 ? 'selected':''}}>Đã gửi hàng</option>
                                <option value="3"{{$data->status == 3 ? 'selected':''}}>Đã nhận hàng</option>
                                <option value="4"{{$data->status == 4 ? 'selected':''}}>Từ chối đơn</option>
                                <option value="6"{{$data->status == 6 ? 'selected':''}}>Hoàn trả</option>
                            </select>
                        </div>
                        <div class="float-right ">
                            <a class="btn btn-primary" href="{{route('product.order.admin')}}">Quay lại</a>
                            <button type="submit" class="btn btn-warning ">Sửa</button>
                        </div>
                        </form>
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
                              @foreach($productOder as $value)  
                              <tr>
                                <td>{{$value->product_id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{number_format($value->price)}}</td>
                                <td>
                                    <input name="number" min="1" max="100" value="{{$value->quality}}" type="number">
                                </td>
                                <td class="product_id_remove" ><a href="{{route('product.order.delete',['id'=>$data->id,'productOder'=>$value->id])}}" class="text-danger">Xoá</a></td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                          <p class=""><strong>Thuế :</strong> {{number_format($data->tax)}} VNĐ</p>
                          <p class=""><strong>Tổng tiền  :</strong>{{number_format($data->total_monney)}} VNĐ</p>
                          <form action="{{route('product.order.add',['id'=>$data->id])}}" method="POST">
                            @csrf
                            <div class="form-row align-items-center">
                              <div class="col-sm-6 my-1">
                                <select class="form-control" name="product_id">
                                    @foreach($product as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="col-sm-2 my-1">
                                <input type="number" name="number" class="form-control" min="1" value="1">
                              </div>
                              <div class="col-auto my-1">
                                <button type="submit" class="btn btn-success">Thêm</button>
                              </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection