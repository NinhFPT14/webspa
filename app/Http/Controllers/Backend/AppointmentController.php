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
use App\Http\Sms\SpeedSMSAPI;
use DB;
use Carbon\Carbon;

class AppointmentController extends Controller
{

    public function listSortAppointment(){
        $mytime = Carbon::now();
        $appointment = Appointment::orderByDesc('id')->paginate(10);
        $services = Service::where('status',0)->get();
        $location = Location::select('id','name')->get();
        $seats = [];
        foreach ($location as $key => $value) {
            $seats[] = [
                "key" => $value->id,
                "label" => $value->name
            ];
        }// End for Seats
        // dd($location);
        $data = SortAppointment::get();
        $list = [];
        foreach ($data as $key => $value) {
            $list[] = [
                "id" => $value->id,
                "start_date" => $value->time_start,
                "end_date" => $value->time_end,
                "text" => $value->name_service,
                "key" => $value->location_id
            ];
        }
        return view('backend.services.sortAppointment',compact('appointment','services','location','data', 'seats','list'));
    }

    public function listSit(){
        try {
            $data = Location::select('name','id')->where('status',0)->get();
            return response()->json(['status' => true, 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
    }

    public function sortAppointment(addSortAppointment $request ,$id){
        $appointment = Appointment::find($id);
        $service = Service::find($request->service_id);
        $location = Location::find($request->location_id);
        $staff = Staff::find($location->staff_id);
        $data =SortAppointment::where('location_id',$request->location_id)
        ->where('time_end','>=',$request->time_start)
        ->where('time_start','<=',$request->time_end)
        ->where('status','<',2)
        ->get();
        if(count($data) == 0){
            $sort = new SortAppointment();
            $sort->appointment_id = $id;
            $sort->service_id = $request->service_id;
            $sort->location_id = $request->location_id;
            $sort->time_start = $request->time_start;
            $sort->time_end = $request->time_end;
            $sort->status = 0;
            $sort->name_service =$service->name;
            $sort->name_location = $location->name;
            $sort->name_staff = $staff->name;
            $sort->save();
               //  Gửi otp
            $phones =[$appointment->phone];
            $content ="Cảm ơn quý khách hàng đã tin tưởng và sử dụng dịch vụ của QueenSpa , Lịch làm dịch vụ $service->name vào $request->time_start và dự kiến kết thúc $request->time_end ";
            $type = 2;
            $sender = "981c320db4992b97";
            $smsAPI = new SpeedSMSAPI("C774uYmPE8i08NoNNqdfMTSFbP3esizy");
            $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
            alert()->success('Xếp lịch thành công');
             return redirect()->route('editAppointment',['id'=>$id]);
        }else{
            return redirect()->route('editAppointment',['id'=>$id])->with('thongbao',"Từ $request->time_start đến  $request->time_end ghế đã hết");
        }
    }

    public function listAppointment(Request $request){
        if(!$request->hasAny(['key', 'from_time', 'to_time'])){
            $appointment = Appointment::paginate(10);
        }else{
            if($request->has('key')){
                $query = Appointment::where(function($q2) use ($request){
                    $q2->where("name", "like", "%".$request->key."%")
                        ->orWhere("phone", "like", "%".$request->key."%");
                });
            }
            if($request->has(['from_time', 'to_time'])){
                $query = $query->whereBetween('time_start', [
                    Carbon::createFromFormat('d/m/Y', $request->from_time)->format('Y-m-d'),
                    Carbon::createFromFormat('d/m/Y', $request->to_time)->format('Y-m-d')
                ]);
            }
//             dd($query->toSql(), Carbon::createFromFormat('d/m/Y', $request->from_time)->format('Y-m-d'));
            $appointment = $query->paginate(10);
        }



//        $appointment = Appointment::where('status','!=' ,0)->orderByDesc('id')->paginate(10);
        return view('backend.services.listAppointment',compact('appointment'));
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
    public function cancelAppointment($id){
        $SortAppointment = SortAppointment::find($id);
        $SortAppointment->status = 3;
        $SortAppointment->save();
        alert()->error('Huỷ lịch thành công');
        return redirect()->route('editAppointment',['id'=>$SortAppointment->appointment_id]);
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
            dd($flight);
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
