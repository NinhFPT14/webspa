<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use Nexmo\Laravel\Facade\Nexmo;
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
                // Nexmo::message()->send([
                //     'to'   => '0334589123',
                //     'from' => 'QuyenSpa',
                //     'text' => 'Mã otp kích hoạt của bạn là '. $otp,
                // ]);
                return redirect()->route('otpUser',['token'=>Auth::user()->remember_token ,'id'=>Auth::user()->id]);
            }
        }
        return $next($request);
    }
}
