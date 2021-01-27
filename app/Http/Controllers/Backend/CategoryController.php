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
}
