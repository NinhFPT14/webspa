<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Service;
use App\Model\Post;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use RealRashid\SweetAlert\Facades\Aler;


class CategoryController extends Controller
{
    public function add(){
        return view('backend.categories.add');
    }

    public function store(AddCategoryRequest $request){
        $data = $request->all();
        unset($data['_token']);
        $data['status'] = 0;
        $category = Category::create($data);
        alert()->success('Thành công', "Tạo thành công danh mục $request->name"); 
        return redirect()->route('listCategory',['type'=>$request->type]);
    }
    

    public function list($type){
        $data = Category::where('type',$type)->where('status','<',2)->orderByDesc('id')->paginate(10);
        return view('backend.categories.list',compact('data','type'));
    }

    public function status($id ,$status){
        $flight = Category::find($id);
        $flight->status = $status;
        $flight->save();
        alert()->success('Tạo thành công danh mục'); 
        return redirect()->route('listCategory',['type'=>$flight->type]);
    }

    public function delete($id){
        
        $flight = Category::find($id);
        $flight->status = 2;
        $flight->save();
        if( $flight->type == 0){
            $product = Product::where('category_id',$flight->id)->get();
            foreach($product as $value){
                $product = Product::find($value->id);
                $product->status = 2;
                $product->save();
            }
        }elseif($flight->type == 1){
            $service = Service::where('category_id',$flight->id)->get();
            foreach($service as $value){
                $service = Service::find($value->id);
                $service->status = 2;
                $service->save();
            }
        }else{
            $post = Post::where('category_id',$flight->id)->get();
            foreach($post as $value){
                $post = Post    ::find($value->id);
                $post->status = 2;
                $post->save();
            }

        }
       
        alert()->error('Xóa thành công');
        return redirect()->route('listCategory',['type'=>$flight->type]);
    }

    public function edit($id){
        $data = Category::find($id);
        return view('backend.categories.edit',compact('data'));
    }

    public function update(EditCategoryRequest $request ,$id){
        $data = $request->all();
        unset($data['_token']);
        $flight = Category::where('id',$id)->update($data);
        alert()->success('Sửa thành công', "Sửa thành công danh mục $request->name"); 
        return redirect()->route('listCategory',['type'=>$data['type']]);
    }
    public function search(Request $request ,$type){
      $data = Category::where('type',$type)->where('status','<',2)->where('name', 'like', '%' . $request->name . '%')->orderByDesc('id')->paginate(10);
      return view('backend.categories.list',compact('data','type'));
    }
}