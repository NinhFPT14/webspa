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

 
 miend">32    <script src="{{ asset('jsCalendar/dhtmlxscheduler.js') }}" type="text/javascript" charset="utf-188"></script>
    <script src=" {{ asset('jsCalendar/ext/dhtmlxscheduler_timeline.js') }} " type="text/javascript" charset="utf-8"></script>

    <link rel='stylesheet' type='text/css' href="{{ asset('jsCalendar/dhtmlxscheduler_material.css') }}">
@endsection
<div class="grid grid-cols-3 gap-4   pl-4">
<div class="col-span-2">
    <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
        <div class="dhx_cal_navline">
            <div class="dhx_cal_prev_button">&nbsp;</div>
            <div class="dhx_cal_next_button">&nbsp;</div>
            <div class="dhx_cal_today_button"></div>
            <div class="dhx_cal_date"></div>
        </div>
    <div class="dhx_cal_header">
    </div>
    <div class="dhx_cal_data">
</div>
<!-- Bảng xếp lịch kết thúc -->
</div>

</div>
<div class=" col-span">
    <div>
        <form action="{{route('searchTimeAppointment')}}" method="POST">
            @csrf
            <div class="flex">
                <input type="date" name="time" class="form-control" value="" placeholder=""
                    aria-label="First name">
                <button type="submit" class="form-control btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT-Tên</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Xác nhận</th>
                    <th scope="col">Xếp lịch</th>
                    <th scope="col">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointment as $value)
                <tr>
                    <td>{{ $value->id }}<br>{{$value->name}}</td>
                    <td>{{$value->phone}}</td>
                    <td><button type="button" class="btn btn-success btn-xac-nhan " data-orderid="{{$value->id}}"><i
                                class="fas fa-fw fa-edit"></i></button></td>
                    <td><button type="button" class="btn btn-success btn-xep-lich " data-orderid="{{$value->id}}"><i
                                    class="fas fa-calendar"></i></button></td>
                    
                    @if($value->status == 0)
                        <td><a class="btn btn-danger" >Chưa xác thực OTP</a></td>
                    @elseif($value->status == 1)
                        <td><a class="btn btn-warning" >Đã xác thực OTP</a></td>
                    @elseif($value->status == 2)
                    <td><a class="btn btn-info" >Đã lên lịch</a></td>
                    @elseif($value->status == 3)
                    <td><a class="btn btn-success" >Làm xong</a></td>
                    @elseif($value->status == 4)
                    <td><a class="btn btn-dark" >Hủy</a></td>
                    @endif
                    
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
            <form action="{{ route('appointment.apiConvert') }}">
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
                                <label>Trạng thái đơn<span class="text-danger"> *</span></label>
                                <select name="status" id="modal_status" class="form-control">
                                    <option value="1">Chờ lên lịch</option>
                                    <option value="2">Đã lên lịch</option>
                                    <option value="3">Làm xong</option>
                                    <option value="4">Hủy đơn</option>
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

<!-- modal xếp lịch -->
<!-- Xác nhận đơn  -->
<div class="modal fade" id="modalXepLich" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-green-500 ">
                <h4 class="modal-title  text-2xl" id="exampleModalLabel">Xếp lịch</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="grid grid-cols-2 gap-4 pl-4">
                    <div>
                        <div class="row pl-4 pt-2">
                            <div class="col">
                                <?php 
                                    $location = DB::table('locations')->where('status',0)->get()
                                ?>
                                <label>Chọn ghế làm<span class="text-danger"> *</span></label>
                                <select name="status" id="modal_status" class="form-control">
                                    <option>Chọn ghế làm</option>
                                    @foreach ($location as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <?php 
                                    $location = DB::table('locations')->where('status',0)->get()
                                ?>
                                <label>Chọn dịch vụ<span class="text-danger"> *</span></label>
                                <select name="status" id="modal_status" class="form-control">
                                    <option>Chọn dịch vụ</option>
                                    @foreach ($location as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
    $(".mul-select").select2(); //Select dịch vụ
    $('.btn-xep-lich').on('click', function() {
        $('#modalXepLich').modal('show');
    }) // Hiển thị bảng xếp lịch

    $('.btn-xac-nhan').on('click', function() {

        let appointmentId = $(this).data('orderid'); // Lấy id của đơn đặt lịch

        let apiGetAppointmentById = '{{route("appointment.getDataById")}}';
        // console.log(apiGetAppointmentById);

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
                // console.log(appointmentData.id)
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

                
                $('#note_admin').val(appointmentData.note_admin);
                $('#appointmentModal').modal('show');
                $(".mul-select").select2();
            }
        })
    })

