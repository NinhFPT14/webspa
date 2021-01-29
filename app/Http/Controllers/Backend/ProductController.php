<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function add(){
        $category = Category::where('type',0)->get();
        return view('backend.products.add',compact('category'));
    }
    public function store(AddProductRequest $request){
        $product = new Product;
        $data = $request->all();
        unset($data['_token'],$data['image']);
        $data['slug'] = Str::slug($request->name,'-');
        $data['status'] = 0;
        // dd($data);
        $product->save();
        dd($product);
        return redirect()->route('addProduct');
    }
}
