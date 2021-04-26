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
<script src="{{ asset('jsCalendar/dhtmlxscheduler.js') }}" type="text/javascript" charset="utf-188"></script>
    <script src=" {{ asset('jsCalendar/ext/dhtmlxscheduler_timeline.js') }} " type="text/javascript" charset="utf-8"></script>

    <link rel='stylesheet' type='text/css' href="{{ asset('jsCalendar/dhtmlxscheduler_material.css') }}">
@endsection

<div class="md:container md:mx-auto px-4 border-green-900 h-5/6  shadow-xl cursor-not-allowed">
       <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%'>
                   <div class="dhx_cal_navline">
                       <div class="dhx_cal_prev_button">&nbsp;</div>
                       <div class="dhx_cal_next_button">&nbsp;</div>
                       <div class="dhx_cal_today_button"></div>
                       <div class="dhx_cal_date"></div>
                   </div>
               <div class="dhx_cal_header">
               </div>
               <div class="dhx_cal_data border-separate">
       </div>
       <!-- Bảng xếp lịch kết thúc -->
</div>
<br>


@section("js")
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>


<script type="text/javascript" charset="utf-8">
						
		window.addEventListener("DOMContentLoaded", function(){
			scheduler.locale.labels.timeline_tab = "Timeline";
			scheduler.locale.labels.section_custom = "Section";

			//===============
			//Configuration
			//===============


			var sections = [
				{key:1, label:"Ghế 1"},
				{key:2, label:"Ghế 2"},
			];
			let apiDetail = '{{route("listSit")}}';
			$.ajax({
				url: apiDetail,
				method: "GET",
				data: {
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function(response) {
						if(response.data){
							for(var i = 0 ; i < response.data.length ; i++ ){
								sections.push({
								key: response.data[i].id, 
								label:  response.data[i].name
							});	
							}
						}else{
							console.log('fdsd');
						}
				}

			})

			console.log(sections);




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
				x_start: 9,
				x_length: 24,
				y_unit:	sections,
				y_property:	"section_id",
				render:"bar",
				event_dy: "full"

			});


			//===============
			//Data loading
			//===============

			scheduler.init('scheduler_here', new Date(moment().format('l')), "timeline");


			scheduler.parse([
				{ start_date: "2021-04-25 09:00", end_date: "2021-04-25 12:00", text:"Khách Dịu", section_id:1},
				{ start_date: "2021-04-25 10:00", end_date: "2021-04-25 16:00", text:"Khách Vip Công", section_id:2},
				{ start_date: "2021-04-25 10:00", end_date: "2021-04-25 14:00", text:"Khách Vinh", section_id:3},
				{ start_date: "2021-04-25 12:00", end_date: "2021-04-25 13:00", text:"Khách Thi", section_id:4},
				{ start_date: "2021-04-25 14:00", end_date: "2021-04-25 16:00", text:"Khách Tú", section_id:5},
				{ start_date: "2021-04-25 16:00", end_date: "2021-04-25 17:00", text:"Khách Hải", section_id:5},
				{ start_date: "2021-04-25 16:30", end_date: "2021-04-25 18:00", text:"Khách Ninh", section_id:5},
			]);
		});
</script>

@endsection
@endsection




