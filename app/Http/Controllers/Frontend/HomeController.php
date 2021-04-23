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
        $serviceLike = DB::table('services')->where('status',0)->orderBy('view')->get();
        $blog = DB::table('posts')->where('status',0)->orderBy('view')->get();
        $favorite_product = DB::table('products')->where('status',0)->orderBy('view','desc')->take(10)->get();
        return view('frontend.home',compact('slide','serviceLike','blog','favorite_product','service'));
    }

    public function about(){
        return view('frontend.about');
    }


}
