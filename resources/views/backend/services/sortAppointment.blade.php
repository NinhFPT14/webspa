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
<script src="{{ asset('jsCalendar/dhtmlxscheduler.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src=" {{ asset('jsCalendar/ext/dhtmlxscheduler_timeline.js') }} " type="text/javascript" charset="utf-8"></script>
    <script src=" {{ asset('jsCalendar/locale/locale_vn.js') }} " type="text/javascript" charset="utf-8"></script>
    <link rel='stylesheet' type='text/css' href="{{ asset('jsCalendar/dhtmlxscheduler_material.css') }}">
@endsection
<div class="p-4">
	<!-- DataTales Example -->
    
    <div class="grid grid-cols-4 gap-4 pt-2 ">
        <div class="col-span-3 z-0">
		 <!-- Bảng xếp lịch bắt đầu -->
			<div class="md:container px-12 border-green-900 h-screen col-span-2 z-0 shadow-xl ">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page"><a href="{{route('listSortAppointment')}}">Bảng xếp lịch</a></li>
					</ol>
				</nav>
				<div id="scheduler_here" class="dhx_cal_container px-6" style='width:100%; height:100%'>
							<div class="dhx_cal_navline">
								<div class="dhx_cal_prev_button">&nbsp;</div>
								<div class="dhx_cal_next_button">&nbsp;</div>
								<div class="dhx_cal_today_button"></div>
								<div class="dhx_cal_date"></div>
							</div>
						<div class="dhx_cal_header"></div>
						<div class="dhx_cal_data border-separate"></div>
				 
		 		</div>
		 		<div class="col-span-1 "></div>
		 	</div>
		  <!-- Bảng xếp lịch kết thúc -->
		</div>

        <div>
            <form action="" method="GET">
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
                        <th scope="col">STT</th>
						<th scope="col">Họ tên</th>
						<th scope="col">Trạng thái</th>
                        <th scope="col">Chi tiết</th>
                        <th scope="col">Xếp lịch</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointment as $value)
                    <tr id="key{{$value->id}}">
                        <td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td>
						<td>
							<div class="form-check form-switch">
								<input class="form-check-input btn_on_off" value='No' type="checkbox" data-appointmentid="{{$value->id}}" >
							  </div>
						</td>
                        <td><button type="button" class="text-primary btn-xem-chi-tiet" data-appointmentid="{{$value->id}}">Xem</button></td>
                        <td><button type="button" class="btn btn-success btn_modal_xep_lich" data-appointmentid="{{$value->id}}"><i
                                        class="fas fa-calendar"></i></button></td>
                        
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



<!-- Modal chi tiết-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header btn-success">
		  <h5 class="modal-title" id="staticBackdropLabel">CHI TIẾT ĐƠN ĐẶT LỊCH</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		<div class="form-group">
					<label for="exampleInputPassword1">Họ tên</label>
					<input type="text" class="form-control" id="modal_name" >
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Số điện thoại</label>
					<input type="text" class="form-control" id="modal_phone" >
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Thời gian mong muốn</label>
					<input type="text" class="form-control" id="modal_time_ficked" >
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Ngày làm</label>
					<input type="text" class="form-control" id="modal_time_start" >
				  </div>
				  <div class="form-group">
					  <label for="exampleInputPassword1">Lời nhắn</label>
					  <textarea class="form-control"  name="note" id="modal_detail_note" rows="5"></textarea>
				  </div>
				  <table class="table">
					  <thead>
						  <tr>
						  <th>Tên dịch vụ </th>
						  </tr>
					  </thead>
					  <tbody id="modal_tbody">
					  </tbody>
				  </table>
				  <p class="modal_created_at"></p>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TẮT</button>
		</div>
	  </div>
	</div>
  </div>

