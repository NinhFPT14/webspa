<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Appointment;
use App\Model\NumberService;
use App\Model\BillService;
use App\Model\ServiceVoucher;
use DB;
use App\Http\Requests\AddAppointment;

class AppointmentController extends Controller
{
    public function save(AddAppointment $request) {
        // dd($request->all());
        try {
            $flight = new Appointment;
            $flight->name = $request->name;
            $flight->phone = $request->phone;
            $flight->note = $request->note;
            $flight->time_ficked = $request->time_ficked;
            $flight->time_start = $request->time_start;
            $flight->token = $request->_token;
            $flight->status = 0;
            $flight->save();
            foreach($request->service_id as $value){
                NumberService::create(['appointment_id'=>$flight->id ,'service_id'=>$value]);
            };
            return redirect()->route('checkout',['token'=>$flight->token,'id'=>$flight->id]);
        } catch (Exception $e) {
            return redirect()->route('appointment');
        }
        
        
     }

     public function apiGetDataById(Request $request){
         if($request->has('id')){
             $appointment = Appointment::find($request->id);
             $appointment->load('services');
             return response()->json(['status' => true, 'data' => $appointment]);
         }
         return response()->json(['status' => false, 'message' => 'Không có tham số id']);
     }

     
}