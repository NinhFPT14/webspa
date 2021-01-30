<header class="header_area">
        <!--header container start-->
        <div class="header_container header_container_two sticky-header">
            <div class="container-fluid">
                <div class="header_container_inner container_position">
                    <div class="logo">
                        <a href="{{route('home')}}"><img width="200" height="90" src="frontEnd/img/logo/logo11.png" alt=""></a>
                    </div>
                    <div class="header_container_right">
                        <div class="main_menu menu_two">
                            <nav>
                                <ul>
                                    <li class="active"><a href="{{route('home')}}"> Trang Chủ</a>

                                    </li>
                                    <li class="sub_menu pages"><a href="{{route('product')}}"> Sản Phẩm</a>
                                        <ul class="sub_menu pages">
                                            <li><a href="#">danh mục 1</a></li>
                                            <li><a href="#">Danh mục 2</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="{{route('service')}}"> Dịch Vụ</a>
                                        <ul class="sub_menu pages">
                                            <li><a href="#">dịch vụ 1</a></li>
                                            <li><a href="#"></a>dịch vụ 2</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="{{route('appointment')}}">Đặt Lịch</a></li>
                                    <li><a href="{{route('blog')}}">Tin Tức </a>
                                        <ul class="sub_menu pages">
                                            <li><a href="#">Tin Tức 1</a></li>
                                            <li><a href="#">Tin Tức 2</a></li>

                                        </ul>
                                    </li>


                                    <li><a href="{{route('about')}}">Giới Thiệu</a></li>
                                    <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header_block_right block_right_two">
                            <ul>
                                <li class="search_bar"><a href="javascript:void(0)"><i
                                            class="ion-ios-search-strong"></i></a>
                                </li>
                                <li class="mini_cart_wrapper"><a href="javascript:void(0)"><i class="ion-bag"></i>
                                        <span>1</span></a>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="frontEnd/img/s-product/product.jpg" alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">Tên Sản Phẩm</a>

                                                <span class="quantity">Số lượng: 1</span>
                                                <span class="price_cart">Giá :60.00</span>

                                            </div>
                                            <div class="cart_remove">
                                                <a href="#"><i class="ion-android-close"></i></a>
                                            </div>
                                        </div>

                                        <div class="mini_cart_table">
                                            <div class="cart_total">
                                                <span>Tổng Tiền:</span>
                                                <span class="price">138.00 VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="{{route('cart')}}">Giỏ Hàng</a>
                                                <a href="{{route('checkout')}}">Thanh Toán</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--mini cart end-->
                                </li>
                        </div>
                        <div class="main_menu menu_two">
                            <nav>
                                <ul>

                                    <li class="sub_menu pages"><a href="{{route('myAccount')}}"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="{{route('login')}}">Đăng Nhập</a></li>
                                          

                                        </ul>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <!--header container end-->
        </div>
    </header>

    
    <!--Header sidebar End-->

    <!--search overlay-->

    <div class="dropdown_search dropdown_search_two">
        <div class="search_close_btn">
            <i class="ion-android-close btn-close"></i>
        </div>
        <div class="search_container">
            <form action="#">
                <input placeholder="Tìm Kiếm..." type="text">
                <button type="submit"><i class="ion-ios-search-strong"></i></button>
            </form>
        </div>
    </div>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v9.0'
        });
      };

      (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
      attribution=setup_tool
      page_id="104391394563784"
theme_color="#0A7CFF"
logged_in_greeting="chào bạn"
logged_out_greeting="chào bạn">
    </div>