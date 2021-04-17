<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slide;
use App\Model\Footer;
use DB;
use Session;
class HomeController extends Controller
{
    public function home(){
        // dd(bcrypt('123456789'));
        $service = DB::table('services')->where('status',0)->get('name');
        // dd($service);
        $slide = Slide::where('status', 0)->get();
        return view('frontend.home',compact('slide'),['service' => $service]);
    }

    public function about(){
        return view('frontend.about');
    }


}
