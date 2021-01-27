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
        $data = $request->all();
        unset($data['_token']);
        $data['status'] =0;
        $category = Category::create($data);
        return redirect()->route('addCategory');
    }

    public function list(){
        $data = Category::get();
        return view('backend.categories.list',compact('data'));
    }
}
