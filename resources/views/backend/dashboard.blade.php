@extends('backend.layouts.master')
@section('title')
Thống kê
@endsection
@section('content')
@section("link")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<!-- Biểu đồ -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('css/timeline-dashboard.css') }}">
<!-- custom sample head -->
@endsection
<div class="container-fluid">
   <!-- Content Row -->
   <div class="row">
      <?php
         //Sản phẩm
             $cho_xac_nhan = DB::table('oders')->where('status',0)->get()->count();
             $da_giao = DB::table('oders')->where('status',3)->get()->count();
             $dang_giao = DB::table('oders')->where('status',2)->get()->count();
             $don_hang = DB::table('oders')->get()->count();
             $don_tra_hang = DB::table('oders')->where('status',6)->get()->count();
             $don_huy = DB::table('oders')->where('status',4)->get()->count();
             // dd($pro_oder);
         // Dịch vụ
            $all_don = DB::table('appointments')->get()->count();
            $don_wait = DB::table('appointments')->where('status',1)->get()->count();
            $don_da_len = DB::table('appointments')->where('status',2)->get()->count();
            $don_lam_xong = DB::table('appointments')->where('status',3)->get()->count();
            $don_tu_choi = DB::table('appointments')->where('status',4)->get()->count();
         ?>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-2 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Đơn đặt hàng
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $don_hang + $all_don }} </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-2 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Đơn chờ xác nhận
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $cho_xac_nhan + $don_wait }} </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-2 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Đơn hàng đang gửi
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $dang_giao }} </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-2 col-md-3 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn đã hoàn thành
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $don_lam_xong + $da_giao }} </div>
                     <br>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-2 col-md-6 mb-4">
         <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Đơn hủy
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $don_huy + $don_tu_choi }} </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xl-2 col-md-6 mb-4">
         <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
               <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Đơn hoàn trả
                     </div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $don_tra_hang }} </div>
                  </div>
                  <div class="col-auto">
                     <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- // Kết thúc bảng header -->
   <!-- // Hiển thị Biểu đồ -->
   <div class="row">
      <!-- Content Column -->
      <div class="col-lg-4 mb-4">
         <!-- // Biểu đồ -->
         <div class="row ">
            <?php
               use Carbon\Carbon;
                   $top_blog = DB::table('posts')->orderBy('view','desc')->first();
                   $top_sp = DB::table('products')->orderBy('view','desc')->first();
                   $top_dv = DB::table('services')->orderBy('view','desc')->first();
                   $day_7 = Carbon::today()->subDays(6);
                   $day_30 = Carbon::today()->subDays(30);
                   $toDay = Carbon::today();
                   // Lấy dữ liệu đơn làm xong dịch vụ 7 ngày trước đến nay
                   $tong_dv_7 = DB::table('appointments')->orderBy('id','desc')->where('time_start' ,'>=',$day_7)->where('status',3)->select('total_money','time_start')->sum('total_money');
                   // Lấy dữ liệu đơn làm xong dịch vụ 30 ngày
                   $tong_dv_30 = DB::table('appointments')->orderBy('id','desc')->where('time_start' ,'>=',$day_30)->where('status',3)->sum('total_money');
                   // Lấy dữ liệu đơn làm xong hôm nay
                   $tong_dv_today = DB::table('appointments')->orderBy('id','desc')->where('time_start' ,'>=',$toDay)->where('status',3)->select('total_money','time_start')->sum('total_money');
                //    dd($tong_dv_today);
               ?>
               <div id="chartdiv1" class="chartdiv"></div>
                <div class="chartgap"></div>	
         </div>
         <!-- // Đóng Biểu đồ -->
      </div>
      <div class="col-lg-4 mb-4">
         <!-- // Biểu đồ -->
         <div class="row ">
            <?php
               
                   $top_blog = DB::table('posts')->orderBy('view','desc')->first();
                   $top_sp = DB::table('products')->orderBy('view','desc')->first();
                   $top_dv = DB::table('services')->orderBy('view','desc')->first();
                   $day_7 = Carbon::today()->subDays(6);
                   $day_30 = Carbon::today()->subDays(30);
                   $toDay = Carbon::today();
                   // Lấy dữ liệu đơn làm xong dịch vụ 7 ngày trước đến nay
                   $tong_dv_7 = DB::table('appointments')->orderBy('id','desc')->where('time_start' ,'>=',$day_7)->where('status',3)->sum('total_money');
                   // Lấy dữ liệu đơn làm xong dịch vụ 30 ngày
                   $tong_dv_30 = DB::table('appointments')->orderBy('id','desc')->where('time_start' ,'>=',$day_30)->where('status',3)->sum('total_money');
                   // Lấy dữ liệu đơn làm xong hôm nay
                   $tong_dv_today = DB::table('appointments')->orderBy('id','desc')->where('time_start' ,'>=',$toDay)->where('status',3)->sum('total_money');
                    
                   // Lấy dữ liệu đơn sản phẩm 7 ngày trước đến nay
                    $tong_sp_7 = DB::table('oders')->orderBy('id','desc')->where('created_at' ,'>=',$day_7)->where('status',3)->sum('total_monney');
                    // Lấy dữ liệu sản phẩm 30 ngày
                    $tong_sp_30 = DB::table('oders')->orderBy('id','desc')->where('created_at' ,'>=',$day_30)->where('status',3)->sum('total_monney');
                    // Lấy dữ liệu sản phẩm hôm nay
                    $tong_sp_today = DB::table('oders')->orderBy('id','desc')->where('created_at' ,'>=',$toDay)->where('status',3)->sum('total_monney');
               ?>
                <div id="chartdiv2" class="chartdiv1"></div>
                <div class="chartgap1"></div>	
         </div>
         <!-- // Đóng Biểu đồ -->
      </div>
      <!-- // List -->
      <div class="col-lg-4 mb-4 ">
         <div class="col-12 card border-light shadow-lg">
            <div class="card-header ">
               <div class="row align-items-center">
                  <div class="col">
                     <h2 class="h4 text-center text-primary">Trang có lượt xem nhiều nhất</h2>
                  </div>
               </div>
            </div>
            <div class="table-responsive">
               <table class="table align-items-center table-flush">
                  <thead class="bg-primary text-light">
                     <tr>
                        <th scope="col">Tên</th>
                        <th scope="col">Link</th>
                        <th scope="col">Lượt Xem</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th scope="row">{{ $top_sp->name}}</th>
                        <th scope="row"><a target="_blank" href="{{route('detailProduct',['slug'=>$top_sp->slug,'id'=>$top_sp->id])}}">/chi-tiet-san-pham/{{ $top_sp->id}}</a></th>
                        <td>{{ $top_sp->view }} <i class="fas fa-eye"> </i></td>
                     </tr>
                     <tr>
                        <th scope="row">{{ $top_dv->name}}</th>
                        <th scope="row"><a target="_blank" href="{{route('detailService',['slug'=>$top_dv->slug,'id'=>$top_dv->id])}}">/chi-tiet-dich-vu/{{ $top_dv->id}}</a></th>
                        <td>{{ $top_dv->view }} <i class="fas fa-eye"> </i></td>
                     </tr>
                     <tr>
                        <th scope="row">{{ $top_blog->title}}</th>
                        <th scope="row"><a target="_blank" href="{{route('detailBlog',['slug'=>$top_blog->slug,'id'=>$top_blog->id])}}">/chi-tiet-bai-viet/{{ $top_dv->id}}</a></th>
                        <td>{{ $top_dv->view }} <i class="fas fa-eye"> </i></td>
                     </tr>
                     <tr>
                  </tbody>
               </table>
            </div>
         </div>
         <br>
         <div class="col-12 card border-light shadow-lg">
            <div class="card-header ">
               <div class="row align-items-center">
                  <div class="col">
                     <h2 class="h4 text-center text-success">Mã Giảm Giá</h2>
                  </div>
               </div>
            </div>
            <div class="table-responsive">
               <table class="table align-items-center table-flush">
                  <thead class="bg-success text-light">
                     <tr>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá Trị</th>
                        <th scope="col">Ngày Kết Thúc</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $now = Carbon::today();
                        $voucher = DB::table('service_vouchers')->where('time_end','>=',$now)->get();
                        ?>
                     @foreach($voucher as $value)
                     <tr>
                        <th scope="row" class="text-danger">{{ $value->code }}</th>
                        <th scope="row">{{ $value->discount}} VNĐ</a></th>
                        <td class="text-dark">{{ $value->time_end }} </i></td>
                     </tr>
                     @endforeach
                     <tr>
                  </tbody>
               </table>
            </div>
                </div>
            </div>
        </div>

        
    </div>
