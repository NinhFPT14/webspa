<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slide;
use App\Model\Footer;
class HomeController extends Controller
{
    public function home(){
        $slide = Slide::where('status', 0)->get();
        return view('frontend.home',compact('slide'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function about(){
        return view('frontend.about');
    }


}
