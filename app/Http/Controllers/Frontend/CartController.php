<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Http\Response;

class CartController extends Controller
{
    public function cart(){
        return view('frontend.cart');
    }

    public function add($id){
        $cart=\Cookie::get('cartId');
        if($cart != null && $cart != "[]"){
            $cart =json_decode($cart);
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

    public function delete($id){
        $cart=\Cookie::has('cartId');
        $arrId =[];
        if($cart){
            $cart=\Cookie::get('cartId');
            $cart =json_decode($cart);
            foreach($cart as $key => $value){
                if($cart[$key] != $id){
                    $arrId[] = $value;
                }
              }
        }
        $array_json=json_encode($arrId);
        return back()->withCookie(cookie()->forever('cartId',$array_json));
    }

    public function update(Request $request , $id){
        $cart=\Cookie::has('cartId');
        $arrId =[];
        if($cart){
            $cart=\Cookie::get('cartId');
            $cart =json_decode($cart);
            foreach($cart as $key => $value){
                if($cart[$key] != $id){
                    $arrId[] = $value;
                }
              }
              for ($i = 1; $i <= $request->number; $i++) {
                $arrId[] = $id;
              }
        }
        $array_json=json_encode($arrId);
        return back()->withCookie(cookie()->forever('cartId',$array_json));
    }
    
}
?>