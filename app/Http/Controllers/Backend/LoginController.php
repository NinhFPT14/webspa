<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Sms\SpeedSMSAPI;
use App\Model\Sms;

class LoginController extends Controller
{
    public function otp (Request $request){
           $otp = rand(10000,90000);
           $user = User::find($request->id);
           $user->phone_code = $otp;
           $user->save();

           $sms = Sms::find(1);
           $sender = $sms->code_devices;
           $smsAPI = new SpeedSMSAPI($sms->code_api);

           $phones =[$user->phone_number];
           $content ="Mã otp đổi mật khẩu của bạn là : ".$otp;
           $type = 2;
           $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
           return response()->json(['status' => true, 'data' => 'thành công']);
    }

    public function confirmOtp (Request $request){
        $validate = Validator::make($request->all(), 
        [
            'code' => 'required|numeric',
        ],
        [
            'code.required' => 'Mã OTP không được để trống',
            'code.numeric' => 'Mã OTP phải là số',
        ]);
        if($validate->fails()){
            return json_encode([
                'status' => false,
                'messages' => $validate->errors()
            ]);
            return 'done';
        }
        $user = User::find($request->id);
        if($user->phone_code == $request->code){
            return response()->json(['status' => true, 'data' => 'thành công' ]);

        }else{
             return response()->json(['status' => false, 'fail' => 'Mã otp không đúng' ]);
        }
        
 }

    public function password (Request $request){
        $validate = Validator::make($request->all(), 
        [
            'password' => 'required|min:5|max:12',
            'password_confirm' => 'same:password',
        ],
        [
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu không được dưới 5 ký tự',
            'password.max' => 'Mật khẩu không được vượt quán 12 ký tự',
            'password_confirm.same' => 'Nhập lại mật khẩu không đúng',
        ]);
        if($validate->fails()){
            return json_encode([
                'status' => false,
                'messages' => $validate->errors()
            ]);
            return 'done';
        }

        $user = User::find($request->id);
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['status' => true, 'data' => 'thành công' ]);
 }


    public function confirmPhone (Request $request){
        $validate = Validator::make($request->all(), 
        [
            'phone' => 'required|regex:/^[0][0-9]{9}$/',
        ],
        [
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại không hợp lệ',
        ]);
        if($validate->fails()){
            return json_encode([
                'status' => false,
                'messages' => $validate->errors()
            ]);
            return 'done';
        }

        $user = User::where('phone_number',$request->phone)->get();
        if(count($user) != 0){
            foreach($user as $value){
                $otp = rand(10000,90000);
                $user = User::find($value->id);
                $user->phone_code = $otp;
                $user->save();

                $sms = Sms::find(1);
                $sender = $sms->code_devices;
                $smsAPI = new SpeedSMSAPI($sms->code_api);

                $phones =[$value->phone_number];
                $content ="Mã cấp lại mật khẩu của bạn là : ".$otp;
                $type = 2;
                $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
                return response()->json(['status' => true, 'data' =>  $user->id]);
            }
        }else{
            return response()->json(['status' => true, 'fail' => 'Số điện thoại không tồn tại' ]);
        }
    }

    public function renewPassword (Request $request){
        $validate = Validator::make($request->all(), 
        [
            'code' => 'required|numeric',
        ],
        [
            'code.required' => 'Mã OTP không được để trống',
            'code.numeric' => 'Mã OTP phải là số',
        ]);
        if($validate->fails()){
            return json_encode([
                'status' => false,
                'messages' => $validate->errors()
            ]);
            return 'done';
        }

        $user = User::find($request->id);
        if($user->phone_code == $request->code){
            $password = rand(100000,900000);
            $user->password = bcrypt($password);
            $user->save();

            $sms = Sms::find(1);
            $sender = $sms->code_devices;
            $smsAPI = new SpeedSMSAPI($sms->code_api);

            $phones =[$user->phone_number];
            $content =" Mật khẩu mới của bạn là : ".$password ." Vui lòng đăng nhập và đổi lại mật khẩu";
            $type = 2;
            $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
            return response()->json(['status' => true, 'data' => 'thành công' ]);

        }else{
             return response()->json(['status' => false, 'fail' => 'Mã otp không đúng' ]);
        }
    }
    
}
