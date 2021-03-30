<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\AddAccountUser;
use App\User;
use Auth;
class LoginController extends Controller
{
    public function login(){
        return view('frontend.login');
    }
    public function register(){
        return view('frontend.register');
    }
    public function myAccount(){
        return view('frontend.myAccount');
    }
    public function save(AddAccountUser $request){
        // dd($request->all());
        $user = new User;
        $user->phone_number = $request->phone;
        $user->password = bcrypt($request->password);
        $user->remember_token = $request->_token;
        $user->status = '0';
        $user->role = '0';
        $user->save();
        if (Auth::attempt(['phone_number' => $request->phone, 'password' => $request->password])) {
            return redirect()->route('home');
        }
    }

    public function getLogin(Request $request){
        if (Auth::attempt(['phone_number' => $request->phone, 'password' => $request->password]) && Auth::user()->role == 0) {
            return redirect()->route('home');
        }
        else if(Auth::attempt(['phone_number' => $request->phone, 'password' => $request->password]) && Auth::user()->role == 1){
            return redirect()->route('dashboard');
        }else{
            alert()->error('Đăng nhập thất bại','Tài khoản hoặc mật khẩu không đúng');
            return back();
        }
    }

    public function otp($token ,$id){
        return view('frontend.otpUser');
    }

    public function saveOtp(Request $request){
        $user = User::find(Auth::user()->id);
        if($user->phone_code == $request->phone_code){
            User::where('id',Auth::user()->id)->update(['status'=>1]);
            return redirect()->route('home');
        }else{
            alert()->error('Mã otp không đúng');
            return back();
        }

    }
    public function logout(){
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('home');
    }
    
}