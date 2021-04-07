<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
{
    public function service(){
        $service = DB::table('services')->where('status',0)->paginate(4);
        $listByCate = DB::table('services')
        ->join('categories','categories.id','=','services.category_id')
        ->select('services.*','categories.id')
        ->get();
        // dd($listByCate);
        return view('frontend.service',['service' => $service]);

    }


    public function detailService( $slug,$id ){
        $service = DB::table('services')->where('status',0)->find($id);
        // dd($service);
        return view('frontend.detailService',['service' => $service]);
    }
}
