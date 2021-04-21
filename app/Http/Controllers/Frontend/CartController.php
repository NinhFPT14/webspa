<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Http\Response;
use App\Model\Product;

class CartController extends Controller
{
    public function cart(){
        return view('frontend.cart');
    }

    public function add($id){
        $cart=\Cookie::has('cartId');
        if($cart){
            $cart=\Cookie::get('cartId');
            $cart =json_decode($cart);
            dd($cart);
            $kien_tra = false;
            foreach($cart as $key => $value){
                if($cart[$key] == $id){
                    $cart[] = $id;
                    $kien_tra = true;
                }
              }
              if($kien_tra == false){
                $cart[]= $id;
              }
        }else{
            $cart = [];
            $cart[]= $id;
        }
        $array_json=json_encode($cart);
        return back()->withCookie(cookie()->forever('cartId',$array_json));
    }

    public function addMuch(Request $request ,$id){
        $cart=\Cookie::get('cartId');
        if($cart != null && $cart != "[]"){
            $cart=\Cookie::get('cartId');
            $cart =json_decode($cart);
            for ($x = 1; $x <= $request->number ; $x++) {
                $cart[] = $id;
            }
        }else{
            $cart =[];
            for ($x = 1; $x <= $request->number ; $x++) {
                $cart[] = $id;
            }  
        }
        $array_json=json_encode($cart);
        return redirect()->route('cart')->withCookie(cookie()->forever('cartId',$array_json));
    }

    public function delete(Request $request){
        try {
            $cart=\Cookie::get('cartId');
            $arrId =[];
            if($cart != null && $cart != "[]"){
                $cart=\Cookie::get('cartId');
                $cart =json_decode($cart);
                foreach($cart as $key => $value){
                    if($cart[$key] != $request->id){
                        $arrId[] = $value;
                    }
                  }
            }
            $array_json=json_encode($arrId);
            return response()->json(['status' => true, 'data' => 'thành công' ])->withCookie(cookie()->forever('cartId',$array_json));
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
    }

    public function update(Request $request){
        try {
            $cart=\Cookie::get('cartId');
            $arrId =[];
            if($cart != null && $cart != "[]"){
                $cart=\Cookie::get('cartId');
                $cart =json_decode($cart);
                foreach($cart as $key => $value){
                    if($cart[$key] != $request->id){
                        $arrId[] = $value;
                    }
                  }
                  for ($i = 1; $i <= $request->number; $i++) {
                    $arrId[] = $request->id;
                  }
            }else{
                for ($i = 1; $i <= $request->number; $i++) {
                    $arrId[] = $request->id;
                  }
                }
            $array_json=json_encode($arrId);
            $discount = Product::find($request->id);
            return response()->json(['status' => true, 'data' => $discount->discount ])->withCookie(cookie()->forever('cartId',$array_json));
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
    }
}
?>