<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Product;
use App\Model\Oder;
use App\Model\ProductOder;
use Cookie;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function product($id){
        if($id === "all"){
            $data = DB::table('products')->where('status', 0)->orderByDesc('id')->paginate(9);
        }else{
            $data = DB::table('products')->where('status', 0)->where('category_id', $id)->orderByDesc('id')->paginate(9);
        }
        return view('frontend.product',compact('data'));
    }
    
    public function oderProduct(){
        return view('frontend.oderProduct');
    }

    public function oderList(){
        return view('frontend.listOder');
    }

    public function oderDelete(Request $request){
        try {
            Oder::where('id',$request->id)->update(['status'=>5]);
            $productOder = ProductOder::where('oder_id',$request->id)->get();
            foreach($productOder as $value){
                $pr = Product::find($value->product_id);
                $pr->quality = ($pr->quality) +$value->quality;
                $pr->save(); 
            }
            return response()->json(['status' => true, 'data' => $request->id]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
    }

    public function orderDetail(Request $request){
        try {
            $informationOrder =Oder::find($request->id);
            $product =ProductOder::where('oder_id',$request->id)->get();
            return response()->json(['status' => true, 'data' => $informationOrder , 'product'=> $product]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
    }

    public function oderProductAdd(Request $request){
        try {
            $cart=\Cookie::get('cartId');
            $arrId =[];
            $cart =json_decode($cart);
            foreach($cart as $value){
                foreach($request->id as $item){
                    if($value == $item){
                        $arrId[] = $item;
                    }            
                }
            }

            $array_json=json_encode($arrId);
            return response()->json(['status' => true, 'data' => 'thành công' ])->withCookie(cookie()->forever('oderProductId',$array_json));
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
    }

    public function oderSave(Request $request){
        $validate = Validator::make($request->all(), 
        [
            'name' => 'required|max:255',
            'phone' => 'required|regex:/^[0][0-9]{9}$/',
            'address' => 'required|max:255',
            'note' => 'max:65535',
        ],
        ['name.required' => 'Họ tên không được để trống',
        'name.max' => "Họ tên không được vượt quán 255 ký tự",
        'phone.required' => "Số điện thoại không được để trống",
        'phone.regex' => "Sô điện thoại không hợp lệ",
        'note.max' => "Lời nhắn không được vượt quá 65535 ký tự",
        'address.required' => "Địa chỉ không được để trống",
        'address.max' => "Địa chỉ không được vượt quá 255 ký tự",
        ]);

        if($validate->fails()){
            return json_encode([
                'status' => false,
                'messages' => $validate->errors()
            ]);
        }
        try {
            $oder = new Oder();
            $oder->name = $request->name;
            $oder->phone_number = $request->phone;
            $oder->address = $request->address;
            $oder->note = $request->note;
            $oder->total_monney = ($request->total_monney) + ($request->total_monney *10)/100;
            $oder->tax = ($request->total_monney *10)/100;
            $oder->status = 0;
            $oder->save();

            $product=\Cookie::get('oderProductId');
            $arrId =json_decode($product);
            $cart=\Cookie::get('cartId');
            $cart =json_decode($cart);
            $arrayCartId =[];
            $a =[];
            foreach(array_count_values($arrId) as $key =>$value){
                $pr = Product::find($key);
                $pr->quality = ($pr->quality) -$value;
                $pr->save();
                $ProductOder = new ProductOder();
                $ProductOder->product_id = $key;
                $ProductOder->oder_id = $oder->id;
                $ProductOder->quality = $value;
                $ProductOder->name = $pr->name;
                $ProductOder->price = $pr->discount;
                $ProductOder->save();
                $a[] = $key;
            }
            foreach($cart as $key=>$order) {
                for ($x =0; $x < count($a);$x++) {
                    if($a[$x] == $order){
                        unset($cart[$key]);
                    }
                    }
            }

            foreach($cart as $value){
                $arrayCartId[] = $value;
            }
            $oderId=\Cookie::get('oderId');
            if($oderId != null && $oderId != "[]"){
                $oderId =json_decode($oderId);
                $oderId[] = $oder->id;
            }else{
                $oderId = [];
                $oderId[]= $oder->id;
            }
            $array_json=json_encode($oderId);
            $array_cart=json_encode($arrayCartId);
            return response()->json(['status' => true, 'data' => 'thành công' ])->withCookie(cookie()->forever('oderId',$array_json))->withCookie(cookie()->forever('cartId',$array_cart));
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
    }
    public function detailProduct($slug,$id){
        $data = DB::table('products')->orderBy('view')->where('status','==',0)->orderByDesc('id')->find($id);
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
        $data = Product::where('status', 0)->where('name', 'like', '%' . $request->name . '%')->orderByDesc('id')->paginate(9);
        return view('frontend.product',compact('data'));
    }
}
