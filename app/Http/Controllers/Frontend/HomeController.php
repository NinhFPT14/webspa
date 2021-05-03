<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slide;
use App\Model\Footer;
use DB;
use Session;
use Carbon;
class HomeController extends Controller
{
    public function home(){
        
        $service = DB::table('services')->where('status',0)->get('name');
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
