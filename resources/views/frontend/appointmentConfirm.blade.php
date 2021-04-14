<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="{{asset('')}}">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontEnd/vendor/select2/css/select2.min.css')}}">
    <style>
    * {
        box-sizing: border-box;
    }


    .box {
        display: none;
    }

    ;
    </style>
</head>

<body>

    <div class="center">
        <div class="bg-gray-50">
            <div class="grid md:grid-cols-3 gap-4 pl-4 ">

                <div class=" bg-gray-50">
                    <form id="myform" method="POST" action="{{route('appointment.saveConfirm',['id'=>$data->id])}}">
                        @csrf
                        <?php 
                        $logo = DB::table('logos')->where('status',0)->get();
                        $bill_services = DB::table('bill_services')->where('appointment_id',$data->id)->get();
                        $check_method ="";
                        foreach($bill_services as $value){
                            $check_method = $value->payment_methods;
                        }
                        ?>
                        @foreach ($logo as $value)
                        <a class="pt-1 pl-4" ss><img width="150" height="20" src="{{$value->image}}" alt=""></a>
                        @endforeach
                        <h5 class="pt-3 pl-4">Thông Tin đặt lịch</h5>
                        <div class="row pl-4 ">
                            <div class="col">
                                <label style="font-style: italic;font-size: 13px;">Họ Tên<span class="text-danger">
                                        *</span></label>
                                <input type="text" class="form-control" aria-label="First name" name="name"
                                    value="{{$data->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label style="font-style: italic;font-size: 13px;">Số điện thoại<span
                                        class="text-danger">
                                        *</span></label>
                                <input type="text" class="form-control" aria-label="" name="phone"
                                    value="{{$data->phone}}" maxlength="10">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label style="font-style: italic;font-size: 13px;">Giờ Làm<span class="text-danger">
                                        *</span></label>
                                <select class="form-control" name="time_ficked">
                                    <option selected disabled value="">Chọn thời gian</option>
                                    <option {{$data->time_ficked === 'Sáng' ? 'selected': ''}}>Sáng</option>
                                    <option {{$data->time_ficked === 'Chiều' ? 'selected': ''}}>Chiều</option>
                                    <option {{$data->time_ficked === 'Tối' ? 'selected': ''}}>Tối</option>
                                </select>
                                @error('time_ficked')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label style="font-style: italic;font-size: 13px;">Ngày hẹn<span class="text-danger">
                                        *</span></label>
                                <input type="date" name="time_start" class="form-control" aria-label=""
                                    value="{{date('Y-m-d', strtotime($data->time_start))}}">
                                @error('time_start')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label style="font-style: italic;font-size: 13px;">Ghi Chú<span class="text-danger">
                                        *</span></label>
                                <textarea name="note" id="" class="form-control">{{$data->note}}</textarea>
                                @error('note')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="bg-gray-50 pt-20">
                    <div class="row pl-4 pt-9 w-96">
                        <h5 class="pl-4" style="margin-left: -11px;">Thanh toán</h5>
                        <label style="margin-left: -11px;font-style: italic;font-size: 13px;">Chọn phương thức
                            thanh toán<span class="text-danger"> *</span></label>
                        <div class="col h-10 w-64 h-12 pt-2 "
                            style="border: 1px solid #cecdcd;border-radius: 4px 4px 4px 4px;margin-top: 4px;">
                            <label class="pl-1 " style="font-size: 14px;"><input type="radio" name="check_method"
                                    value="1" {{$data->payment_methods == 1 ? 'checked':''}}> Chuyển khoản qua ngân hàng
                            </label>
                            <ion-icon name="cash-outline" class="w-5 h-6 pl-4 pt-0.5 "
                                style="color: rgb(0 149 255); padding-left: 7px; margin-top: 7px;"></ion-icon>
                        </div>
                        <div class="1 box bg-gray-200">
                            <p></p> Các bạn vui lòng chuyển khoản tới các số TK của QueenSpa:</p>

                                <p> Số TK: 0081000830127</p>

                                <p> DƯƠNG THỊ QUYÊN</p>


                                <p> Vietinbank:</p>

                                <p> Số TK: 100000335060</p>

                                <p> DƯƠNG THỊ QUYÊN</p>


                                <p> khi CK các bạn vui lòng nhập nội dung chuyển khoản là :</p>
                                <p class="flex"><input type="text" class="form-control"
                                        value="{{$data->phone}} - Mã đơn : {{$data->id}}" id="myInput">
                                    <button onclick="myFunction()" class="btn text-primary">
                                        <ion-icon name="copy-outline"></ion-icon>
                                    </button>
                                </p>
                        </div>

                    </div>
                    <div class="row pl-4 pt-2 w-96 rounded-sm pt-2  ">
                        <div class="row pl-4 pt-2 w-96 rounded-sm pt-2  ">
                            <div class="col h-10 w-64 h-12 pt-2 "
                                style="border: 1px solid #cecdcd;border-radius: 4px 4px 4px 4px;">
                                <label class="pl-1" style="font-size: 14px;"><input type="radio" name="check_method"
                                        value="0" checked> Thanh toán khi đến cửa hàng
                                </label>
                                <ion-icon name="cash-outline" class="w-5 h-6 pl-4 pt-0.5 "
                                    style="color: rgb(0 149 255); padding-left: 10px; margin-top: 7px;"></ion-icon>
                            </div>
                            <div class="0 box bg-gray-200 ">
                                <p> Đối với các bạn thanh toán tại cửa hàng , Vui lòng đến đúng thời gian đã hẹn sau khi
                                    được tư vấn và lên lịch làm.</p>

                                <p> Hotline: 096.418.8532 hoặc chat tại Fanpage facebook.com/mongdepthainguyen/</p>
                                <p> - QueenSpa xin cảm ơn các bạn đã tin tưởng và ủng hộ . </p>
                            </div>
                            <div class="grid grid-cols-2">
                            </div>
                        </div>
                    </div>
                    @error('check_method')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                </form>
                <div class=" bg-gray-100 h-screen  border ">
                    <h5 class="pt-3 pl-2" style="font-size: 17px;">Đơn đặt lịch ({{count($service)}}) <span
                            class="pl-9">Mã
                            đơn #{{$data->id}}</span> </h5>
                    <hr>
                    <div class=" grid grid-cols-3 h-25 bg-gray-200" style="overflow: scroll;">
                        <?php
                            $serviceIdArray = [];
                        ?>
                        @foreach($service as $key => $value)
                        <div>
                            <img src="{{$value->image}}" class="h-20 w-24 mt-3 ml-4" alt="">
                        </div>
                        <div class="pt-10 ml-5">
                            <p style="font-size: 15px; font-weight: 500;">{{($value->name)}} </p>
                        </div>
                        <div class="pt-10 ">{{number_format($value->discount)}}đ
                        </div>
                        <?php
                            $serviceIdArray[] = $value->id;
                        ?>
                        @endforeach
                    </div>
                    <hr>
                    <form method="POST" action="{{route('appointment.voucher',['id'=>$data->id])}}">
                        @csrf
                        <div class="grid grid-cols-2  bg-gray-100 ">

                            <div class="ml-2 w-80">
                                <input type="text" class="form-control" placeholder="Nhập mã giảm giá..."
                                    name="voucher">
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="btn text-white"
                                    style="background-color: #357ebd; font-size: 13px;">Áp
                                    Dụng</button>
                            </div>

                        </div>
                    </form>
                    <hr>
                    <div class="grid grid-cols-2">
                        <div class="pl-4">
                            <p>Tạm tính :</p>
                            <p>Giảm giá :</p>
                        </div>
                        <div class="pl-4">
                            <?php
                            $price = [];
                            foreach($service as $value){
                                $price[]= $value->discount;
                            }
                            $voucher = DB::table('service_vouchers')->find($data->voucher_id);
                            ?>
                            <p>{{number_format(array_sum($price))}}đ</p>
                            @if($voucher == NULL)
                            <p></p>
                            @else
                            <p>{{number_format($voucher->discount)}}đ</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="grid grid-cols-2">
                        <div class="pl-4">
                            <h5 style="font-size: 19px;">Tổng Cộng :</h5>

                        </div>
                        <div>@if($voucher == NULL)
                            <h4 style="color:#357ebd;font-size: 19px;">{{number_format(array_sum($price))}}đ</h4>
                            @else
                            <h4 style="color:#357ebd;font-size: 19px;">
                                {{number_format(array_sum($price)-($voucher->discount))}}đ</h4>
                            @endif
                        </div>

                    </div>
                    <div class="grid grid-cols-2">
                        <div>
                            <h5 class="pt-10 pl-2" style="margin-top: 10px;margin-left: 10px;"><a
                                    href="{{route('home')}}" style="text-decoration: none;font-size: 14px;">
                                    <ion-icon name="arrow-undo-outline" style="margin-top: 3px;"></ion-icon>
                                    Quay về trang chủ
                                </a></h5>
                        </div>
                        <div class="pt-10 pl-10 flex justify-end">
                            <button type="submit" form="myform" class="btn text-white"
                                style="background-color:#357ebd;width: 91px;">Xác
                                nhận</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @include('sweetalert::alert')
</body>
<script>
function myFunction() {
    var copyText = document.getElementById("myInput");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
}
$(document).ready(function() {
    $('input[type="radio"]').click(function() {
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
    $(".mul-select").select2();

});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<script src="{{asset('frontEnd/vendor/select2/js/select2.min.js')}}"></script>

</html>