<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Appointment;
use App\Model\NumberService;
use App\Model\BillService;
use App\Model\ServiceVoucher;
use App\Model\Service;
use DB;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    
    public function sortAppointment(){
        $mytime = Carbon::now();
        $appointment = Appointment::orderByDesc('id')->paginate(10);
        $services = Service::where('status',0)->get();
        return view('backend.services.sortAppointment',compact('appointment','services'));
    }
    
    public function listAppointment(){
        $appointment = Appointment::where('status','!=' ,0)->orderByDesc('id')->paginate(10);
        return view('backend.services.listAppointment',compact('appointment'));
    }

    public function edit($id){
        return view('backend.services.editAppointment');
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