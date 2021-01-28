<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    public function add(){
        return view('backend.categories.add');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'type.required' => 'loại danh mục không được để trống',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
        ]);
        $data = $request->all();
        unset($data['_token']);
        $data['status'] =0;
        $category = Category::create($data);
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

    public function update(Request $request ,$id){
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'type.required' => 'loại danh mục không được để trống',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
        ]);
        $data = $request->all();
        unset($data['_token']);
        $flight = Category::where('id',$id)->update($data);
        return redirect()->route('listCategory',['type'=>$data['type']]);
    }
}