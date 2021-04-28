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
    <div class="grid grid-cols-4 gap-4 pt-2 ">
        <div class="col-span-3 z-0">
		 <!-- Bảng xếp lịch bắt đầu -->
			<div class="md:container px-12 border-green-900 h-screen col-span-2 z-0 shadow-xl ">
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


<!-- Modal chi tiết-->
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
			

				<div class="col-span-1 form-control float-left ">
					<select class="dhx_lightbox_time_select   " aria-label="Giờ Phút">
			
						<option value="480">08:00</option>
						<option value="485">08:05</option>
						<option value="490">08:10</option>
						<option value="495">08:15</option>
						<option value="500">08:20</option>
						<option value="505">08:25</option>
						<option value="510">08:30</option>
						<option value="515">08:35</option>
						<option value="520">08:40</option>
						<option value="525">08:45</option>
						<option value="530">08:50</option>
						<option value="535">08:55</option>
						<option value="540">09:00</option>
						<option value="545">09:05</option>
						<option value="550">09:10</option>
						<option value="555">09:15</option>
						<option value="560">09:20</option>
						<option value="565">09:25</option>
						<option value="570">09:30</option>
						<option value="575">09:35</option>
						<option value="580">09:40</option>
						<option value="585">09:45</option>
						<option value="590">09:50</option>
						<option value="595">09:55</option>
						<option value="600">10:00</option>
						<option value="605">10:05</option>
						<option value="610">10:10</option>
						<option value="615">10:15</option>
						<option value="620">10:20</option>
						<option value="625">10:25</option>
						<option value="630">10:30</option>
						<option value="635">10:35</option>
						<option value="640">10:40</option>
						<option value="645">10:45</option>
						<option value="650">10:50</option>
						<option value="655">10:55</option>
						<option value="660">11:00</option>
						<option value="665">11:05</option>
						<option value="670">11:10</option>
						<option value="675">11:15</option>
						<option value="680">11:20</option>
						<option value="685">11:25</option>
						<option value="690">11:30</option>
						<option value="695">11:35</option>
						<option value="700">11:40</option>
						<option value="705">11:45</option>
						<option value="710">11:50</option>
						<option value="715">11:55</option>
						<option value="720">12:00</option>
						<option value="725">12:05</option>
						<option value="730">12:10</option>
						<option value="735">12:15</option>
						<option value="740">12:20</option>
						<option value="745">12:25</option>
						<option value="750">12:30</option>
						<option value="755">12:35</option>
						<option value="760">12:40</option>
						<option value="765">12:45</option>
						<option value="770">12:50</option>
						<option value="775">12:55</option>
						<option value="780">13:00</option>
						<option value="785">13:05</option>
						<option value="790">13:10</option>
						<option value="795">13:15</option>
						<option value="800">13:20</option>
						<option value="805">13:25</option>
						<option value="810">13:30</option>
						<option value="815">13:35</option>
						<option value="820">13:40</option>
						<option value="825">13:45</option>
						<option value="830">13:50</option>
						<option value="835">13:55</option>
						<option value="840">14:00</option>
						<option value="845">14:05</option>
						<option value="850">14:10</option>
						<option value="855">14:15</option>
						<option value="860">14:20</option>
						<option value="865">14:25</option>
						<option value="870">14:30</option>
						<option value="875">14:35</option>
						<option value="880">14:40</option>
						<option value="885">14:45</option>
						<option value="890">14:50</option>
						<option value="895">14:55</option>
						<option value="900">15:00</option>
						<option value="905">15:05</option>
						<option value="910">15:10</option>
						<option value="915">15:15</option>
						<option value="920">15:20</option>
						<option value="925">15:25</option>
						<option value="930">15:30</option>
						<option value="935">15:35</option>
						<option value="940">15:40</option>
						<option value="945">15:45</option>
						<option value="950">15:50</option>
						<option value="955">15:55</option>
						<option value="960">16:00</option>
						<option value="965">16:05</option>
						<option value="970">16:10</option>
						<option value="975">16:15</option>
						<option value="980">16:20</option>
						<option value="985">16:25</option>
						<option value="990">16:30</option>
						<option value="995">16:35</option>
						<option value="1000">16:40</option>
						<option value="1005">16:45</option>
						<option value="1010">16:50</option>
						<option value="1015">16:55</option>
						<option value="1020">17:00</option>
						<option value="1025">17:05</option>
						<option value="1030">17:10</option>
						<option value="1035">17:15</option>
						<option value="1040">17:20</option>
						<option value="1045">17:25</option>
						<option value="1050">17:30</option>
						<option value="1055">17:35</option>
						<option value="1060">17:40</option>
						<option value="1065">17:45</option>
						<option value="1070">17:50</option>
						<option value="1075">17:55</option>
						<option value="1080">18:00</option>
						<option value="1085">18:05</option>
						<option value="1090">18:10</option>
						<option value="1095">18:15</option>
						<option value="1100">18:20</option>
						<option value="1105">18:25</option>
						<option value="1110">18:30</option>
						<option value="1115">18:35</option>
						<option value="1120">18:40</option>
						<option value="1125">18:45</option>
						<option value="1130">18:50</option>
						<option value="1135">18:55</option>
						<option value="1140">19:00</option>
						<option value="1145">19:05</option>
						<option value="1150">19:10</option>
						<option value="1155">19:15</option>
						<option value="1160">19:20</option>
						<option value="1165">19:25</option>
						<option value="1170">19:30</option>
						<option value="1175">19:35</option>
						<option value="1180">19:40</option>
						<option value="1185">19:45</option>
						<option value="1190">19:50</option>
						<option value="1195">19:55</option>
						<option value="1200">20:00</option>
						<option value="1205">20:05</option>
						<option value="1210">20:10</option>
						<option value="1215">20:15</option>
						<option value="1220">20:20</option>
						<option value="1225">20:25</option>
						<option value="1230">20:30</option>
						<option value="1235">20:35</option>
						<option value="1240">20:40</option>
						<option value="1245">20:45</option>
						<option value="1250">20:50</option>
						<option value="1255">20:55</option>
						<option value="1260">21:00</option>
						<option value="1265">21:05</option>
						<option value="1270">21:10</option>
						<option value="1275">21:15</option>
						<option value="1280">21:20</option>
						<option value="1285">21:25</option>
						<option value="1290">21:30</option>
						<option value="1295">21:35</option>
						<option value="1300">21:40</option>
						<option value="1305">21:45</option>
						<option value="1310">21:50</option>
						<option value="1315">21:55</option>
						<option value="1320">22:00</option>
						
					 </select>
				</div>
				
				<div class="col-span-3">
					<input type="date" class="form-control" id="time_start" >	
					</div>
				
			<p id="thong_bao_fail" class="text-danger"></p>
		</div>
	</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-success btn_xep_lich" >Tạo</button>
		</div>
	  </div>
	</div>
  </div>

@section("js")
<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
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
			$("p#thong_bao_time" ).html('');
			$("p#thong_bao_location" ).html('');
			$("p#thong_bao_fail" ).html('');
			$('#time_start').val('');
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
			$("p#thong_bao_time" ).html('');
			$("p#thong_bao_location" ).html('');
			$("p#thong_bao_fail" ).html('');
			let id =  $(this).attr('name');
			let service_id = $('.modal_list_service').val();
			let location = $('.modal_location').val();
			let time_start = $('#time_start').val();
			let apiSort = '{{route("sortAppointment")}}';
			$.ajax({
				url: apiSort,
				method: "POST",
				data: {
					id: id,
					service_id:service_id,
					time_start:time_start,
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
							if(response.messages.time_start){
								$("p#thong_bao_time" ).html('- ' + response.messages.time_start);
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

            scheduler.templates.format_date = function(date){
                return dateToStr (date);
            };
			console.log(data);
			scheduler.init('scheduler_here', new Date(moment().format('LL')), "timeline");
			scheduler.parse(data);
		});
</script>

@endsection
@endsection
