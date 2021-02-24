<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\ProductImage;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function list(){
        $data = Product::where('status',0)->get();
        return view('backend.products.list',compact('data'));
    }
    public function add(){
        $category = Category::where('type',0)->get();
        return view('backend.products.add',compact('category'));
    }
    public function store(AddProductRequest $request){
        $data = $request->all();
        unset($data['_token'],$data['image']);
        $data['slug'] = Str::slug($request->name.rand(1000,10000),'-');
        $data['status'] = 0;
        $product = Product::create($data);
        if($request->hasFile('image')){
            $data = [];
            foreach($request->image as $key =>$value){
            $extension = $value->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $value->storeAs( 
              'image', $filename, 'public'
            );
            ProductImage::create(['product_id'=> $product , 'image' => "storage/".$path ]);
            }
           }
        return redirect()->route('addProduct');
    }
}
