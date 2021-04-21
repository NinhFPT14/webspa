<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Product;
use App\Model\Oder;
use App\Model\ProductOder;
use Illuminate\Support\Facades\Validator;
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
    
    public function oderProduct(){
        return view('frontend.oderProduct');
    }

    public function oderList(){
        return view('frontend.listOder');
    }

    public function oderDelete(Request $request){
        try {
            $oder=\Cookie::get('oderId');
            $arrId =[];
            $oder =json_decode($oder);
            foreach($oder as $value){
                    if($value != $request->id){
                        $arrId[] = $value;
                }
            }
            $array_json=json_encode($arrId);
            return response()->json(['status' => true, 'data' => $request->id])->withCookie(cookie()->forever('oderId',$array_json));
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
            'phone' => 'required|numeric|digits_between:10,11',
            'address' => 'required|max:255',
            'note' => 'max:65535',
        ],
        ['name.required' => 'Họ tên không được để trống',
        'name.max' => "Họ tên không được vượt quán 255 ký tự",
        'phone.required' => "Số điện thoại không được để trống",
        'phone.numeric' => "Sô điện thoại phải là số",
        'phone.digits_between' => "Sô điện thoại không hợp lệ",
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
            $oder->total_monney = $request->total_monney;
            $oder->status = 0;
            $oder->save();

            $product=\Cookie::get('oderProductId');
            // dd($product);
            $arrId =json_decode($product);
            foreach(array_count_values($arrId) as $key =>$value){
                $ProductOder = new ProductOder();
                $ProductOder->product_id = $key;
                $ProductOder->oder_id = $oder->id;
                $ProductOder->quality = $value;
                $ProductOder->save();
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
            return response()->json(['status' => true, 'data' => 'thành công' ])->withCookie(cookie()->forever('oderId',$array_json));
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
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
