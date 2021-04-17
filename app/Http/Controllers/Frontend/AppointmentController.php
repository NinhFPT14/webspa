<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

  public function apiSave(Request $request){
        $validate = Validator::make($request->all(), 
        [
            'name' => 'required|max:255',
            'phone' => 'required|numeric|digits_between:10,11',
            'note' => 'max:65535',
            'time_ficked' => 'required|max:255',
            'time_start' => 'required|date|after_or_equal:today',
            'service_id' => 'required',
            'service_id.*' => 'required|numeric',
        ],
        ['name.required' => 'Họ tên không được để trống',
        'name.max' => "Họ tên không được vượt quán 255 ký tự",
        'phone.required' => "Số điện thoại không được để trống",
        'phone.numeric' => "Sô điện thoại phải là số",
        'phone.digits_between' => "Sô điện thoại không hợp lệ",
        'note.max' => "Lời nhắn không được vượt quá 65535 ký tự",
        'time_ficked.required' => "Thời gian mong muốn không được để trống",
        'time_ficked.max' => "Thời gian mong muốn không hợp lệ",
        'time_start.required' => "Ngày làm không được để trống",
        'time_start.after_or_equal' => "Ngày làm không hợp lệ",
        'service_id.required' => "Dịch vụ không được để trống",
        ]);
        if($validate->fails()){
            return json_encode([
                'status' => false,
                'messages' => $validate->errors()
            ]);
            return 'done';
        }
        $otp = rand(10000,90000);
        $flight = new Appointment;
        $flight->name = $request->name;
        $flight->phone = $request->phone;
        $flight->note = $request->note;
        $flight->time_ficked = $request->time_ficked;
        $flight->time_start = $request->time_start;
        $flight->token = $request->_token;
        $flight->status = 0;
        $flight->otp = $otp;
        $flight->save();
        foreach($request->service_id as $value){
            NumberService::create(['appointment_id'=>$flight->id ,'service_id'=>$value]);
        };

        $booking = Session::get('appointmentId');
        $booking[] = $flight->id;
        Session::put('appointmentId',$booking);

        //  Gửi otp 
        // $phones =[$request->phone];
        // $content ="Cảm ơn quý khách hàng đã tin tưởng và sử dụng dịch vụ của QueenSpa , Mã otp đặt lịch của quý khách là : ".$otp." Mã đơn đặt lịch $flight->id ";
        // $type = 2;
        // $sender = "981c320db4992b97";
        // $smsAPI = new SpeedSMSAPI("C774uYmPE8i08NoNNqdfMTSFbP3esizy");
        // $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
        return response()->json(['status' => true, 'data' => $flight->id ]);
    }

    public function apiconfirmOtp(Request $request){
        $validate = Validator::make($request->all(), 
        [
            'id' => 'required|numeric',
            'code' => 'required|numeric',
        ],
        ['id.required' => 'Mã đơn không được để trống',
        'id.numeric' => 'Mã đơn không hợp lệ',
        'code.required' => "Mã otp không được để trống",
        'code.numeric' => "Mã otp phải là số",
        ]);

        if($validate->fails()){
            return json_encode([
                'status' => false,
                'messages' => $validate->errors()
            ]);
        }
        $flight = Appointment::find($request->id);
        if($flight->otp == $request->code){
            $flight->status = 1;
            $flight->save();
            return response()->json(['status' => true, 'success' => 'ok']);
        }else {
            return json_encode([
                'status' => false,
                'fail' => 'Mã otp không đúng'
            ]);
        }
       
    }

}
