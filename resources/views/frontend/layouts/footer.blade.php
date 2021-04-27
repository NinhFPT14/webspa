<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
   
     
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
                                <ul>
                                <?php
                                $data = App\Model\Footer::get();
                                ?>
                                @foreach ($data as $item)
                                
                                    <li><i class="ion-ios-location"></i><span>Địa Chỉ:</span>{{$item->address}}</li>
                                    <li><i class="ion-ios-telephone"></i><span>Liên Hệ:</span> {{$item->phone_number}}</li>
                                    <li><i class="ion-android-mail"></i><span>Email:</span> {{$item->email}}</li>
                                
                                @endforeach
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="widgets_container widget_menu">
                            <h3>Thông Tin</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="{{route('about')}}">Giới Thiệu</a></li>
                                    <li><a href="{{route('listBlog')}}">Bài Viết</a></li>
                                    <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                                  

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="widgets_container widget_newsletter">
                            <h3>Thời Gian Làm Việc</h3>
                            <div class="newsletter_desc">
                                <p>Giờ Mở Cửa : 08:00 AM</p>
                                <p>Giờ Đóng cửa : 21:00 PM</p>
                                <p><span class="text-indigo-900">QUEENSPA</span> mở cửa các ngày trong tuần</p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0">
                        <div class="widgets_container">
                            <h3>Fanpage</h3>
                            <div class="instagram_gallery">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmongdepthainguyen%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="340" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
     
    </footer>