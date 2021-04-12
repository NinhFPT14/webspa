<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\addStaffRequest;
use App\Http\Requests\editStaffRequest;
use App\Model\Staff;
class StaffController extends Controller
{
    public function add(){
        return view('backend.staffs.add');   
    }
    public function save(addStaffRequest $request){
        $data = $request->all();
        unset($data['_token']);
        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->image->storeAs(
              'image_slide', $filename, 'public'
            );
            $data['image'] = "storage/".$path;  
           }
           Staff::create($data);
        alert()->success('Thêm thành công'); 
        return view('backend.staffs.add');    
    }

    public function list(){
        $data = Staff::paginate(10);
        return view('backend.staffs.list',compact('data'));   
    }

    public function status($id ,$status){
        Staff::where('id',$id)->update(['status'=>$status]);
        $data = Staff::paginate(10);
        alert()->success('Sửa trạng thái thành công'); 
        return view('backend.staffs.list',compact('data'));   
    }

    public function delete($id){
        Staff::destroy($id);
        $data = Staff::paginate(10);
        alert()->error('Xóa thành công'); 
        return view('backend.staffs.list',compact('data'));   
    }

    public function edit($id){
        $data = Staff::find($id);
        return view('backend.staffs.edit',compact('data'));   
    }

    public function update(editStaffRequest $request, $id){
        $data = $request->all();
        unset($data['_token']);
        if($request->hasFile('image')){
        File::delete($flight->image);
            $extension = $request->image->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->image->storeAs(
                'image_slide', $filename, 'public'
            );
            $data['image'] = "storage/".$path;  
            } 
        Staff::where('id',$id)->update($data);
        $data = Staff::paginate(10);
        alert()->success('Sửa thành công'); 
        return view('backend.staffs.list',compact('data'));   
    }
}