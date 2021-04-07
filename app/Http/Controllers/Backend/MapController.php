<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Map;
use App\Http\Requests\addMapRequest;
use App\Http\Requests\editMapRequest;
class MapController extends Controller
{
    public function add(){
        return view('backend.maps.add');
    }

    public function store(addMapRequest $request){
       $map = Map::get();
       if(count($map) == 0){
        $flight = new Map;
        $flight->link =$request->link; 
        $flight->save();
        alert()->success('Tạo thành công bản đồ'); 
        return redirect()->route('listMap');
       }else{
        alert()->error('Đã có bản đồ không thể tạo mới');
        return redirect()->route('listMap');
       }
    }

    public function list (){
        $data = Map::get();
        return view('backend.maps.list',compact('data'));
     }

     public function delete($id){
        Map::where('id', $id)->delete();
        alert()->error('Xóa thành công');
        return redirect()->route('listMap');
    }

    public function edit($id){
        $data = Map::find($id);
        return view('backend.maps.edit',compact('data'));
    }
    public function update(editMapRequest $request ,$id){
        $flight = Map::find($id);
        $flight->link = $request->link;  
        $flight->save();
        alert()->success('Sửa thành công');
        return redirect()->route('listMap');
      }  

}