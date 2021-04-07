@extends('frontend.layouts.master')
@section('title')
Đăng nhập
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
                            <li><a href="{{route('login')}}">Đăng nhập</a></li>
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
                        <h2>Đăng Nhập</h2>
                        <form action="{{route('getLogin')}}" method="POST">
                         @csrf
                
                            <p>   
                                <label>Tài Khoản <span>*</span></label>
                                <input type="text" name="phone" value="{{ old('phone') }}">
                             </p>
                             <p>   
                                <label>Mật Khẩu <span>*</span></label>
                                <input type="password" name="password" value="{{ old('password') }}">
                             </p>   
                            <div class="login_submit">
                               <a href="#">Quên Mật Khẩu?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Nhớ Đăng Nhập
                                </label>
                                <button type="submit">Đăng Nhập</button>
                            </div>
                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register mt-70">
                        <div class="rounded-3xl mt-30 bg-green-400 w-80 h-12 flex items-center bg-green-500 hover:bg-green-700">
                            <a style="width: 100%; text-align: center; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande' sans-serif;" href="{{route('register')}}">
                                <i class="ios-contact-outline fa-1x"></i>
                                Đăng Kí
                            </a>
                        </div>
                        
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
@include('sweetalert::alert')
@endsection
