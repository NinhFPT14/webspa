@extends('frontend.layouts.master')
@section('title')
Tài khoản của tôi
@endsection
@section('content')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="">Trang Chủ</a></li>
                        <li><a href="{{route('myAccount')}}">Tài Khoản</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!-- my account start  -->
<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#account-details" data-toggle="tab" class="nav-link">Thông tin tài khoản</a>
                            </li>
                            <li> <a href="#orders" data-toggle="tab" class="nav-link">Chi tiết đơn hàng</a></li>
                            <li><a href="{{route('logout')}}" class="nav-link">Đăng Xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">

                        <div class="tab-pane fade" id="orders">
                            <h3>Orders</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Đơn hàng</th>
                                            <th>Ngày</th>

                                            <th>Mã đơn hàng</th>

                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="success">Completed</span></td>
                                            <td>aaaaaaa</td>
                                            <td>$25.00 for 1 item </td>
                                            <td><a href="">Chi Tiết</a></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="account-details">
                            <h3>Thông tin Tài khoản</h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label>Họ tên *</label>
                                            <input type="text" name="first-name">
                                            <label>Tuổi * </label>
                                            <input type="number" value="" name="age">
                                            <label>Số điện thoại </label>
                                            <input type="text" disabled>
                                            <label>Ảnh đại diện</label>
                                            <input type="file" value="" name="avatar">
                                            <br>
                                            <div class="save_button primary_btn default_button">
                                                <button style="font-size: 20px;" type="submit">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account end   -->

@endsection