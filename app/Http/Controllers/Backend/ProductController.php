<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{
    public function add(){
        return view('backend.products.add');
    }
    public function store(Request $request){
        $request->validate([
         'name' =>'required|max:255|unique:products',
         'description' =>'required|max:255',
         'detail' =>'required|max:65535',
         'price' =>'required|digits_between:4,11',
         'discount' =>'required|digits_between:4,11',
         'quality' =>'required|digits_between:4,11',
         'image' =>'required',
        ],[
            'name.required' =>'Không được để trống sản phẩm',
            'name.unique' =>'Tên sản phẩm đã được sử dụng',
            'name.max' =>'Tên sản phẩm không được vượt quá 255 ký tự',
            'description.required' =>'Mô tả không được để trống',
            'description.max' =>'Mô tả không được vượt quá 255 ký tự',
            'detail.required' =>'Chi tiết không được để trống',
            'detail.max' =>'Chi tiết sản phẩm không được vượt quá ký 65535',
            'price.required' =>'Giá cũ không được để trống',
            'discount.required' =>'Giá giảm không được để trống',
            'quality.required' =>'Số lượng không được để trống',
            'price.digits_between' =>'Giá cũ phải là số và phải từ 4 đến 11 số',
            'discount.digits_between' =>'Giá giảm phải là số và phải từ 4 đến 11 số',
            'quality.digits_between' =>'Số lượng phải là số và phải từ 4 đến 11 số',
            'image.required' =>'Ảnh không được để trống',
        ]);
        $data = $request->all();
        unset($data['image'],$data['_token']);
        $product = new Product;
        $product->save();

    }
}
