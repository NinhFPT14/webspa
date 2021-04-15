@extends("backend.layouts.master")
@section("title")
Bảng xếp lịch
@endsection
@section('content')
@section("link")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
@endsection
<div class="p-4">
    <div class=" d-flex align-items-center">
        <div class="col-md-2">
            <input type="text" class="form-control" placeholder="Tên KH, SĐT, Mã lịch hẹn" aria-label="First name">
        </div>
        <div class="col-md-2">
            <input type="date" class="form-control" placeholder="" aria-label="First name">
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 pt-2 ">
        <div class="col-span-3">
            <table class="table table-bordered m-0">
                <thead>
                    <tr class="text-center bg-blue-300">
                        <th>Tên Khách Hàng</th>
                        <th>Số ghế</th>
                        <th>Ghế DỊch vụ</th>
                        <th>thời gian</th>
                        <th>Trạng thái</th>
                    </tr>
                    <tr ng-repeat="time in listTime" class="ng-scope">
                        <th scope="row" class="table-item table-item-header sticky-column-left">
                            <div class=" d-flex flex-column justify-content-center align-items-center h-100">
                                <span class="staff-name text-uppercase ng-binding">21:00-22:00</span>
                            </div>
                        </th>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                        <h3> </h3>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                        <h3> </h3>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                        <h3> </h3>
                        </td>
                        <td ng-repeat="t in scheduleDates" ng-class="getClass(t)"
                        <h3> </h3>
                        </td>
                    </tr>
                </thead>

            </table>
        </div>

        <div>
            <form action="{{route('searchTimeAppointment')}}" method="POST">
                @csrf
                <div class="flex">
                    <input type="date" name="time" class="form-control" value="{{$time}}" placeholder=""
                        aria-label="First name">
                    <button type="submit" class="form-control btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Xác nhận</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointment as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->phone}}</td>
                        <td><button type="button" class="btn btn-success btn-xep-lich " data-orderid="{{$value->id}}"><i
                                    class="fas fa-fw fa-edit"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <ul class="pagination pagination-sm m-t-none m-b-none">
                    {!!$appointment->links()!!}
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- Xác nhận đơn  -->
<div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-green-500 ">
                <h4 class="modal-title  text-2xl" id="exampleModalLabel">Thông tin đặt lịch</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="grid grid-cols-2 gap-4 pl-4">
                    <div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Họ Tên<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="name" id="modal_name" aria-label="First name">
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Số điện thoại<span class="text-danger"> *</span></label>
                                <input type="number" name="phone" id="modal_phone" class="form-control" aria-label="">
                            </div>
                        </div>
                        <div class="col-md-32 pl-4">
                            <label>Dịch Vụ<span class="text-danger"> *</span></label> <br>
                            <select class="mul-select form-control" name="service_id" id="modal_service" style="width: 532px;" multiple>
                                <optgroup label="Chọn dịch vụ/"></optgroup>
                                @foreach($services as $sv)
                                <option value="{{$sv->id}}">{{$sv->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Thời gian<span class="text-danger"> *</span></label>
                                <select class="form-control"  id="time_ficked" name="time_ficked">
                                    <option value="Sáng">sáng</option>
                                    <option value="Chiều">chiều</option>
                                    <option value="Tối">tối</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Ngày hẹn<span class="text-danger"> *</span></label>
                                <input type="date" class="form-control" name="time_start" id="modal_time"
                                    aria-label="First name">
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Lời nhắn</label>
                                <textarea name="note" id="modal_note" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Phương thức thanh toán<span class="text-danger"> *</span></label>
                                <select name="payment_methods" id="payment_methods" class="form-control">
                                    <option value="0">Tiền mặt</option>
                                    <option value="1">Chuyển khoản ngân hàng</option>
                                </select>
                            </div>
                        </div>

                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Trạng thái đơn<span class="text-danger"> *</span></label>
                                <select name="status" id="modal_status" class="form-control">
                                    <option value="1">Đã xác nhận</option>
                                    <option value="2">Đã lên lịch</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="pr-5">
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Gọi điện xác nhận<span class="text-danger"> *</span></label>
                                <select name="call_confirmation" id="call_confirmation" class="form-control">
                                <option value="" selected>Chọn trạng thái</option>
                                    <option value="0">Không gọi được</option>
                                    <option value="1">Đã gọi</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Trạng thái thanh toán <span class="text-danger"> *</span></label>
                                <select name="payment_status" id="payment_status" class="form-control">
                                <option value="" selected>Chọn trạng thái</option>
                                    <option value="0">Chưa thanh toán</option>
                                    <option value="1">Đã thanh toán</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <?php
                                $locations = DB::table('locations')->where('status',0)->get();
                                ?>
                                <label>Số ghế <span class="text-danger"> *</span></label>
                                <select name="location" id="location" class="form-control">
                                <option value="" selected>Chọn ghế</option>
                                    @foreach ( $locations as $location)
                                    <option value="{{$location->id}}"> {{$location->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <?php
                                $locations = DB::table('locations')->where('status',0)->get();
                                ?>
                                <label>Chọn dịch vụ<span class="text-danger"> *</span></label>
                                <select name="location" id="modal_service" class="form-control">
                                <option value="" selected>Dịch vụ</option>
                                @foreach($services as $sv)
                                <option value="{{$sv->id}}">{{$sv->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Thời gian bắt đầu <span class="text-danger"> *</span></label>
                                <input type="time" class="form-control" name="time_play" id="time_play"
                                    aria-label="First name">
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Thời gian kết thúc <span class="text-danger"> *</span></label>
                                <input type="time" class="form-control" name="time_end" id="time_end"
                                    aria-label="First name">
                            </div>
                        </div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <label>Ghi chú</label>
                                <textarea name="note_admin" id="note_admin" class="form-control"></textarea>
                            </div>
                        </div>
                        <p id="thong_bao" class="text-success"></p>
                    </div>
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-success btn-xac-nhan">Lưu</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section("js")
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<script>
$(document).ready(function() {
    $(".mul-select").select2();
    $('.btn-xep-lich').on('click', function() {
        let appointmentId = $(this).data('orderid');
        let apiGetAppointmentById = '{{route("appointment.getDataById")}}';
        $.ajax({
            url: apiGetAppointmentById,
            method: "POST",
            data: {
                id: appointmentId,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                let appointmentData = response.data;
                $('.btn-xac-nhan').val(appointmentData.id);
                $('#modal_name').val(appointmentData.name);
                $('#modal_phone').val(appointmentData.phone);
                $('#modal_note').val(appointmentData.note);
                $('#modal_time').val(new Date(appointmentData.time_start).toISOString().split('T')[0]);
                let modalOption = $('#modal_service').find('option');
                for (let i = 0; i < modalOption.length; i++) {
                    let index = appointmentData.services.findIndex(el => el.id == $(
                        modalOption[i]).val());
                    if (index != -1) {
                        $(modalOption[i]).prop('selected', true);
                    } else {
                        $(modalOption[i]).prop('selected', false);
                    }
                }
                let timeFicked = $('#time_ficked').find('option');
                for (let i = 0; i < timeFicked.length; i++) {
                    if (appointmentData.time_ficked == $(timeFicked[i]).val()) {
                        $(timeFicked[i]).prop('selected', true);
                    } else {
                        $(timeFicked[i]).prop('selected', false);
                    }
                }

                let paymentMethods = $('#payment_methods').find('option');
                for (let i = 0; i < paymentMethods.length; i++) {
                    if (appointmentData.payment_methods == $(paymentMethods[i]).val()) {
                        $(paymentMethods[i]).prop('selected', true);
                    } else {
                        $(paymentMethods[i]).prop('selected', false);
                    }
                }

                let status = $('#modal_status').find('option');
                for (let i = 0; i < status.length; i++) {
                    if (appointmentData.status == $(status[i]).val()) {
                        $(status[i]).prop('selected', true);
                    } else {
                        $(status[i]).prop('selected', false);
                    }
                }

                let call_confirmation = $('#call_confirmation').find('option');
                for (let i = 0; i < status.length; i++) {
                    if (appointmentData.call_confirmation == $(call_confirmation[i]).val()) {
                        $(call_confirmation[i]).prop('selected', true);
                    } else {
                        $(call_confirmation[i]).prop('selected', false);
                    }
                }

                let payment_status = $('#payment_status').find('option');
                for (let i = 0; i < status.length; i++) {
                    if (appointmentData.payment_status == $(payment_status[i]).val()) {
                        $(payment_status[i]).prop('selected', true);
                    } else {
                        $(payment_status[i]).prop('selected', false);
                    }
                }
                
                $('#note_admin').val(appointmentData.note_admin);

                $('#appointmentModal').modal('show');
                $(".mul-select").select2();
            }
        })
    })


    $('.btn-xac-nhan').on('click', function() {
        let appointmentId = $(".btn-xac-nhan").val();
        let name = $("#modal_name").val();
        let phone = $("#modal_phone").val();
        let note = $("#modal_note").val();
        let service_id = $("#modal_service").val();
        let time_ficked = $("#time_ficked").val();
        let time_start = $("#modal_time").val();
        let status = $("#modal_status").val();
        let payment_methods = $("#payment_methods").val();
        let call_confirmation = $("#call_confirmation").val();
        let payment_status = $("#payment_status").val();
        let note_admin = $("#note_admin").val();
        let location = $("#location").val();
        let time_play = $("#time_play").val();
        let time_end = $("#time_end").val();
        let apiGetAppointmentById = '{{route("confirmAppointment")}}';
        $.ajax({
            url: apiGetAppointmentById,
            method: "POST",
            data: {
                id: appointmentId,
                name: name,
                phone: phone,
                note: note,
                time_ficked: time_ficked,
                time_start: time_start,
                status: status,
                payment_methods: payment_methods,
                call_confirmation: call_confirmation,
                payment_status: payment_status,
                note_admin: note_admin,
                service_id: service_id,
                location: location,
                time_play: time_play,
                time_end: time_end,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                swal("Thành công", "xác nhận thành công ấn ok để tiếp tục !", "success");
            }
        })
    })
});
</script>


@endsection