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
                        <form>
                            <div class="form-group">
                                <label>Tên *</label>
                                <input name="name" id="form_name" placeholder="Vui lòng nhập tên khách hàng" type="text">
                                <p id="thong_bao_name" class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại *</label>
                                <input name="phone_number" id="form_phone_number" placeholder="Vui lòng nhập số điện thoại" type="text" maxlength="10">
                                <p id="thong_bao_phone" class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label>Nội dung *</label>
                                <textarea placeholder="Vui lòng nhập nội dung" name="content"
                                    class="form-control2" id="form_content"></textarea>
                                    <p id="thong_bao_content" class="text-danger"></p>
                            </div>
                            <button type="button" class="modal-gui-feedback"> Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--contact area end-->
    </div>
</div>
@endsection

@section('page-script')
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<script>
$(document).ready(function() {
    $('.modal-gui-feedback').on('click', function() {
//set lại thông báo validate form
        $("p#thong_bao_name" ).html(' ');
        $("p#thong_bao_phone" ).html(' ');
        $("p#thong_bao_content" ).html(' ');

        let name = $("#form_name").val();
        let phone_number = $("#form_phone_number").val();
        let content = $("#form_content").val();
        let apiFeedbackSave = '{{route("feedback.apiSave")}}';
        $.ajax({
            url: apiFeedbackSave,
            method: "POST",
            data: {
                name: name,
                phone_number: phone_number,
                content: content,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                if(response.data){
                    swal("Gửi phản hồi thành công", "QueenSpa cảm ơn bạn đã góp ý kiến cho cửa hàng ngày càng phát triển", "success");
               }else{
                    if(response.messages.name){
                        $("p#thong_bao_name" ).html('- ' + response.messages.name);
                        }
                    if(response.messages.phone_number){
                        $("p#thong_bao_phone" ).html('- ' + response.messages.phone_number);
                            }
                    if(response.messages.content){
                        $("p#thong_bao_content" ).html('- ' + response.messages.content);
                        }
               }
            }
            
        })
    })
})
</script>
@endsection