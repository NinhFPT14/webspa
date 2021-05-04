<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Appointment;
use App\Model\NumberService;
use App\Model\BillService;
use App\Model\ServiceVoucher;
use App\Model\Service;
use App\Model\Location;
use App\Model\Staff;
use App\Model\SortAppointment;
use App\Http\Requests\addSortAppointment;
use App\Http\Requests\AddAppointment;
use App\Http\Sms\SpeedSMSAPI;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Model\Sms;
use Carbon\Carbon;

class AppointmentController extends Controller
{

    public function listSortAppointment(Request $request){
        $mytime = Carbon::now();
        if(!$request->has('time')){
            $appointment = Appointment::where('status',1)->where('call_confirmation',1)->orderByDesc('id')->paginate(10);
        }else{
            $appointment = Appointment::where('status',1)->where('time_start',$request->time)->where('call_confirmation',1)->orderByDesc('id')->paginate(10);
        }
        $time = $request->time;
        $services = Service::where('status',0)->get();
        $location = Location::where('status',0)->get();
        $ghelam = Location::get();
        $seats = [];
        foreach ($ghelam as $key => $value) {
            $nhanvien = Staff::find($value->staff_id);
            $seats[] = [
                "key" => $value->id,
                "label" => $value->name .'('.$nhanvien->name.')'
            ];
        }// End for Seats
        // dd($location);
        $data = SortAppointment::get();
        $list = [];
        foreach ($data as $key => $value) {
            $appointment1 = Appointment::find($value->appointment_id);
            $list[] = [
                "id" => $value->id,
                "start_date" => $value->time_start,
                "end_date" => $value->time_end,
                "text" => $value->name_service,
                "key" => $value->location_id,
                "sdt" => $appointment1->phone,
                "name" => $appointment1->name,
                "appointment_id" => route('editAppointment',['id'=>$appointment1->id]),
            ];
        }

        return view('backend.services.sortAppointment',compact('appointment','services','location','data', 'seats','list','time'));
    }
    public function voucherAppointment(Request $request ,$id){
        $mytime = Carbon::now();
        $data = ServiceVoucher::where('code',$request->code)->where('status',0)->get();
        if(count($data) >= 1){
           foreach($data as $value){
               if($mytime < $value->time_end){
                  $appointment = Appointment::find($id);
                  $appointment->voucher_id = $value->id;
                  $appointment->discount_money = $value->discount;
                  $appointment->save();
                  return back();
               }else{
                return back()->with('message', 'Mã giảm giá đã hết hạn');
               }
           }
        }else{
         return back()->with('message', 'Mã giảm giá không tồn tại');
        }
    }
    public function statusAppointment(Request $request){
        try {
            $data = Appointment::find($request->id);
            $data->status = 2;
            $data->save();
            return response()->json(['status' => true, 'data' => $request->id]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
    }


    public function deleteSortAppointment(Request $request){
        try {
            $data = SortAppointment::find($request->id);
            $price = Service::find( $data->service_id);
            $service = NumberService::where('appointment_id',$data->appointment_id)->where('service_id',$data->service_id)->delete();
            $appointment = Appointment::find($data->appointment_id);
            $appointment->total_money = $appointment->total_money -  $price->discount;
            $appointment->save();
            $data->delete();
            return response()->json(['status' => true, 'data' => 'thành công']);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
    }

    public function changeAppointment(Request $request){
        $time =date("Y-m-d", strtotime(Carbon::now()));
        // dd($time , $request->date);
        $validate = Validator::make($request->all(), 
        [
            'date' => "required|date",
            'location' => "required",
            'hour' => "required",
        ],
        [
        'date.required' => "Thời gian không được để trống",
        'location.required' => "Ghế làm không được để trống",
        'hour.required' => "Giờ không được để trống",
        ]);

        if($validate->fails()){
            return json_encode([
                'status' => false,
                'messages' => $validate->errors()
            ]);
        }
        
        $data = SortAppointment::find($request->id);
        $appointment = Appointment::find($data->appointment_id);
        $service = Service::find( $data->service_id);
        $time_start = $request->date.' '. $request->hour;
        $newdate = strtotime ( "+$service->time_working minute" , strtotime ($time_start) ) ;
        $time_end = date ( 'Y-m-d H:i' , $newdate );

        $date_today =date('Y-m-d', strtotime($time_start));
        $newdate =strtotime ( '+22 hour' , strtotime ( $date_today )) ;
        $newdate2 =strtotime ( '+8 hour' , strtotime ( $date_today )) ;
        
        $time_start2 =date ( 'Y-m-d H:i' , $newdate2 );
        $time_end2 =date ( 'Y-m-d H:i' , $newdate );

        $time_start_format = date("H:i d-m-Y", strtotime($time_start));
        $time_end_format = date("H:i d-m-Y", strtotime($time_end));

        $dataAp =SortAppointment::where('location_id',$request->location)
        ->where('time_end','>=',$time_start)
        ->where('time_start','<=',$time_end)
        ->where('status','<',2)
        ->where('id','!=',$request->id)
        ->get();
        if(count($dataAp) == 0){
            if( (strtotime ($time_start) * 1000) < (strtotime ($time_start2) * 1000)){
                return response()->json(['status' => false, 'fail' => "Từ $time_start_format đến   $time_end_format chưa đến giờ làm việc"]);
            }elseif((strtotime ($time_end) * 1000) > (strtotime ($time_end2) * 1000)){
                return response()->json(['status' => false, 'fail' => "Từ $time_start_format đến   $time_end_format đã hết giờ làm việc"]);
            }else{
                $data->time_start = $time_start;
                $data->time_end = $time_end;
                $data->save();
                
        
                $sms = Sms::find(1);
                $sender = $sms->code_devices;
                $smsAPI = new SpeedSMSAPI($sms->code_api);

                $phones =[$appointment->phone];
                $content ="Cảm ơn quý khách hàng đã tin tưởng và sử dụng dịch vụ của QueenSpa , Chuyển lịch làm dịch vụ : $service->name của bạn vào $time_start_format và dự kiến kết thúc  $time_end_format ";
                $type = 2;
                $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
                return response()->json(['status' => true, 'data' => 'thành công']);
            }
        }else{
            return response()->json(['status' => false, 'fail' => "Từ $time_start_format đến  $time_end_format ghế đã có người làm"]);
        }
        
    }
    
    

    public function updateAppointment(AddAppointment $request ,$id){
        try {
            $data = $request->all();
            unset($data['_token'],$data['service_id']);
            $service = NumberService::where('appointment_id',$id)->delete();
            $total_money = 0;
            for($i= 0 ; $i < count($request->service_id) ; $i++){
                $updateService = new NumberService;
                $updateService->appointment_id = $id;
                $updateService->service_id = $request->service_id[$i];
                $updateService->save();
                $price = Service::find($request->service_id[$i]);
                $total_money += $price->discount;
            }
            $data['total_money'] = $total_money;
            $appointment = Appointment::where('id',$id)->update( $data);
            return back();
        } catch (Exception $e) {
            return back()->with('message', 'Lỗi không sửa được đơn đặt lịch');
        }
    }
    
    public function listServiceAppointment(Request $request){
        try {

            $service_id = NumberService::where('appointment_id',$request->id)->get();
            $sort = SortAppointment::where('appointment_id',$request->id)->get();
            $arr = [];
            $arr2 = [];
            foreach($service_id as $value){
                $arr[] = $value->service_id;
            }
            foreach($sort as $value){
                $service = Service::find($value->service_id);
                if(count($sort) >= $service->total_time){
                    $arr2[] = $value->service_id;
                }
            }
            $arrId = array_diff($arr, $arr2);
            $data = Service::whereIn('id', $arrId)->get();
            $location = Location::where('status',0)->get();
            return response()->json(['status' => true, 'data' => $data ,'id'=>$request->id ,'location'=>$location]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
    }

    public function sortAppointment(Request $request){
        $time =date("Y-m-d", strtotime(Carbon::now()));
        $validate = Validator::make($request->all(), 
        [
            'date' => "required|date",
            'service_id' => "required",
            'location' => "required",
            'hour' => "required",
        ],
        [
        'date.required' => "Thời gian không được để trống",
        'location.required' => "Ghế làm không được để trống",
        'service_id.required' => "Dịch vụ không được để trống",
        'hour.required' => "Giờ không được để trống",
        ]);

        if($validate->fails()){
            return json_encode([
                'status' => false,
                'messages' => $validate->errors()
            ]);
        }

        $appointment = Appointment::find($request->id);
        $service = Service::find($request->service_id);
        $location = Location::find($request->location);
        $staff = Staff::find($location->staff_id);

        $time_start = $request->date.' '. $request->hour;
        $newdate = strtotime ( "+$service->time_working minute" , strtotime ($time_start) ) ;
        $time_end = date ( 'Y-m-d H:i' , $newdate );

        $data =SortAppointment::where('location_id',$request->location)
        ->where('time_end','>=',$time_start)
        ->where('time_start','<=',$time_end)
        ->where('status','<',2)
        ->get();
        $date_today =date('Y-m-d', strtotime($time_start));
        $newdate =strtotime ( '+22 hour' , strtotime ( $date_today )) ;
        $newdate2 =strtotime ( '+8 hour' , strtotime ( $date_today )) ;
        
        $time_start2 =date ( 'Y-m-d H:i' , $newdate2 );
        $time_end2 =date ( 'Y-m-d H:i' , $newdate );

        $time_start_format = date("H:i d-m-Y", strtotime($time_start));
        $time_end_format = date("H:i d-m-Y", strtotime($time_end));

        // dd(strtotime ($time_start) * 1000);
        if(count($data) == 0){
            if( (strtotime ($time_start) * 1000) < (strtotime ($time_start2) * 1000)){
                return response()->json(['status' => false, 'fail' => "Từ $time_start_format đến   $time_end_format chưa đến giờ làm việc"]);
            }elseif((strtotime ($time_end) * 1000) > (strtotime ($time_end2) * 1000)){
                return response()->json(['status' => false, 'fail' => "Từ $time_start_format đến   $time_end_format đã hết giờ làm việc"]);
            }else{
                $sort = new SortAppointment();
                $sort->appointment_id = $request->id;
                $sort->service_id = $request->service_id;
                $sort->location_id = $request->location;
                $sort->time_start = $time_start;
                $sort->time_end = $time_end;
                $sort->status = 0;
                $sort->name_service =$service->name;
                $sort->name_location = $location->name;
                $sort->name_staff = $staff->name;
                $sort->save();
                   //  Gửi otp

                $sms = Sms::find(1);
                $sender = $sms->code_devices;
                $smsAPI = new SpeedSMSAPI($sms->code_api);

                $phones =[$appointment->phone];
                $content ="Cảm ơn quý khách hàng đã tin tưởng và sử dụng dịch vụ của QueenSpa , Lịch làm dịch vụ : $service->name của bạn vào $time_start_format và dự kiến kết thúc  $time_end_format ";
                $type = 2;
                $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
                return response()->json(['status' => true, 'data' => 'thành công']);
            }

        }else{
            return response()->json(['status' => false, 'fail' => "Từ $time_start_format đến  $time_end_format  ghế đã có người làm"]);
        }
    }

    public function listAppointment(Request $request){
        if(!$request->hasAny(['key', 'from_time', 'to_time'])){
            $appointment = Appointment::where("status",'!=',0)->orderByDesc('id')->paginate(10);
        }else{
            if($request->has('key')){
                $query = Appointment::where("status",'!=',0)->where(function($q2) use ($request){
                    $q2->orWhere("id",$request->key)
                        ->orWhere("name", "like", "%".$request->key."%")
                        ->orWhere("phone", "like", "%".$request->key."%");
                });
            }
            if($request->from_time != null && $request->to_time != null){
                $query = $query->whereBetween('time_start', [
                    Carbon::createFromFormat('d/m/Y', $request->from_time)->format('Y-m-d'),
                    Carbon::createFromFormat('d/m/Y', $request->to_time)->format('Y-m-d')
                ]);
            }
            if($request->has('type')){
                $query =  $query->where("status",$request->type);
            }
            $appointment = $query->orderByDesc('id')->paginate(10);
        }
        $key = $request->key;
        $from_time = $request->from_time;
        $to_time = $request->to_time;
        $type = $request->type;
        return view('backend.services.listAppointment',compact('appointment','key','from_time','to_time','type'));
    }

    public function edit($id){
        $data = Appointment::find($id);
        $service_id = NumberService::where('appointment_id',$data->id)->get();
        $SortAppointment = SortAppointment::where('status','!=',3)->where('appointment_id',$id)->get();
        $arr = [];
        $arr2 = [];
        foreach($service_id as $value){
            $arr[] = $value->service_id;
        }
        foreach($SortAppointment as $value){
            $arr2[] = $value->service_id;
        }
        $arrId = array_diff($arr, $arr2);
        $serviceAppointment = Service::whereIn('id', $arrId)->get();
        $location = Location::where('status',0)->get();
        $sort = SortAppointment::where('appointment_id',$id)->orderBy('time_start', 'asc')->get();
        return view('backend.services.editAppointment',compact('data','service_id','location','sort','serviceAppointment'));
    }


    public function detailAppointment(Request $request){
        try {
            $appointment = Appointment::find($request->id);
            $services = NumberService::where('appointment_id',$appointment->id)->get();
            $arrayId =[];
            foreach($services as $value){
                $arrayId[] = $value->service_id;
            }
            $service = Service::whereIn('id', $arrayId)->get();
            return response()->json(['status' => true, 'data' => $appointment ,'service'=>$service]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }

    }

     public function apiGetDataById(Request $request){ // Lấy ra id từ request
        // dd($request);
         if($request->has('id')){
             $appointment = Appointment::find($request->id);
             $appointment->load('services');
             return response()->json(['status' => true, 'data' => $appointment]);
         }
         return response()->json(['status' => false, 'message' => 'Không có tham số id']);
     }

     public function searchTimeAppointment(Request $request){
        $services = Service::where('status',0)->get();
        $time  = $request->time;
         if($request->time == null){
            $appointment = Appointment::where('status',1)->paginate(10);
         }else{
            $appointment = Appointment::where('status',1)->where('created_at', 'like', '%' . $request->time . '%')->paginate(6);
         }
        return view('backend.services.sortAppointment',compact('appointment','services'));
    }

    public function confirm(Request $request){
        if($request->has('id')){
            $flight = Appointment::find($request->id);
            // dd($flight);
            $flight->name = $request->name;
            $flight->phone = $request->phone;
            $flight->note = $request->note;
            $flight->time_ficked = $request->time_ficked;
            $flight->time_start = $request->time_start;
            $flight->status = $request->status;
            $flight->payment_methods = $request->payment_methods;
            $flight->call_confirmation = $request->call_confirmation;
            $flight->payment_status = $request->payment_status;
            $flight->note_admin = $request->note_admin;
            $flight->save();
            $Appointment = Appointment::find($request->id);
            $Appointment->services()->detach();
            foreach($request->service_id as $value){
                NumberService::create(['appointment_id'=>$request->id ,'service_id'=>$value]);
            };
            return response()->json(['status' => true, 'data' => 'thành công']);
        }
        return response()->json(['status' => false, 'message' => 'Không có tham số id']);
    }

}
