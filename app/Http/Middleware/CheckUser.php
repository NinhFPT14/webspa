<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\Http\Sms\SpeedSMSAPI;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->status == 0 && Auth::user()->role <= 1) {
                $otp = rand(0001,9999);
                User::where('id',Auth::user()->id)->update(['phone_code'=>$otp]);
                $phones = ["0".Auth::user()->phone_number];
                $content = $otp;
                $type = 2;
                $sender = "981c320db4992b97";
                $smsAPI = new SpeedSMSAPI("C774uYmPE8i08NoNNqdfMTSFbP3esizy");
                $response = $smsAPI->sendSMS($phones, $content, $type, $sender);
                return redirect()->route('otpUser',['token'=>Auth::user()->remember_token ,'id'=>Auth::user()->id]);
            }
        }
        return $next($request);
    }

}

