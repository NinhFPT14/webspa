<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\ProductImage;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;

class ProductController extends Controller
{
    public function list(){
        $data = Product::where('status',0)->paginate(9);
        return view('backend.products.list',compact('data'));
    }
    public function add(){
        $category = Category::where('type',0)->get();
        return view('backend.products.add',compact('category'));
    }
    public function store(AddProductRequest $request){
        $data = $request->all();
        unset($data['_token'],$data['image']);
        $data['slug'] = 1;
        $data['status'] = 0;
        if($request->hasFile('avatar')){
            $extension = $request->avatar->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->avatar->storeAs(
              'product_image', $filename, 'public'
            );
            $data['avatar'] = "storage/".$path;  
           }
        $product = Product::create($data);
        Product::where('id',$product->id)->update(['slug'=> Str::slug($product->name.$product->id.'-')]);
        if($request->hasFile('image')){ 
            $data = [];
            foreach($request->image as $key =>$value){
            $extension = $value->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $value->storeAs( 
              'product_image', $filename, 'public'
            );
            ProductImage::create(['product_id'=> $product->id , 'image' => "storage/".$path ]);
            }
           }
        return redirect()->route('addProduct');
    }

    public function delete($id){
        $data = Product::find($id);
        File::delete($data->avatar);
        $image = ProductImage::where('product_id',$data->id)->get();
        foreach($image as $value){
            File::delete($value->image);
        }
        ProductImage::where('product_id',$data->id)->delete();
        $data->delete();
        return redirect()->route('listProduct');
    }

    public function edit($id){
        $category = Category::where('type',0)->get();
        $data = Product::find($id);
        return view('backend.products.edit',compact('data','category'));
    }

    public function update(EditProductRequest $request ,$id){
        $data = $request->all();
        unset($data['_token'],$data['image']);
        $product = Product::find($id);
        if($request->hasFile('avatar')){
            File::delete($product->avatar);
            $extension = $request->avatar->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->avatar->storeAs(
              'product_image', $filename, 'public'
            );
            $data['avatar'] = "storage/".$path;  
           }
           Product::where('id',$id)->update($data);
           Product::where('id',$product->id)->update(['slug'=> Str::slug($data['name'].$product->id.'-')]);
           if($request->hasFile('image')){
            $deleteImg =ProductImage::where('product_id',$product->id)->get();
            foreach($deleteImg as $item){
                File::delete($item->image);
            }
            ProductImage::where('product_id',$product->id)->delete();
            foreach($request->image as $key =>$value){
            $extension = $value->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $value->storeAs( 
              'product_image', $filename, 'public'
            );
            ProductImage::create(['product_id'=> $product->id , 'image' => "storage/".$path ]);
            }
           }
           return redirect()->route('editProduct',['id'=>$product->id]);
    }
}
