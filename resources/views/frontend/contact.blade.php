@extends('frontend.layouts.master')
@section('title')
Liên hệ
@endsection
@section('content')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="">Trang Chủ</a></li>
                        <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<div class="home_contact_wrapper">
    <div class="container">
        <!--contact map start-->
        <div class="contact_map">
            <div class="row">
                <div class="col-12">
                    <div class="map-area">
                        <div id="googleMap">
                            <?php
                          $map = DB::table('maps')->get();
                          ?>
                            @foreach($map as $value)
                            {!! $value->link !!}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--contact area start-->
        <div class="contact_area">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>Liên hệ với chúng tôi</h3>
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum
                            est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum
                            formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                        <ul>
                            <li><i class="fa fa-fax"></i> Địa Chỉ: No 40 Baria Sreet 133/2 NewYork City</li>
                            <li><i class="fa fa-envelope-o"></i><a href="#">Infor@roadthemes.com</a></li>
                            <li><i class="fa fa-phone"></i></i> 0(1234) 567 890</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>Thông tin liên Hệ</h3>
                        <form method="POST" action="{{route('saveFeedback')}}">
                            @csrf
                            <div class="form-group">
                                <label>Tên *</label>
                                <input name="name" placeholder="Vui lòng nhập tên khách hàng" type="text">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label>Email *</label>
                                <input name="email" placeholder="Vui lòng nhập Email" type="email">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label>Số điện thoại *</label>
                                <input name="phone_number" placeholder="Vui lòng nhập số điện thoại" type="text">
                            </div>
                            @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label>Nội dung *</label>
                                <textarea placeholder="Vui lòng nhập nội dung" name="content"
                                    class="form-control2"></textarea>
                            </div>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit"> Gửi</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--contact area end-->
    </div>
</div>
@endsection