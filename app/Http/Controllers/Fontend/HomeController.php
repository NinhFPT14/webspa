<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slide;
class HomeController extends Controller
{
    public function home(){
        $slide = Slide::where('status', 0)->get();
        return view('fontend.home',compact('slide'));
    }

    public function contact(){
        return view('fontend.contact');
    }

    public function about(){
        return view('fontend.about');
    }
}
