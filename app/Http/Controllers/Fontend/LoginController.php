<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('fontend.login');
    }
    public function register(){
        return view('fontend.register');
    }
    public function myAccount(){
        return view('fontend.myAccount');
    }
}
