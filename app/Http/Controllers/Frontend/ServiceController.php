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
            $data = DB::table('services')->where('status', 0)->paginate(6);
        }else{
            $data = DB::table('services')->where('status', 0)->where('category_id', $id)->paginate(5);
        }
        $serviceAll = DB::table('services')->where('status', 0)->get();
        return view('frontend.service',compact('data','category','serviceAll'));
    }


    public function detailService($slug,$id ){
        $category = DB::table('categories')->where('status',0)->where('type',1)->get();
        $data = DB::table('services')->where('status',0)->find($id);
        $serviceAll = DB::table('services')->where('status', 0)->get();
        $view = $data->view + 1;
        // dd($view);
        DB::table('services')->where('id',$id)->update(['view' => $view]);
        return view('frontend.detailService',compact('data','category','serviceAll'));
    }

    public function search(Request $request){
        $category = DB::table('categories')->where('status',0)->where('type',1)->get();
        $data = DB::table('services')->where('status', 0)->where('name', 'like', '%' . $request->name . '%')->paginate(5);
        $serviceAll = DB::table('services')->where('status', 0)->get();
        return view('frontend.service',compact('data','category','serviceAll'));
    }

   
}
