<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Product;
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
        $data = DB::table('products')->orderBy('view')->where('status','==',0)->find($id);
        $view = $data->view + 1;
        // dd($view);
        DB::table('products')->where('id',$id)->update(['view' => $view]);
        if($data == null){
            return redirect()->route('home');
        }
        else{
            return view('frontend.detailProduct',compact('data'));
        }
    }

    public function search(Request $request){
        $data = Product::where('status', 0)->where('name', 'like', '%' . $request->name . '%')->paginate(9);
        return view('frontend.product',compact('data'));
    }
}
