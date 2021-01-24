<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('fontend.home');
    }

    public function contact(){
        return view('fontend.contact');
    }

    public function about(){
        return view('fontend.about');
    }
}
