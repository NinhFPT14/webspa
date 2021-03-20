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

     public function delete($appointment_id,$service_id){
        $appointment = Appointment::find($appointment_id);
        if($appointment->voucher_id != NULL){
            $serviceVoucher = ServiceVoucher::find($appointment->voucher_id);
            if( $serviceVoucher->service_id == $service_id){
                Appointment::where('id',$appointment_id)->update(['voucher_id'=>NULL]);
            }
        }
        NumberService::where('appointment_id',$appointment_id)->where('service_id',$service_id)->delete();
        alert()->error('Xóa dịch vụ thành công');
        return redirect()->route('checkout',['id'=>$appointment_id]);
       }

       public function addService(Request $request ,$id){
        if($request->service_id == null){
            alert()->error('Bạn phải chọn dịch vụ');
            return redirect()->route('checkout',['id'=>$id]);
        }else{
            NumberService::create(['appointment_id'=>$id,'service_id'=>$request->service_id]);
        }
        alert()->success('Thêm thành công'); 
        return redirect()->route('checkout',['id'=>$id]);
       }
    
}