<!-- Modal xếp lịch-->
<div class="modal fade" id="modal_sort" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header btn-success">
		  <h5 class="modal-title" id="staticBackdropLabel">XẾP LỊCH</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="form-group ">
				<label for="exampleInputPassword1">Dịch vụ</label>
				<select class="form-select modal_list_service" aria-label="Default select example">
					
				</select>
				<p id="thong_bao_service" class="text-danger"></p>
			</div>
			<div class="form-group ">
				<label for="exampleInputPassword1">Ghế làm</label>
				<select class="form-select modal_location" aria-label="Default select example">
				</select>
				<p id="thong_bao_location" class="text-danger"></p>
			</div>
			<div>
			<label for="exampleInputPassword1">Thời gian bắt đầu</label>
			<div class="form-group grid grid-cols-4 ">
				<input id="time-24h-picker" data-input-style="outline" data-label-style="stacked" placeholder="chọn giờ.." class=" mbsc-ios mbsc-ltr  mbsc-textfield mbsc-textfield-outline mbsc-textfield-stacked mbsc-textfield-outline-stacked" type="text" readonly="">
				<input type="date" id="time_start" class="form-control col-span-3 h-14">
		
			</div>
			<div class="form-group ">
				<p id="thong_bao_hour" class="text-danger"></p>
				<p id="thong_bao_date" class="text-danger"></p>
				<p id="thong_bao_fail" class="text-danger"></p>
			</div>
	</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-success btn_xep_lich" >Tạo</button>
		</div>
	  </div>
	</div>
  </div>
</div>
<!-- Modal Chuyển lịch-->
<div class="modal fade" id="modal_change" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header btn-success">
		  <h5 class="modal-title" id="staticBackdropLabel">CHUYỂN LỊCH</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<div class="form-group ">
				<label for="exampleInputPassword1">Ghế làm</label>
				<select class="form-select modal_location_change" aria-label="Default select example">
					@foreach($location as $value)
					<option value="{{$value->id}}">{{$value->name}}</option>
					@endforeach
				</select>
				<p id="thong_bao_location_change" class="text-danger"></p>
			</div>
			<div>
			<label for="exampleInputPassword1">Thời gian bắt đầu</label>
			<div class="form-group grid grid-cols-4 ">
				<input id="time-24h-picker-change" data-input-style="outline" data-label-style="stacked" placeholder="chọn giờ.." class=" mbsc-ios mbsc-ltr  mbsc-textfield mbsc-textfield-outline mbsc-textfield-stacked mbsc-textfield-outline-stacked" type="text" readonly="">
				<input type="date" id="time_start_change" class="form-control col-span-3 h-14">
			</div>
			<div class="form-group ">
				<p id="thong_bao_hour_change" class="text-danger"></p>
				<p id="thong_bao_date_change" class="text-danger"></p>
				<p id="thong_bao_fail_change" class="text-danger"></p>
			</div>
			</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-success btn_chuyen_lich" >Chuyển</button>
		</div>
	  </div>
	</div>
  </div>
</div>

@section("js")
<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<script>
	mobiscroll.datepicker('#time-24h-picker', {
		controls: ['time'],
		timeFormat: 'HH:mm',
		touchUi: true
	});

	mobiscroll.datepicker('#time-24h-picker-change', {
		controls: ['time'],
		timeFormat: 'HH:mm',
		touchUi: true
	});
	
	 mobiscroll.setOptions({
            locale: mobiscroll.localeEn,
            theme: 'ios',
            themeVariant: 'light'
    });
