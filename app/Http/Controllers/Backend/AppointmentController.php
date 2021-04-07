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
        $data = $request->all();
        $data['status'] = 0;
        unset($data['_token'],$data['check_method']);
        $appointment = Appointment::create($data);
        foreach($request->service_id as $value){
            NumberService::create(['appointment_id'=>$appointment->id ,'service_id'=>$value]);
        };
        BillService::create(['appointment_id'=>$appointment->id,'payment_methods'=>$request->check_method]);
        return redirect()->route('checkout',['id'=>$appointment->id]);
     }
}