// bắt sự kiện khi lưu trong form thông tin lịch đặt
    $('.btn-xac-nhan').on('click', function() {
        let appointmentId = $(".btn-xac-nhan").val();
        let name = $("#modal_name").val();
        let phone = $("#modal_phone").val();
        let note = $("#modal_note").val();
        let service_id = $("#modal_service").val();
        let time_ficked = $("#time_ficked").val();
        let time_start = $("#modal_time").val();
        let status = $("#modal_status").val();
        let call_confirmation = $("#call_confirmation").val();
        let note_admin = $("#note_admin").val();
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
                call_confirmation: call_confirmation,
                note_admin: note_admin,
                service_id: service_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(response) {
                swal("Thành công", "xác nhận thành công ấn ok để tiếp tục !", "success");
            }
        })
</script>
<script type="text/javascript" charset="utf-8">
		window.addEventListener("DOMContentLoaded", function(){

			scheduler.locale.labels.timeline_tab = "Timeline";
			scheduler.locale.labels.section_custom = "Section";
			scheduler.config.details_on_dblclick = false;

			//===============
			//Configuration
			//===============
			var sections = [
				{key:1, label:"Ghế 1"},
				{key:2, label:"Ghế 2"},
				{key:3, label:"Ghế 3"},
				{key:4, label:"Ghế 4"},
                {key:5, label:"Ghế 4"},
                {key:6, label:"Ghế 5"},
                {key:7, label:""},
                {key:8, label:""},
                {key:9, label:""},
                {key:10, label:""}
			];

			var durations = {
				day: 24 * 60 * 60 * 1000,
				hour: 60 * 60 * 1000,
				minute: 60 * 1000
			};

			var get_formatted_duration = function(start, end) {
				var diff = end - start;

				var days = Math.floor(diff / durations.day);
				diff -= days * durations.day;
				var hours = Math.floor(diff / durations.hour);
				diff -= hours * durations.hour;
				var minutes = Math.floor(diff / durations.minute);

				var results = [];
				if (days) results.push(days + " days");
				if (hours) results.push(hours + " hours");
				if (minutes) results.push(minutes + " minutes");
				return results.join(", ");
			};


			var resize_date_format = scheduler.date.date_to_str(scheduler.config.hour_date);

			scheduler.templates.event_bar_text = function(start, end, event) {
				var state = scheduler.getState();
				if (state.drag_id == event.id) {
					return resize_date_format(start) + " - " + resize_date_format(end) + " (" + get_formatted_duration(start, end) + ")";
				}
				return event.text; // default
			};

			scheduler.createTimelineView({
				name:	"timeline",
				x_unit:	"minute",
				x_date:	"%H:%i",
				x_step:	30,
				x_size: 24,
				x_start: 18,
				x_length:	48,
				y_unit:	sections,
				y_property:	"section_id",
				render:"bar",
				event_dy: "full"
			});


			//===============
			//Data loading
			//===============
			scheduler.config.lightbox.sections = [
				{name:"description", height:130, map_to:"text", type:"textarea" , focus:true},
				{name:"custom", height:23, type:"select", options:sections, map_to:"section_id" },
				{name:"time", height:72, type:"time", map_to:"auto"}
			];

			scheduler.init('scheduler_here', new Date(2017, 5, 30), "timeline");
			scheduler.parse([
				{ start_date: "2017-06-30 09:00", end_date: "2017-06-30 12:00", text:"Khách Dịu", section_id:1},
				{ start_date: "2017-06-30 10:00", end_date: "2017-06-30 16:00", text:"Khách Vip Công", section_id:2},
				{ start_date: "2017-06-30 10:00", end_date: "2017-06-30 14:00", text:"Khách Vinh", section_id:3},
				{ start_date: "2017-06-30 12:00", end_date: "2017-06-30 13:00", text:"Khách Thi", section_id:4},
				{ start_date: "2017-06-30 14:00", end_date: "2017-06-30 16:00", text:"Khách Tú", section_id:5},
				{ start_date: "2017-06-30 16:00", end_date: "2017-06-30 17:00", text:"Khách Hải", section_id:5},
				{ start_date: "2017-06-30 16:30", end_date: "2017-06-30 18:00", text:"Khách Ninh", section_id:5},
			]);
		});
</script>


@endsection