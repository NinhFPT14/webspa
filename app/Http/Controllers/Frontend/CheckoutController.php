<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Appointment;
use DB;
use Carbon\Carbon;
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
        $time_now =Carbon::now(); 
        $service = DB::table('number_services')->where('appointment_id',$id)->get();
        $voucher = DB::table('service_vouchers')->where('code',$request->voucher)
        ->orWhere('status',0)->orWhere('time_start', '<=',$time_now)->orWhere('time_end', '=>',$time_now)->get();
        if(count($voucher) == 1){
            $service_id ="";
            $voucher_id ="";
            $voucher_discount ="";
            foreach($voucher as $value){
                $service_id = $value->service_id;
                $voucher_id = $value->id;
                $voucher_discount = number_format($value->discount);
            }
            $service_voucher = DB::table('number_services')->where('service_id',$service_id)->orWhere('appointment_id',$id)->get();
            if(count($service_voucher) == 1){
                $data = Appointment::find($id);
                $data->voucher_id =$voucher_id;
                $data->save();
                alert()->success("Bạn được giảm $voucher_discount đ"); 
                return redirect()->route('checkout',['id'=>$id]);
            }
        }
        alert()->error('Mã giảm giá không đúng , hoặc không được hỗ trợ cho các dịch vụ trên');
        return redirect()->route('checkout',['id'=>$id]);
    }
   
}