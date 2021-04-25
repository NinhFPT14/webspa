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
use App\Model\Oder;
use App\Model\ProductOder;
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
    public function listOrder(){
        $data = Oder::where('status','!=',5)->orderBy('id', 'DESC')->paginate(10);
        return view('backend.products.orderProduct',compact('data'));
    }

    public function editOrder($id){
        $data = Oder::find($id);
        $productOder = ProductOder::where('oder_id',$data->id)->get();
        $product = Product::where('status', 0)->get();
        return view('backend.products.editOrderProduct',compact('data','productOder','product'));
    }
    public function updateOrder(Request $request ,$id){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'required|regex:/^[0][0-9]{9}$/',
            'address' => 'required|max:255',
            'note' => 'max:65535',
        ],
        ['name.required' => 'Họ tên không được để trống',
        'name.max' => "Họ tên không được vượt quán 255 ký tự",
        'phone_number.required' => "Số điện thoại không được để trống",
        'phone_number.regex' => "Sô điện thoại không hợp lệ",
        'note.max' => "Lời nhắn không được vượt quá 65535 ký tự",
        'address.required' => "Địa chỉ không được để trống",
        'address.max' => "Địa chỉ không được vượt quá 255 ký tự",
        ]);
        $data = Oder::find($id);
        $data->name =$request->name;
        $data->phone_number =$request->phone_number;
        $data->address =$request->address;
        $data->note =$request->note;
        $data->status =$request->status;
        $data->save();
        alert()->success('Sửa thành công đơn đặt hàng'); 
        return redirect()->route('product.order.admin');
    }
    public function addProductOrder(Request $request ,$id){
        $data = Oder::find($id);
        $productOder = ProductOder::where('oder_id',$data->id)->get();
        $product = Product::find($request->product_id);
        $check = 0;
        foreach($productOder as $value){
            if($value->product_id == $request->product_id){
                $check = 1;
                $update = ProductOder::find($value->id);
                $update->quality = $update->quality + $request->number;
                $update->save();

                $price = $product->discount *  $update->quality;
                $total = $data->total_monney + $price + ($price*10/100);
                $data->total_monney = $total;
                $data->tax = $data->tax -($price*10/100);
                $data->save();
            }
        };
        if($check == 0){
           $add = new ProductOder();
           $add->product_id = $request->product_id;
           $add->oder_id    = $id;
           $add->quality =  $request->number;
           $add->name = $product->name;
           $add->price = $product->discount;
           $add->save();
           
           $price = $product->discount * $request->number;
           $total = $data->total_monney + $price + ($price*10/100);
           $data->total_monney = $total;
           $data->tax = $data->tax + ($price*10/100);
           $data->save();
        }
        return redirect()->route('product.order.edit',['id'=>$id]);
    }
    public function deleteProductOrder($id ,$productOder){
        $data = Oder::find($id);
        $flight = ProductOder::find($productOder);

        $price = $flight->price *  $flight->quality; 
        $total = $data->total_monney - $price - ($price*10/100);
        $data->total_monney = $total;
        $data->tax = $data->tax - ($price*10/100);
        $data->save();

        $flight->delete();

        return redirect()->route('product.order.edit',['id'=>$id]);
    }

    
    public function searchOrder(Request $request){
        $data = Oder::where('status','!=',5)
        ->where('name', 'like', '%' . $request->key . '%')
        ->orWhere('status',$request->status)
        ->paginate(10);
        return view('backend.products.orderProduct',compact('data'));
    }

    public function editStatus(Request $request){
        try {
            Oder::where('id',$request->id)->update(['status'=>$request->status]);
            return response()->json(['status' => true, 'data' => $request->id]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'fail' => 'Thất bại' ]);
        }
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
