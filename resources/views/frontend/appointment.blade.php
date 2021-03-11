@extends('frontend.layouts.master')
@section('title', 'Đặt Lịch')

@section('content')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="">Trang Chủ</a></li>
                        <li><a href="{{route('appointment')}}">Đặt Lịch</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container  pt-4">
    <div class="pt-24">
        <img src="frontEnd/img/logo/logodatlich.png" style="margin:auto;margin-top:-50px;"  alt="">
        <h1 class="text-center " style="font-weight:bold;font-family:'Times New Roman', Times, serif;font-size:30px;margin-top:40px;">ĐẶT LỊCH HẸN</h1>
        <p class="text-center pt-6" >KHUYẾN KHÍCH ĐẶT LỊCH HẸN TRƯỚC. XIN VUI LÒNG LIÊN HỆ VỚI CHÚNG TÔI NẾU QUÝ KHÁCH CÓ
            BẤT KỲ THẮC MẮC NÀO
            LIÊN QUAN ĐẾN <br> CÁC GÓI DỊCH VỤ </p>

    </div>
    
    <form action="">
        <div class="pt-24 ">         
            <div action="" class="p-4">
                <div class="col-md-13 pl-4 " >
                    <label>Chọn Dịch Vụ*</label>
                    <select class="mul-select form-control"  multiple>
                    <?php
                        $category = DB::table('categories')->where('type',1)->where('status',0)->get();
                    ?>
                    @foreach($category as $value)
                        <optgroup label="{{$value->name}}"></optgroup>
                        <?php
                            $service = DB::table('services')->where('status',0)->where('category_id', $value->id)->get();
                        ?>  
                        @foreach($service as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach                 
                    @endforeach
                    </select>

                </div>

                <div class="pt-4 ">
                    <div class=" row pl-4">
                        <div class="col-md-6 ">
                            <label>Chọn Thời Gian*</label>
                            <select class="form-control" id="validationCustom04" required>
                                <option selected disabled value="">Chọn thời gian</option>
                                <option>Sáng</option>
                                <option>Chiều</option>
                                <option>Tối</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Ngày Hẹn<span>*</span></label>
                            <input type="date" class="form-control pr-4" placeholder="Ngày*" aria-label="">
                        </div>

                    </div>
                </div>
                <div class="row pl-4 pt-4">
                    <div class="col">
                        <label>Họ Tên<span>*</span></label>
                        <input type="text" class="form-control" placeholder="Mời nhập họ tên..." aria-label="First name">
                    </div>
                    <div class="col">
                        <label>Số Điện Thoại<span>*</span></label>
                        <input type="text" class="form-control" placeholder="Mời nhập số điện thoại..." aria-label="">
                    </div>
                </div>
                <div class="  row pl-10 pt-4 pr-3 "  >
                    <label>Lời Nhắn<span>*</span></label>
                   <textarea name=""class="form-control" placeholder="Mời Nhập Nội Dung Lời Nhắn..." cols="30" rows="10"></textarea>
                </div>
                <div class="payment_method ml-6 mt-4">
                    <label>Phương thức thanh toán<span>*</span></label>
                           <div class="panel-default">
                                <input id="payment" name="check_method" type="radio" data-target="createp_account" />
                                <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Thanh Toán Tiền Mặt</label>
                              
                               
                            </div> 
                           <div class="panel-default">
                                <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" />
                                <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Thanh Toán Bằng Ngân Hàng <img src="frontEnd/img/icon/papyel.png" alt=""></label>

                                <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                     <div class="card-body1">
                                       <p>Thanh Toán Bằng ATM, các Ứng dụng tiết kiệm tiền online.</p> 
                                    </div>
                                </div>
                            </div>
                              
                        </div> 
                <div class="col-12 w-64 h-20 pt-4 pl-6 pr-1 " style="width:100%">
                    <button class="btn  form-control" style="background-color:#ae307c; color:white"  type="submit">Đặt lịch</button>
                </div>
            </div>
         
            </div>
            
            
        </div>
        </div>
    </form>


</div>


    
@endsection
@section('page-script')
<script>
    $(document).ready(function () {
        $(".mul-select").select2();
        // $("#mul-select").select2({
        //     placeholder: "chọn dịch vụ", //placeholder
        //     tags: true,
        //     tokenSeparators: ['/', ',', ';', " "]
        // });
    })
</script>
@endsection