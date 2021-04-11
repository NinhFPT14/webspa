<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\Appointment;
use App\Model\NumberService;
use App\Http\Requests\editAppointment;
use App\Http\Requests\AddAppointment;
use Carbon\Carbon;
use App\Http\Sms\SpeedSMSAPI;
use App\Http\Requests\checkOtpRequest;
use Session;

class AppointmentController extends Controller
{
   public function appointment(){
    return view('frontend.appointment');
   }

   public function save(AddAppointment $request) {
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
          return redirect()->route('appointment.confirm',['token'=>$flight->token,'id'=>$flight->id]);
      } catch (Exception $e) {
          return redirect()->route('appointment');
      }
      
      
   }

   public function confirm($token,$id){
        $cart = Session::get('appointmentId');
        $cart[] = $id;
        Session::put('appointmentId',$cart);
      $data = Appointment::find($id);
      $number_services = DB::table('number_services')->where('appointment_id',$data->id)->get();
      $service_id =[];
      foreach($number_services as $value){
          $service_id[] =$value->service_id;
      }
      $service = DB::table('services') ->whereIn('id', $service_id)->get();
      return view('frontend.appointmentConfirm',compact('data','service'));
  }

  public function voucher(Request $request ,$id){
      $time_now =Carbon::now()->toDateTimeString();
      $appointment = Appointment::find($id);
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
                      return redirect()->route('appointment.confirm',['token'=>$appointment->token,'id'=>$id]);
                  }
              }
          }
      }
      alert()->error('Mã giảm giá không đúng');
      return redirect()->route('appointment.confirm',['token'=>$appointment->token,'id'=>$id]);
  }

  public function saveConfirm(editAppointment $request ,$id){
      $otp = rand(1000,9000);
      $flight = Appointment::find($id);
      $flight->otp = $otp;
      $flight->name = $request->name;
      $flight->phone = $request->phone;
      $flight->time_ficked = $request->time_ficked;
      $flight->time_start = $request->time_start;
      $flight->note = $request->note;
      $flight->payment_methods = $request->check_method;
      $flight->save();
      // Gửi otp 
      $phones =[ $request->phone];
      $content ="Mã otp xác thực đặt lịch của bạn là  ".$otp;
      $type = 2;
      $sender = "981c320db4992b97";
      $smsAPI = new SpeedSMSAPI("C774uYmPE8i08NoNNqdfMTSFbP3esizy");
      $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
      return redirect()->route('appointment.otp',['token'=>$flight->token,'id'=>$id]);
  }

  public function otp($token,$id){
      $flight = Appointment::find($id);
      $id = $id;
      if($flight){
          return view('frontend.otpUser',compact('id'));
      }else {
          return redirect()->route('home');
      }
     
  }

  public function confirmOtp(checkOtpRequest $request,$id){
      // dd($request->all());
      $flight = Appointment::find($id);
      if($flight->otp == $request->code){
          $flight->status = 1;
          $flight->save();
          alert()->success("Đặt lịch thành công"); 
          return redirect()->route('home');
      }else {
          alert()->error('Mã xác thực otp không dúng');
          return back();
      }
  }
  public function listBooking(){
    $arrId = [];
    if(Session::has('appointmentId')){
       foreach(Session::get('appointmentId') as $value){
        $arrId[]= $value;
       }
    }
    $data = Appointment::whereIn('id', $arrId)->get();
    return view('frontend.booking',compact('data'));
  }

}
