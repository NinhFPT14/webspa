<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product($id){
        if($id === "all"){
            $data = DB::table('products')->where('status', 0)->paginate(9);
        }else{
            $data = DB::table('products')->where('status', 0)->where('category_id', $id)->paginate(9);
        }
        return view('frontend.product',compact('data'));
    }
    public function detailProduct($slug,$id){
        $data = DB::table('products')->where('status','==',0)->find($id);
        if($data == null){
            return redirect()->route('home');
        }
        else{
            return view('frontend.detailProduct',compact('data'));
        }
    }
}
