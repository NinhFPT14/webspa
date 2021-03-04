<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product(){
        $data = DB::table('products')->where('status', 0)->get();
        return view('frontend.product',compact('data'));
    }
    public function detailProduct($slug,$id){
        // dd($id);
        $data = DB::table('products')->find($id);
        return view('frontend.detailProduct',compact('data'));
    }
}
