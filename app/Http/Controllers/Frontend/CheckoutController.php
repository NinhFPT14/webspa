<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Appointment;
use App\Model\BillService;
use DB;
use Carbon\Carbon;
use App\Http\Requests\editAppointment;
class CheckoutController extends Controller
{
    public function checkout($id){
        $data = Appointment::find($id);
        $number_services = DB::table('number_services')->where('appointment_id',$data->id)->get();
        $service_id =[];
        foreach($number_services as $value){
            $service_id[] =$value->service_id;
        }
        $service = DB::table('services') ->whereIn('id', $service_id)->get();
        return view('frontend.checkout',compact('data','service'));
    }

    public function voucher(Request $request ,$id){
        $time_now =Carbon::now()->toDateTimeString();
        $service = DB::table('number_services')->where('appointment_id',$id)->get();
        $voucher = DB::table('service_vouchers')->get();
        $voucher = DB::table('service_vouchers')->where('code',$request->voucher)->get();
        if(count($voucher) == 1){
            foreach($voucher as $a){
                if($time_now >= $a->time_start && $time_now <= $a->time_end  && $a->status == 0){
                    $service_id ="";
                    $voucher_id ="";
                    $voucher_discount ="";
                    foreach($voucher as $value){
                        $service_id = $value->service_id;
                        $voucher_id = $value->id;
                        $voucher_discount = number_format($value->discount);
                    }
                    $service_voucher = DB::table('number_services')->where('service_id',$service_id)->where('appointment_id',$id)->get();
                    if(count($service_voucher) == 1){
                        $data = Appointment::find($id);
                        $data->voucher_id =$voucher_id;
                        $data->save();
                        alert()->success("Bạn được giảm $voucher_discount đ"); 
                        return redirect()->route('checkout',['id'=>$id]);
                    }
                }
            }
        }
        alert()->error('Mã giảm giá không đúng');
        return redirect()->route('checkout',['id'=>$id]);
    }

    public function save(editAppointment $request ,$id){
        $data = $request->all();
        unset($data['_token'],$data['check_method']);
        Appointment::where('id',$id)->update($data);
        BillService::where('appointment_id',$id)->update(['payment_methods'=>$request->check_method]);
        return redirect()->route('checkout',['id'=>$id]);
    }
   
}