</script>
<script>
	$(document).ready(function() {

		$('.btn-xem-chi-tiet').on('click', function() {
			$('#staticBackdrop').modal('show')
			let id = $(this).data('appointmentid');
			let apiDetail = '{{route("detailAppointment")}}';
			$.ajax({
				url: apiDetail,
				method: "POST",
				data: {
					id: id,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function(response) {
						if(response.data){
							$("#modal_name").val(response.data.name);
							$("#modal_phone").val(response.data.phone);
							$("#modal_time_ficked").val(response.data.time_ficked);
							$("#modal_time_start").val(response.data.time_start);
							$("#modal_detail_note").val(response.data.note);
	
							let output = "";
							let total = "";
							for(let i = 0; i < response.service.length; i++) {
							var obj = response.service[i];
							var price = new Intl.NumberFormat().format(obj.discount);
							output += `<tr>
							<th scope="row"> `+obj.name+`</th>
							</tr>`;
							
						}
	
						$("#modal_tbody").html(output);
						$(".modal_total_monney_detail").html(new Intl.NumberFormat().format(response.data.total_money) + ' VNĐ');
						}else{
							swal("Đơn đặt hàng không tồn tại", "", "warning");
						}
				}
	
			})
	
		})

		$('.btn_modal_xep_lich').on('click', function() {
			$("p#thong_bao_service" ).html('');
			$("p#thong_bao_hour" ).html('');
			$("p#thong_bao_date" ).html('');
			$("p#thong_bao_location" ).html('');
			$("p#thong_bao_fail" ).html('');
			$('#time_start').val('');
			$('#time-24h-picker').val('');
			$('#modal_sort').modal('show')
			let id = $(this).data('appointmentid');
			let apiService = '{{route("listServiceAppointment")}}';
			$.ajax({
				url: apiService,
				method: "POST",
				data: {
					id: id,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function(response) {
						if(response.data){
							let output = "";
							for(let i = 0; i < response.data.length; i++) {
								var name = response.data[i].name;
								var id = response.data[i].id;
								output += `<option value="`+ id +`">`+ name +`</option>`;
							}

							let output2 = "";
							for(let i = 0; i < response.location.length; i++) {
								var name = response.location[i].name;
								var id = response.location[i].id;
								output2 += `<option value="`+ id +`">`+ name +`</option>`;
							}
							
							$(".btn_xep_lich").attr('name',response.id);
							$(".modal_list_service").html(output);
							$(".modal_location").html(output2);
						}
						}
	
			})
		})

		$('.btn_xep_lich').on('click', function() {
			$("p#thong_bao_service" ).html('');
			$("p#thong_bao_hour" ).html('');
			$("p#thong_bao_date" ).html('');
			$("p#thong_bao_location" ).html('');
			$("p#thong_bao_fail" ).html('');
			let id =  $(this).attr('name');
			let service_id = $('.modal_list_service').val();
			let location = $('.modal_location').val();
			let hour = $('#time-24h-picker').val();
			let date =  $('#time_start').val();
			let apiSort = '{{route("sortAppointment")}}';
			$.ajax({
				url: apiSort,
				method: "POST",
				data: {
					id: id,
					service_id:service_id,
					hour:hour,
					date:date,
					location:location,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function(response) {
						if(response.data){
							$('#modal_sort').modal('hide');
							swal("Xếp lịch thành công", " ", "success");
                            // window.location.href = '{{route("listSortAppointment")}}';
						}
						if(response.messages){
							if(response.messages.service_id){
								$("p#thong_bao_service" ).html('- ' + response.messages.service_id);
							}
							if(response.messages.hour){
								$("p#thong_bao_hour" ).html('- ' + response.messages.hour);
							}
							if(response.messages.date){
								$("p#thong_bao_date" ).html('- ' + response.messages.date);
							}
							
							if(response.messages.location){
								$("p#thong_bao_location" ).html('- ' + response.messages.location);
							}
						}else{
							if(response.fail){
								$("p#thong_bao_fail" ).html('- ' + response.fail);
							}

						}
						}
	
			})
			
		})

		$('.btn_on_off').on('click', function() {
			let id = $(this).data('appointmentid');
			swal({
				title: "Chuyển trạng thái",
				text: "Nếu chắc chắn đã xếp hết lịch cho đơn ấn ĐỒNG Ý chưa xếp Từ chối!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: 'success',
				cancelButtonText: 'Từ chối',
				confirmButtonText: 'Đồng ý',
				closeOnConfirm: true,
			},
			function(){
		    let apiStatus = '{{route("statusAppointment")}}';
			
			$.ajax({
				url: apiStatus,
				method: "POST",
				data: {
					id: id,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function(response) {
						if(response.data){
							$( "#key"+response.data ).remove();
						}
					}
	
			})
			});
		})

		$('.btn_chuyen_lich').on('click', function() {

			$("p#thong_bao_hour_change" ).html('');
			$("p#thong_bao_date_change" ).html('');
			$("p#thong_bao_location_change" ).html('');
			$("p#thong_bao_fail_change" ).html('');

			let id = $(this).attr('name');
			let hour =  $('#time-24h-picker-change').val();
			let date =  $('#time_start_change').val();
			let location =  $('.modal_location_change').val();
		    let apiChange = '{{route("changeAppointment")}}';
			$.ajax({
				url: apiChange,
				method: "POST",
				data: {
					id: id,
					hour:hour,
					date:date,
					location:location,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function(response) {
						if(response.data){
							$('#modal_change').modal('hide');
							swal("Chuyển lịch làm thành công", "", "success");
						}
						if(response.messages){
							if(response.messages.hour){
								$("p#thong_bao_hour_change" ).html('- ' + response.messages.hour);
							}
							if(response.messages.date){
								$("p#thong_bao_date_change" ).html('- ' + response.messages.date);
							}
							
							if(response.messages.location){
								$("p#thong_bao_location_change" ).html('- ' + response.messages.location);
							}
						}else{
							if(response.fail){
								$("p#thong_bao_fail_change" ).html('- ' + response.fail);
							}

						}
					
					}
	
			})
		})
	
	})
</script>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf-8">
	var sections = {!!json_encode($seats)!!};
	var data = {!!json_encode($list)!!};
	
	window.addEventListener("DOMContentLoaded", function(){
			scheduler.locale.labels.timeline_tab = "Timeline";
			scheduler.locale.labels.section_custom = "Section";
			scheduler.config.drag_move = false;
			scheduler.config.drag_out = false;
			scheduler.config.drag_resize = false;
			scheduler.config.drag_lightbox = false;
			
			// scheduler.config.multisection = true;
            // scheduler.config.readonly = true;
			//===============
			//Configuration
			//===============
			//===============================
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
				x_step:	60,
				x_size: 14,
				x_start: 8,
				x_length: 24,
				y_unit:	sections,
				y_property:	"key",
				render:"bar",
				event_dy: "full"

			});


			//===============
			//Data loading
			//===============
            var dateToStr = scheduler.date.date_to_str("%d-%m-%Y");
			scheduler.config.lightbox.sections = [
				// {name:"descretion", type:"text" , focus:false , map_to:"text"},
				{name:"Khách hàng", type:"textarea" , focus:false , map_to:"name"},
				{name:"Phone", type:"textarea" , focus:false , map_to:"sdt"},
				{name:"Mã đơn", type:"textarea" , focus:false , map_to:"appointment_id"},
				{name:"Mã xếp lịch", type:"textarea" , focus:false , map_to:"id"},

			];


            scheduler.templates.format_date = function(date){
                return dateToStr (date);
            };
			scheduler.config.buttons_left = [];  // Bố cục nút bên trái bảng sự kiện
			
         
			scheduler.attachEvent("onEventSave",function(id,data,is_new_event){ // Xử lý sự kiện khi ấn chuyển lịch
				var custom_value1 = scheduler.getEvent(id).custom_event_property;
				var custom_form = 	$('#modal_change').modal('show');
				console.log(custom_form)
				if(id){
					
					scheduler.hideLightbox(true,custom_form);
					$("p#thong_bao_service" ).html('');
					$("p#thong_bao_hour" ).html('');
					$("p#thong_bao_date" ).html('');
					$("p#thong_bao_location" ).html('');
					$("p#thong_bao_fail" ).html('');
					$(".btn_chuyen_lich" ).attr('name', id);
					$('#time_start_change').val('');
					$('#time-24h-picker-change').val('');

				}
			});

			scheduler.attachEvent("onEventDeleted", function(id,ev){ // Xử lý sự kiện khi ấn nút xóa
				if(id){
					let apiDelete = '{{route("deleteSortAppointment")}}';
					$.ajax({
						url: apiDelete,
						method: "POST",
						data: {
							id: id,
							_token: '{{csrf_token()}}'
						},
						dataType: 'json',
						success: function(response) {
							if(response.data){
								swal("Xoá lịch làm thành công", "", "warning");
							}
						}
			
					})
				}else{
					alert('Lịch không tồn tại')
				}
			});


			scheduler.config.buttons_right = ["dhx_cancel_btn","dhx_save_btn","dhx_delete_btn"];
			// console.log(data);
			scheduler.init('scheduler_here', new Date(moment().format('LL')), "timeline");
			scheduler.parse(data);
	
		});
</script>

@endsection
@endsection
