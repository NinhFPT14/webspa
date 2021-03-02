<footer class="footer_widgets footer_three" style="backgrounp-color:red">
        <div class="container">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="widgets_container contact_us">
                            <a href="{{route('home')}}"><img src="frontEnd/img/logo/logo11.png" alt=""></a>
                            <div class="footer_contact">
                                <?php
                                $data = App\Model\Footer::get();
                                ?>
                                @foreach ($data as $item)
                                <ul>
                                    <li><i class="ion-ios-location"></i><span>Addresss:</span>{{$item->address}}</li>
                                    <li><i class="ion-ios-telephone"></i><span>Call Us:</span> {{$item->phone_number}}</li>
                                    <li><i class="ion-android-mail"></i><span>Email:</span> {{$item->email}}</li>
                                </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="widgets_container widget_menu">
                            <h3>Information</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="#">Delivery infomation</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#"> Travel</a></li>
                                    <li><a href="#">Conditions</a></li>
                                    <li><a href="#"> Frequently Questions</a></li>

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="widgets_container widget_newsletter">
                            <h3>Newsletter</h3>
                            <div class="newsletter_desc">
                                <p>Join <strong>69.000+ subscribers</strong> & get a new discount coupon every Monday.
                                </p>
                            </div>
                            <div class="newsletter_form">
                                <form action="#">
                                    <input placeholder="Email Address" type="text">
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
        <div class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright_area">
                            <p>Copyright &copy; 2019 <a href="#"> alista </a> All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="footer_payment text-right">
                            <a><img src="frontEnd/img/icon/papyel.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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