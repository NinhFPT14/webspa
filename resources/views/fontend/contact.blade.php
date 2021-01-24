@extends('fontend.layouts.master')
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
                            <li><a href="index-5.html">Trang Chủ</a></li>
                            <li><a href="contact.html">Liên Hệ</a></li>
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
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d928.1730520252008!2d105.91519767222779!3d21.480590360037176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x64ff7c165fcb2419!2sQueen%20beauty%20spa!5e0!3m2!1svi!2s!4v1611496013323!5m2!1svi!2s" width="1170" height="460" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                          </div>
                       </div>
                    </div>
                </div>
            </div>
            <!--contact map end-->

            <!--contact area start-->
            <div class="contact_area"> 
                <div class="row">
                        <div class="col-lg-6 col-md-12">
                           <div class="contact_message content">
                                <h3>Liên hệ với chúng tôi</h3>    
                                 <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                                <ul>
                                    <li><i class="fa fa-fax"></i>  Địa Chỉ: No 40 Baria Sreet 133/2 NewYork City</li>
                                    <li><i class="fa fa-envelope-o"></i><a href="#">Infor@roadthemes.com</a></li>
                                    <li><i class="fa fa-phone"></i></i> 0(1234) 567 890</li>
                                </ul>             
                            </div> 
                        </div>
                        <div class="col-lg-6 col-md-12">
                           <div class="contact_message form">
                                <h3>Thông tin liên Hệ</h3>   
                                <form id="contact-form" method="POST"  action="https://demo.hasthemes.com/alista-preview/alista/assets/mail.php">
                                    <p>  
                                       <label>Tên</label>
                                        <input name="name" placeholder="Name *" type="text"> 
                                    </p>
                                    <p>       
                                       <label>   Email</label>
                                        <input name="email" placeholder="Email *" type="email">
                                    </p>
                                        
                                    <div class="contact_textarea">
                                        <label> Lời Nhắn</label>
                                        <textarea placeholder="Message *" name="message"  class="form-control2" ></textarea>     
                                    </div>   
                                    <button type="submit"> Gửi</button>  
                                    <p class="form-messege"></p>
                                </form> 

                            </div> 
                        </div>
                    </div>   
            </div>
            <!--contact area end-->
        </div>
    </div>
    @endsection
