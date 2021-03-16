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
        $time_now =Carbon::now()->toDateTimeString();
        $service = DB::table('number_services')->where('appointment_id',$id)->get();
        $voucher = DB::table('service_vouchers')->get();

        $voucher = DB::table('service_vouchers')->where('code',$request->voucher)->get();

        // dd($time_now);
        foreach($voucher as $a){
            if($time_now >= $a->time_start && $time_now <= $a->time_end  && $a->status == 1){
                
            }else {
                dd(2);
            }
            // dd($a->time_end);
        }
        
        if(count($voucher) == 1){
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
            }
        }
        alert()->error('Mã giảm giá không đúng , hoặc đã sử dụng');
        return redirect()->route('checkout',['id'=>$id]);
    }
   
}