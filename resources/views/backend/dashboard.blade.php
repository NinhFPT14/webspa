@extends('backend.layouts.master')
@section('title')
  Thống kê
@endsection
@section('content')
<div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Đơn đặt hàng</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">120</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Đơn hàng đang gửi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn đã nhân
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Đơn hoàn trả
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            <!-- Color System -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Success
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Info
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Warning
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Danger
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Secondary
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Light
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Dark
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Thông tin </h6>
                                </div>
                                <!-- On rows -->
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Số lượng</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $category1 = DB::table('categories')->where('status','<',2)->where('type',0)->get();
                                            $category2 = DB::table('categories')->where('status','<',2)->where('type',1)->get();
                                            $category3 = DB::table('categories')->where('status','<',2)->where('type',2)->get();

                                            $product1 = DB::table('products')->where('status',0)->get();
                                            $product2 = DB::table('products')->where('status',1)->get();

                                            $service1 = DB::table('services')->where('status',0)->get();
                                            $service2 = DB::table('services')->where('status',1)->get();

                                            $post1 = DB::table('posts')->where('status',0)->get();
                                            $post2 = DB::table('posts')->where('status',1)->get();

                                            $voucher = DB::table('service_vouchers')->get();

                                            $feedback = DB::table('feedbacks')->get();
                                        ?>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>Danh mục sản phẩm</td>
                                        <td>{{count($category1)}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>Danh mục dịch vụ</td>
                                        <td>{{count($category2)}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">3</th>
                                        <td>Danh mục bài viết</td>
                                        <td>{{count($category3)}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">4</th>
                                        <td>Sản phẩm còn hoạt động</td>
                                        <td>{{count($product1)}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">5</th>
                                        <td>Sản phẩm đã tắt</td>
                                        <td>{{count($product2)}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">6</th>
                                        <td>Dịch vụ còn hoạt động</td>
                                        <td>{{count($service1)}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">7</th>
                                        <td>Dịch vụ đã tắt</td>
                                        <td>{{count($service2)}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">8</th>
                                        <td>Bài viết còn hoạt động</td>
                                        <td>{{count($post1)}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">9</th>
                                        <td>Bài viết đã tắt</td>
                                        <td>{{count($post2)}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">10</th>
                                        <td>Tổng số mã giảm giá </td>
                                        <td>{{count($voucher)}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">11</th>
                                        <td>Tổng số phản hồi khách hàng</td>
                                        <td>{{count($feedback)}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection