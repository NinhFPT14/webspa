<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Appointment;
use DB;
class CheckoutController extends Controller
{
    public function checkout($id){
        $data = Appointment::find($id);
        $number_services = DB::table('number_services')->where('appointment_id',$data->id)->get();
        $service_id =[];
        foreach($number_services as $value){
            $service_id[] =$value->service_id;
        }
        $service = DB::table('services')->get()->toArray($service_id);;
        return view('frontend.checkout',compact('data','service'));
    }

    public function voucher(Request $request ,$id){
        $service = DB::table('number_services')->where('appointment_id',$id)->get();
        $voucher = DB::table('service_vouchers')->where('code',$request->voucher)->get();
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
            if(count($service_voucher)){
                $data = Appointment::find($id);
                $data->voucher_id =$voucher_id;
                $data->save();
                alert()->success("Bạn được giảm $voucher_discount đ"); 
                return redirect()->route('checkout',['id'=>$id]);
            }
        }
        alert()->error('Mã giảm giá không đúng , hoặc không được hỗ trợ cho dịch vụ trên');
        return redirect()->route('checkout',['id'=>$id]);
    }
   
}