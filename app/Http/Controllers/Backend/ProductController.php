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
        $data = Product::paginate(9);
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
            alert()->success('Tạo thành công sản phẩm'); 
            }
           }
           alert()->success('Tạo thành công sản phẩm');
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
        alert()->error('Đã xóa sản phẩm'); 
        return redirect()->route('listProduct');
    }

    public function status($id,$status){
        Product::where('id',$id)->update(['status'=>$status]);
        if($status == 0){
            alert()->success('Đã bật sản phẩm');
        }else{
            alert()->error('Đã tắt sản phẩm'); 
        }
        return redirect()->route('listProduct');
    }

    public function edit($id){
        $category = Category::where('type',0)->get();
        $data = Product::find($id);
        // dd($data);
        return view('backend.products.edit',compact('data','category'));
    }

    public function update(EditProductRequest $request ,$id){
        $data = $request->all();
        // dd($data);
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
           alert()->success('Sửa thành công sản phẩm');
           return redirect()->route('editProduct',['id'=>$product->id]);
    }

    public function search(Request $request){
        $data = Product::where('name', 'like', '%' . $request->name . '%')->paginate(9);
        return view('backend.products.list',compact('data'));
    }
}
