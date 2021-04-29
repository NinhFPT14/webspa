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
            $data = DB::table('services')->where('status', 0)->orderByDesc('id')->paginate(6);
        }else{
            $data = DB::table('services')->where('status', 0)->where('category_id', $id)->orderByDesc('id')->paginate(5);
        }
        $serviceAll = DB::table('services')->where('status', 0)->orderByDesc('id')->get();
        return view('frontend.service',compact('data','category','serviceAll'));
    }


    public function detailService($slug,$id ){
        $category = DB::table('categories')->where('status',0)->where('type',1)->get();
        $data = DB::table('services')->where('status',0)->find($id);
        $view = $data->view + 1;
        $serviceAll = DB::table('services')->where('status', 0)->orderByDesc('id')->get();
        DB::table('services')->where('id',$id)->update(['view' => $view]);
        return view('frontend.detailService',compact('data','category','serviceAll'));
    }

    public function search(Request $request){
        $category = DB::table('categories')->where('status',0)->where('type',1)->get();
        $data = DB::table('services')->where('status', 0)->where('name', 'like', '%' . $request->name . '%')->orderByDesc('id')->paginate(5);
        $serviceAll = DB::table('services')->where('status', 0)->orderByDesc('id')->get();
        return view('frontend.service',compact('data','category','serviceAll'));
    }

   
}
