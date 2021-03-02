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
        // dd($request->all());
        $data = $request->all();
        unset($data['_token'],$data['image']);
        $data['slug'] = Str::slug($request->name.rand(10000,100000),'-');
        $data['status'] = 0;
        if($request->hasFile('avatar')){
            $extension = $request->avatar->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->avatar->storeAs(
              'avatar', $filename, 'public'
            );
            $data['avatar'] = "storage/".$path;  
           }
        $product = Product::create($data);
        if($request->hasFile('image')){
            $data = [];
            foreach($request->image as $key =>$value){
            $extension = $value->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $value->storeAs( 
              'image', $filename, 'public'
            );
            ProductImage::create(['product_id'=> $product->id , 'image' => "storage/".$path ]);
            }
           }
        return redirect()->route('addProduct');
    }

    public function delete($id){
        $data = Product::find($id);
        Storage::delete($data->avatar);
        $image = ProductImage::where('product_id',$data->id)->get();
        foreach($image as $value){
            Storage::delete($$value->image);
        }
        $data->ProductImage->delete();
        Product::delete($id);
        return redirect()->route('listProduct');
    }
}
