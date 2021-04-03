<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
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
        $data['status'] =0;
        $category = Category::create($data);
        alert()->success('Thành công', "Tạo thành công danh mục $request->name"); 
        return redirect()->route('addCategory');
    }

    public function list($type){
        $data = Category::where('type',$type)->get();
        return view('backend.categories.list',compact('data','type'));
    }

    public function status($id ,$status){
        $flight = Category::find($id);
        $flight->status = $status;
        $flight->save();
        return redirect()->route('listCategory',['type'=>$flight->type]);
    }

    public function delete($id){
        $flight = Category::find($id);
        $flight->delete();
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
}