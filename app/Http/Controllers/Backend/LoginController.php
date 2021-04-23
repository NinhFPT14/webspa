<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Sms\SpeedSMSAPI;

class LoginController extends Controller
{
    public function otp (Request $request){
           $otp = rand(10000,90000);
           $user = User::find($request->id);
           $user->phone_code = $otp;
           $user->save();

           $phones =[$user->phone_number];
           $content ="Mã otp đổi mật khẩu của bạn là : ".$otp;
           $type = 2;
           $sender = "981c320db4992b97";
           $smsAPI = new SpeedSMSAPI("C774uYmPE8i08NoNNqdfMTSFbP3esizy");
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
    
}
