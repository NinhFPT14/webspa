<ul class="navbar-nav  sidebar sidebar-dark accordion toggled" id="accordionSidebar" style ="background-color:#008080">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon">
                <?php 
                    $logo = DB::table('logos')->where('status',0)->get();
                    ?>
                    @foreach ($logo as $value)
                    <img width="120" height="50" src="{{$value->image}}" alt="">
                    @endforeach
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Thống kê</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category" aria-expanded="true"
            aria-controls="category">
            <i class="fas fa-fw fa-th-list"></i>
            <span>Danh mục</span>
        </a>
        <div id="category" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('listCategory',['type'=>0])}}">Sản phẩm</a>
                <a class="collapse-item" href="{{route('listCategory',['type'=>1])}}">Dịch vụ</a>
                <a class="collapse-item" href="{{route('listCategory',['type'=>2])}}">Bài viết</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true"
            aria-controls="product">
            <i class="fas fa-fw fa-table"></i>
            <span>Sản phẩm</span>
        </a>
        <div id="product" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('listProduct')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('product.order.admin')}}">Quản lý đơn</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#service" aria-expanded="true"
            aria-controls="service">
            <i class="fas fa-fw fa-table"></i>
            <span>Dịch vụ</span>
        </a>
        <div id="service" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('listService') }}">Danh sách</a>
                <a class="collapse-item" href="{{ route('listAppointment') }}">Đơn đặt lịch</a>
                <a class="collapse-item" href="{{ route('sortAppointment')}}">Bảng xếp lịch</a>
                <a class="collapse-item" href="{{ route('listLocation')}}">Ghế làm</a>
                <a class="collapse-item" href="{{ route('listStaff')}}">Nhân viên</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('listBaiviet')}}" aria-controls="service">
            <i class="fas fa-fw fa-file"></i>
            <span>Bài viết </span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#voucher_service" aria-expanded="true"
            aria-controls="voucher_service">
            <i class="fas fa-fw fa-qrcode"></i>
            <span>Voucher</span>
        </a>
        <div id="voucher_service" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('listVoucherService') }}">Dịch vụ</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('listFeedback')}}" aria-controls="service">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Feedback </span>
        </a>
    </li>
    


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Giao diện
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Cài đặt</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item"  href="{{route('listFooter')}}">Footer</a>
                <a class="collapse-item"  href="{{route('listSlide')}}">Slide</a>
                <a class="collapse-item"  href="{{route('listLogo')}}">Logo</a>
                <a class="collapse-item"  href="{{route('listMap')}}">Bản đồ</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>