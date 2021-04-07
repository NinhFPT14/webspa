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
                        <li><a >Đăng nhập</a></li>
                        <li><a >Xác minh tài khoản</a></li>
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
                    <h2>XÁC MINH TÀI KHOẢN</h2>
                    <form action="{{route('saveOtp')}}" method = "POST">
                     @csrf
                        <p>
                            <label>Nhập mã otp <span>*</span></label>
                            <input type="number" name="phone_code">
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