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
<div class="md:container md:mx-auto px-4 border-green-900 h-5/6  shadow-xl ">
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf-8">
	var sections = {!!json_encode($seats)!!};
	var data = {!!json_encode($list)!!};
	console.log(data)
	window.addEventListener("DOMContentLoaded", function(){
		
			scheduler.locale.labels.timeline_tab = "Timeline";
			scheduler.locale.labels.section_custom = "Section";
			scheduler.config.multisection = true;
            // scheduler.config.readonly = true;
			//===============
			//Configuration
			//===============

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
				y_property:	"key",
				render:"bar",
				event_dy: "full"

			});

			scheduler.attachEvent("onEventSave",function(id,ev,is_new){
				var convert = scheduler.date.date_to_str("%Y/%m/%d %H:%i", true); 
				const url = "{{ route('appointment.apiSave') }}"
				console.log(ev.text)
				console.log(convert(ev.start_date))
				console.log(convert(ev.end_date))
				if (!ev.text) {
					alert("Text must not be empty");
					return false;
				}
				if (!ev.text.length<20) {
					alert("Text too small");
					return false;
				}
				return true;
				axios.post(url, {

				})
				
			})


			//===============
			//Data loading
			//===============
            var dateToStr = scheduler.date.date_to_str("%Y-%m-%d");

            scheduler.templates.format_date = function(date){
                return dateToStr (date);
            };
			scheduler.init('scheduler_here', new Date(moment().format('LL')), "timeline");
			scheduler.parse(data);
		});
</script>

@endsection
@endsection




