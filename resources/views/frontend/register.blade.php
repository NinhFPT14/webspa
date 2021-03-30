@extends('frontend.layouts.master')
@section('title')
Đăng ký
@endsection
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="">Trang Chủ</a></li>
                        <li><a href="{{route('register')}}">Đăng Ký</a></li>
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
                    <h2>Đăng Ký</h2>
                    <form action="{{route('saveAccountUser')}}" method = "POST">
                     @csrf
                        <p>
                            <label>Số điện thoại <span>*</span></label>
                            <input type="text" name="phone" maxlength="10" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </p>
                        <p>
                            <label>Mật Khẩu <span>*</span></label>
                            <input type="password" name="password"  value="{{ old('password') }}">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </p>
                        <p>
                            <label>Nhập lại mật khẩu <span>*</span></label>
                            <input type="password" name="password_confirm" value="{{ old('password_confirm') }}">
                            @error('password_confirm')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </p>
                        <div class="login_submit">
                            <button type="submit">Đăng Ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection