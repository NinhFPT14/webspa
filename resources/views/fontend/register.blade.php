@extends('fontend.layouts.master')
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
                            <li><a href="index.html">home</a></li>
                            <li><a href="login.html">login</a></li>
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
                        <form action="#">
                            <p>   
                                <label>Tài Khoản <span>*</span></label>
                                <input type="text">
                             </p>
                             <p>   
                                <label>Mật Khẩu <span>*</span></label>
                                <input type="password">
                             </p> 
                             <p>   
                                <label>Số Điện Thoại <span>*</span></label>
                                <input type="password">
                             </p> 

                            <div class="login_submit">
                               
                                <button type="submit">Đăng Ký</button>
                                
                            </div>

                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register mt-70">
                       <!-- <div>Đăng Nhập Bằng Facebook</div>
                       <img src="assets/img/icon/fb.png" alt="">
                         -->
                         <div class="rounded-3xl bg-blue-400 w-80 h-12 flex items-center bg-blue-500 hover:bg-blue-700">
                             <a style="width: 100%; text-align: center; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande' sans-serif;" href="">
                                <i class="fab fa-facebook"></i>
                                 Đăng nhập bằng Facebook
                             </a>
                         </div>
                         <div class="rounded-3xl mt-30 bg-red-400 w-80 h-12 flex items-center bg-red-500 hover:bg-red-700">
                            <a style="width: 100%; text-align: center; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande' sans-serif;" href="">
                                <i class="fab fa-google"></i>
                                Đăng nhập bằng Google
                            </a>
                        </div>
                        
                        
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
@endsection
