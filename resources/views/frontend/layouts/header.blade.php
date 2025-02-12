
<header class="header_area">
    <!--header container start-->
    <div class="header_container header_container_two sticky-header">
        <div class="container-fluid">
            <div class="header_container_inner container_position">
                <?php 
                    $logo = DB::table('logos')->where('status',0)->get();
                    ?>
                <div class="logo">
                    @foreach ($logo as $value)
                    <a href="{{route('home')}}"><img width="200" height="90" src="{{$value->image}}" alt=""></a>
                    @endforeach
                </div>
                <div class="header_container_right">
                    <div class="main_menu menu_two">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{route('home')}}"> Trang Chủ</a>

                                </li>
                                <li class="sub_menu pages"><a href="{{route('product',['id'=>'all'])}}"> Sản Phẩm</a>
                                    <ul class="sub_menu pages">
                                        <?php
                                         $category = DB::table('categories')->where('type',0)->where('status',0)->get();
                                        ?>
                                                @foreach ($category as $value)
                                                <?php
                                                 $product = DB::table('products')->where('category_id',$value->id)->get();

                                                ?>
                                                @if(count( $product) >=1)
                                                <li>
                                                    <a href="{{route('product',['id'=> $value->id])}}">{{$value->name}} <span>({{count($product)}})</span></a> 
                                                </li>
                                                @endif
                                                @endforeach
                                        </ul>
                                    </li>
                                    <li class="sub_menu pages"><a href="{{route('service',['id'=>'all'])}}"> Dịch Vụ</a>
                                        <ul class="sub_menu pages">
                                            <?php 
                                            $category = DB::table('categories')->where('type',1)->where('status',0)->get();
                                            ?>
                                                @foreach ($category as $value)
                                                <?php
                                                 $service = DB::table('services')->where('category_id',$value->id)->get();
                                                ?>
                                                @if(count( $service) >=1)
                                                <li>
                                                    <a href="{{route('service',['id'=> $value->id])}}">{{$value->name}} <span>({{count($service)}})</span></a> 
                                                </li>
                                                @endif
                                                @endforeach
                                        </ul>
                                    </li>

                                    
                                    <li><a href="{{route('appointment')}}">Đặt Lịch</a></li>
                                    <li><a href="{{route('listBlog')}}">Tin Tức </a>
                                        <ul class="sub_menu pages">
                                        <?php
                                         $category = DB::table('categories')->where('type',2)->where('status',0)->get();
                                        ?>
                                                @foreach ($category as $value)
                                                <?php
                                                 $post = DB::table('posts')->where('category_id',$value->id)->get();
                                                ?>
                                                @if(count( $post) >=1)
                                                <li>
                                                    <a href="{{route('danhmucbaiviet',['id'=> $value->id])}}">{{$value->name}} <span>({{count($post)}})</span></a> 
                                                </li>
                                                @endif
                                                @endforeach
                                    </ul>
                                </li>


                                <li><a href="{{route('about')}}">Giới Thiệu</a></li>
                                <li><a href="{{route('contact')}}">Liên Hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header_block_right block_right_two">
                        <ul>
                            <?php 
                              $cart=\Cookie::get('cartId');
                             if($cart){
                                $arrId=json_decode($cart);
                                $product = DB::table('products')->where('status',0)->whereIn('id', $arrId)->orderBy('id', 'DESC')->get();
                                $cart= $arrId;
                             }
                             $number = 0;
                             $number2 = 0;
                            ?>
                            <li class="mini_cart_wrapper"><a href="{{route('cart')}}"><i class="ion-bag"></i>
                                @if(\Cookie::has('cartId'))
                                  <span>{{count($product)}}</span></a>
                                @else
                                <span>0</span></a>
                                @endif
                                  
                                <!--mini cart-->
                                <div class="mini_cart">
                                    @if(\Cookie::has('cartId'))
                                    @foreach ($product as $value)
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="{{route('cart')}}"><img src="{{$value->avatar}}" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="{{route('cart')}}">{{$value->name}}</a>
                                            <?php 
                                            $number_product = 0;
                                            foreach ($cart as $key => $item) {
                                              if($cart[$key] == $value->id){
                                                 $number_product++;
                                              }
                                            }
                                            $number +=1;
                                 
                                            ?>
                                            <span class="quantity">Số lượng: {{$number_product}}</span>
                                            <span class="price_cart">Giá :{{number_format($value->discount)}}VNĐ</span>
                                        </div>
                                    </div>
                                    <?php
                                    if($number == 3){
                                        break;
                                    }
                                    ?>
                                    @endforeach
                                    @endif
                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="{{route('cart')}}">Tất cả</a>
                                        </div>
                                    </div>
                                </div>
                                <!--mini cart end-->
                            </li>
                    </div>
                    <div class="main_menu menu_two">
                        <nav>
                            <ul>

                                <li class="sub_menu pages"><a><svg
                                            xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                            fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg></a>
                                    <ul class="sub_menu pages">
                                        <li><a href="{{route('appointment.listBooking')}}">Đơn đặt lịch</a></li>
                                        <li><a href="{{route('product.oder.list')}}">Đơn đặt hàng</a></li>
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

