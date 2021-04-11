@extends('frontend.layouts.master')
@section('title')
Giỏ Hàng
@endsection
@section('content')


<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a>Trang Chủ</a></li>
                        <li><a >Đanh sách đơn đặt lịch</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Mã đơn</th>
                                        <th class="product_thumb">Họ tên</th>
                                        <th class="product_name">Thời gian</th>
                                        <th class="product-price">Ngày</th>
                                        <th class="product_quantity">Lời nhắn</th>
                                        <th class="product_quantity">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($data as $value)
                                    <tr>
                                    <td class="product_total">{{$value->id}}</td>
                                    <td class="product_total">{{$value->name}}</td>
                                    <td class="product_total">{{$value->time_ficked}}</td>
                                    <td class="product_total">{{$value->time_start}}</td>
                                    <td class="product_total">{{$value->note}}</td>
                                    @if($value->status == 0)
                                    <td class="product_total text-danger">Chưa xác nhận</td>
                                    @elseif($value->status == 1)
                                    <td class="product_total text-warning">Chờ lên lịch</td>
                                    @elseif($value->status == 2)
                                    <td class="product_total text-primary">Đã lên lịch</td>
                                    @elseif($value->status == 3)
                                    <td class="product_total text-success">Làm xong</td>
                                    @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection