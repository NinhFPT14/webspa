<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\VoucherProduct;
use App\Http\Requests\AddVoucherProduct;
use App\Http\Requests\EditVoucherProduct;
class ProductVoucherController extends Controller
{
    public function add(){
        $products = Product::where('status',0)->get();
        return view('backend.voucher_product.add',compact('products'));
    }
    public function store(AddVoucherProduct $request){
        $data = $request->all();
        unset($data['_token']);
        VoucherProduct::create($data);
        alert()->success('Tạo thành công vouchers'); 
      return redirect()->route('listVoucherProduct');
    }

    public function list (){
        $data = VoucherProduct::get();
        return view('backend.voucher_product.list',compact('data'));
     }

     public function status ($id,$status){
        $data = VoucherProduct::where('id',$id)->update(['status'=>$status]);
        return redirect()->route('listVoucherProduct');
     }
     public function delete($id){
        $data = VoucherProduct::find($id);
        $data->delete();
        alert()->error('Xóa thành công'); 
        return redirect()->route('listVoucherProduct');
        }
    
    public function edit($id){
        $products = Product::where('status',0)->get();
        $data = VoucherProduct::find($id);
        return view('backend.voucher_product.edit',compact('data','products'));
    }
    
    public function update(EditVoucherProduct $request ,$id){
        $data = $request->all();
        unset($data['_token']);
        VoucherProduct::where('id',$id)->update($data);
        alert()->success('Sửa thành công voucher'); 
        return redirect()->route('listVoucherProduct');
    }  

}
