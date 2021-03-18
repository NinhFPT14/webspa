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
<<<<<<< HEAD
        $time_now =Carbon::now()->toDateTimeString(); 
        dd($time_now);
        $service = DB::table('number_services')->where('appointment_id',$id)->get();
        $voucher = DB::table('service_vouchers')->where('code',$request->voucher)
        ->orWhere('status',0)->orWhere('time_start', '<=',$time_now)->orWhere('time_end', '=>',$time_now)->get();
        // dd($voucher);
=======
        $time_now =Carbon::now()->toDateTimeString();
        $service = DB::table('number_services')->where('appointment_id',$id)->get();
        $voucher = DB::table('service_vouchers')->get();
        $voucher = DB::table('service_vouchers')->where('code',$request->voucher)->get();
>>>>>>> 31fb9bd39aac4e490292769d7a8936e79d0b4369
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
   
}