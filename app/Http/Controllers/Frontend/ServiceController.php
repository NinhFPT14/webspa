<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
{
    public function service($id){
        $category = DB::table('categories')->where('status',0)->where('type',1)->get();
        if($id === "all"){
            $data = DB::table('services')->where('status', 0)->paginate(4);
        }else{
            $data = DB::table('services')->where('status', 0)->where('category_id', $id)->paginate(4);
        }
        return view('frontend.service',compact('data','category'));

    }


    public function detailService( $slug,$id ){
        $service = DB::table('services')->where('status',0)->find($id);
        // dd($service);
        return view('frontend.detailService',['service' => $service]);
    }
}
