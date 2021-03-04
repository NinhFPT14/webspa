

   
     
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
    <footer class="footer_widgets footer_three">
        <div class="container">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="widgets_container contact_us">
                            <?php 
                            $logo = DB::table('logos')->where('status',0)->get();
                            ?>
                            @foreach ($logo as $value)
                            <a href="{{route('home')}}"><img src="{{ $value->image}}" alt=""></a>
                            @endforeach
                            <div class="footer_contact">
                                <?php
                                $data = App\Model\Footer::get();
                                ?>
                                @foreach ($data as $item)
                                <ul>
                                    <li><i class="ion-ios-location"></i><span>Địa Chỉ:</span>{{$item->address}}</li>
                                    <li><i class="ion-ios-telephone"></i><span>Liên Hệ:</span> {{$item->phone_number}}</li>
                                    <li><i class="ion-android-mail"></i><span>Email:</span> {{$item->email}}</li>
                                </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="widgets_container widget_menu">
                            <h3>Thông Tin</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="{{route('about')}}">Giới Thiệu</a></li>
                                    <li><a href="{{route('blog')}}">Bài Viết</a></li>
                                    <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                                  

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="widgets_container widget_newsletter">
                            <h3>Đăng Ký</h3>
                            <div class="newsletter_desc">
                                <p>Join <strong>69.000+ đã đăng ký</strong> & để lấy thông tin và giảm giá.
                                </p>
                            </div>
                            <div class="newsletter_form">
                                <form action="#">
                                    <input placeholder="Địa Chỉ Email" type="text">
                                    <button type="submit"><i class="ion-android-mail"></i></button>
                                </form>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0">
                        <div class="widgets_container">
                            <h3>Fanpage</h3>
                            <div class="instagram_gallery">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F1998-Confessions-104391394563784%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer_bottom" style="background-image:url('frontEnd/img/bg/bg-breadcrumb.jpg')">      
            <div class="container">
               <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright_area">
                            <h1 style="font-size: 28px;font-family:time new roman;"><span style="color:#ae307c;">QUEEN SPA</span> ĐẸP HƠN ĐỂ LÀM CHỦ CUỘC ĐỜI</h1>
                            <p style="font-family:time new roman;margin-left:30px;font-size:20px;margin-top:10px;">HOTLINE :0315589426 - WEBSITE: QUEENSPA.COM</p>
                            <P style="font-family:time new roman;margin-left:80px;font-size:20px;margin-top:10px;">EMAIL : QUEENSPA@GMAIL.COM</P>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="footer_payment text-right">
                            <a><img style="height:130px;float:right;" src="frontEnd/img/logo/logodatlich.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </footer>