<!-- //Kết thúc List -->


</div>
</div>
@endsection
@section("js")
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<script>
/**
 * Lazy-init code (relies on jQuery)
 */

// save the real makeChart function for later
AmCharts.lazyLoadMakeChart = AmCharts.makeChart;

// override makeChart function
AmCharts.makeChart = function(a, b, c) {

  // set scroll events
  jQuery(window).on('load', handleScroll);

  function handleScroll() {
    var $ = jQuery;
    if (true === b.lazyLoaded)
      return;
    var hT = $('#' + a).offset().top,
      hH = $('#' + a).outerHeight() / 2,
      wH = $(window).height(),
      wS = $(window).scrollTop();
    if (wS > (hT + hH - wH)) {
      b.lazyLoaded = true;
      AmCharts.lazyLoadMakeChart(a, b, c);
      return;
    }
  }

  // Return fake listener to avoid errors
  return {
    addListener: function() {}
  };
};

/**
 * First chart
 */
var chart = AmCharts.makeChart("chartdiv1", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [{
    "country": "Hôm Nay",
    "visits": {!!$tong_dv_today!!},
    "color": "#00a8ff"
  },{
    "country": "7 Ngày",
    "visits": {!!$tong_dv_7!!},
    "color": "#fbc531"
  }, {
    "country": "30 Ngày",
    "visits": {!!$tong_dv_30!!},
    "color": "#9c88ff"
  }],
  "startDuration": 1,
  "graphs": [{
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  }],
  "categoryField": "country",
  "categoryAxis": {
    "labelsEnabled": true
  },
  "titles": [{
    "text": "Thống kê doanh thu dịch vụ"
  }, {
    "text": "*Đơn vị tính: VNĐ",
    "bold": false
  }]
});


</script>
<!-- Biểu đồ sản phẩm -->
<script>
var chart = AmCharts.makeChart("chartdiv2", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [{
    "country": "Hôm Nay",
    "visits": {!!$tong_sp_today!!},
    "color": "#EAB543"
  },{
    "country": "7 Ngày",
    "visits": {!!$tong_sp_7!!},
    "color": "#25CCF7"
  }, {
    "country": "30 Ngày",
    "visits": {!!$tong_sp_30!!},
    "color": "#FEA47F"
  }],
  "startDuration": 1,
  "graphs": [{
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  }],
  "categoryField": "country",
  "categoryAxis": {
    "labelsEnabled": true
  },
  "titles": [{
    "text": "Thống kê doanh thu bán sản phẩm"
  }, {
    "text": "*Đơn vị tính: VNĐ",
    "bold": false
  }]
});


</script>
@endsection