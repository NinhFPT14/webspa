@extends('frontend.layouts.master')
@section('title')
Xác thực tài khoản
@endsection
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a >Trang Chủ</a></li>
                        <li><a >Đặt lịch</a></li>
                        <li><a >Xác nhận otp </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!-- customer login start -->
<div class="customer_login">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
<<<<<<< HEAD
                    <form action="{{route('appointment.checkOtp',['id'=>$id])}}" method = "POST">
=======
                    <form action="{{route('appointment.confirmOtp',['id'=>$id])}}" method = "POST">
>>>>>>> 83d7db279a5cfeecda5331e4c9f0a136abdaec02
                     @csrf
                        <p>
                            <label>Nhập mã otp <span>*</span></label>
                            <input type="number" name="code">
                        </p>
                        <div class="login_submit">
                            <button type="submit">GỬI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection