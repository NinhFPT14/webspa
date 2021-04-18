<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function cart(){
        return view('frontend.cart');
    }

    public function add($id){
        $cart = Session::get('productId');
        $cart[] = $id;
        Session::put('productId',$cart);
        return back();
    }

    public function addMuch(Request $request ,$id){
        $cart = Session::get('productId');
        for ($x = 0; $x <= $request->number ; $x++) {
            $cart[] = $id;
        }
        Session::put('productId',$cart);
        return redirect()->route('cart');
    }

    public function dalete($id){
        $cart = Session::get('productId');
        if($cart != null){
            foreach($cart as $key => $value){
              if($cart[$key] == $id){
                  unset($cart[$key]);
              }
            }
            Session::put('productId',$cart);
        }
        return back();
    }

    public function update(Request $request , $id){
        $cart = Session::get('productId');
        if($cart != null){
            foreach($cart as $key => $value){
              if($cart[$key] == $id){
                  unset($cart[$key]);
              }
            }
            for ($i = 1; $i <= $request->number; $i++) {
              $cart[] = $id;
            }
            Session::put('productId',$cart);
        }
        return back();
    }
    
}
?>