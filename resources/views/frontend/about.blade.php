@extends('frontend.layouts.master')
@section('title')
Giới thiệu
@endsection
@section('content')
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('home')}}">Trang Chủ</a></li>
                            <li><a>Giới Thiệu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <div class="about_page_section">
        <div class="container">
            <!--about section area -->
            <div class="about_section">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about_thumb">
                            <img src="frontEnd/img/bg/anh_menu.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about_content">
                            <h1>CHÀO MỪNG BẠN ĐẾN VỚI QUEEN SPA</h1>
                            <p><strong>QUEEN SPA</strong> là thương hiệu Spa chuyên dịch vụ làm đẹp hàng đầu Thái Nguyên nói riêng và khu vực phía bắc nói chung.
                        Không ngừng nâng cấp dịch vụ, không gian và thiết bị cho khách hàng. Queen Spa tự tin khẳng định là thương hiệu làm đẹp <strong>UY TÍN – CHẤT LƯỢNG – AN TOÀN</strong>. Với sứ mệnh “đánh thức vẻ đẹp tiềm ẩn của bạn”, Chúng tôi hướng đến dịch vụ làm đẹp nhẹ nhàng hiệu quả với mức giá phù hợp cho mọi người. Nhận được niềm tin của khách hàng, là thành tựu lớn nhất với chúng tôi
                        </p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!--about section end-->

            <!--counterup area -->
           
            <!--counterup end-->
          
            <!--about progress bar -->
            <div class="about_progressbar">
                
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="progressbar_inner">
                            <h2>Đánh Giá</h2>
                           
                            <div class="progress_skill two">
                                <div class="progress">
                                    <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s"
                                        data-wow-delay=".5s" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100">

                                        <span class="progress_persent">Khách Hàng yêu mếm</span>
                                    </div>

                                </div>
                                <span class="progress_discount">90%</span>
                            </div>
                            <div class="progress_skill two">
                                <div class="progress">
                                    <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s"
                                        data-wow-delay=".5s" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100">

                                        <span class="progress_persent">dịch vụ tại spa được yêu mến</span>
                                    </div>

                                </div>
                                <span class="progress_discount">90%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="about__img">
                            <img src="frontEnd/img/about/about2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="about_section">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about_thumb">
                            <img src="frontEnd/img/about/gioi-thieu-2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about_content">
                            <h1>Cập nhật công nghệ hiện đại</h1>
                            <p><strong>QUEEN SPA</strong> 
                                Không ngừng cải tiến về chuyên môn và trang thiết bị, khách hàng khi tới với QUEEN Beauty & Spa sẽ được trải nghiệm những liệu trình làm đẹp công nghệ cao và hiện đại như Thermage - Siêu trẻ hoá da ngay tức khắc, HIFU, Meso therapy, PRP, Điều trị mụn laser,...
                        </p>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!--about progress bar end -->
        </div>
    </div>

    <!-- Call -->

    <div class="fix_tel">
        <div class="ring-alo-phone ring-alo-green ring-alo-show" id="ring-alo-phoneIcon"
            style="right: -7px; bottom: -12px;">
            <div class="ring-alo-ph-circle"></div>
            <div class="ring-alo-ph-circle-fill"></div>
            <div class="ring-alo-ph-img-circle">
                <a href="tel:0946673322"><img class="lazy" src="https://khomaythegioi.com/icon/goi.png" alt="G"></a>
            </div>
        </div>
        <div class="tel">

        </div>
    </div>

@endsection