<div class="Offcanvas_menu Offcanvas_menu_two">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <span>MENU</span>
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="header_block_right block_right_two">
                        <ul>
                        
                            <li class="mini_cart_wrapper"><a><i class="ion-bag"></i>
                                @if(\Cookie::has('cartId'))
                                <span>{{count($product)}}</span></a>
                                    @else
                                    <span>0</span></a>
                                    @endif
                                <!--mini cart-->
                                <div class="mini_cart">

                                    @if(\Cookie::has('cartId'))
                                    @foreach ($product as $value)
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="{{route('cart')}}"><img src="{{$value->avatar}}" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="{{route('cart')}}">{{$value->name}}</a>
                                            <?php 
                                            $number_product = 0;
                                            foreach ($cart as $key => $item) {
                                              if($cart[$key] == $value->id){
                                                 $number_product++;
                                              }
                                            }
                                            $number2 +=1;
                                          ?>
                                            <span class="quantity">Số lượng: {{$number_product}}</span>
                                            <span class="price_cart">Giá :{{number_format($value->discount)}}VNĐ</span>
                                        </div>
                                    </div>
                                    <?php
                                    if($number2 == 3){
                                        break;
                                    }
                                    ?>
                                    @endforeach
                                    @endif
                                   
                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="{{route('cart')}}">Tất cả</a>
                                        </div>
                                    </div>
                                </div>
                                <!--mini cart end-->
                            </li>
                        </ul>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="">Trang Chủ</a>

                            </li>
                            <li class="menu-item-has-children active">
                                <a href="{{route('product',['id'=>'all'])}}">Sản Phẩm</a>
                                <ul class="sub-menu">
                                    <?php
                                     $category = DB::table('categories')->where('type',0)->where('status',0)->get();
                                    ?>
                                    @foreach($category as $value)
                                    <?php
                                        $product = DB::table('products')->where('category_id',$value->id)->get();
                                    ?>
                                    @if(count($product) >=1)
                                        <li><a href="{{route('product',['id'=> $value->id])}}">{{$value->name}} <span>({{count($product)}})</span></a></li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>

                            <li class="menu-item-has-children active">
                                <a href="{{route('service',['id'=>'all'])}}">Dịch Vụ</a>
                                <ul class="sub-menu">
                                    <?php 
                                    $category = DB::table('categories')->where('type',1)->where('status',0)->get();
                                    ?>
                                    @foreach($category as $value)
                                    <?php
                                            $service = DB::table('services')->where('category_id',$value->id)->get();
                                    ?>
                                    @if(count($service) >=1)
                                        <li><a href="{{route('service',['id'=> $value->id])}}">{{$value->name}} <span>({{count($service)}})</span></a></li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="{{route('appointment')}}">Đặt Lịch</a>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('listBlog')}}">Tin Tức </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('about')}}">Giới Thiệu</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{route('contact')}}">Liên Hệ</a>
                            </li>
                            <li class="menu-item-has-children active">
                                <a>Quản lý đơn</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('appointment.listBooking')}}">Đơn đặt lịch</a></li>
                                    <li><a href="{{route('product.oder.list')}}">Đơn đặt hàng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
        xfbml: true,
        version: 'v9.0'
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution=setup_tool page_id="104391394563784" theme_color="#0A7CFF"
    logged_in_greeting="chào bạn" logged_out_greeting="chào bạn">
</div>
