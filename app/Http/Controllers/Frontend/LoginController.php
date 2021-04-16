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

    public function logout(){
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('home');
    }
    
}