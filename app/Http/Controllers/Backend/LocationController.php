<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\addLocationRequest;
use App\Http\Requests\editLocationRequest;
use App\Model\Location;
use App\Model\Staff;
class LocationController extends Controller
{
    public function add(){
        $staff = Staff::where('status',0)->get();
        return view('backend.locations.add' ,compact('staff'));   
    }

    public function save(addLocationRequest $request){
        $data = $request->all();
        unset($data['_token']);
        Location::create($data);
        alert()->success('Thêm thành công'); 
        return redirect()->route('listLocation');   
    }

    public function list(){
        $data = Location::where('status','!=',2)->paginate(10);
        return view('backend.locations.list' ,compact('data'));   
    }

    public function status($id ,$status){
        Location::where('id',$id)->update(['status'=>$status]);
        alert()->success('Sửa trạng thái thành công'); 
        return redirect()->route('listLocation');   
    }

    public function delete($id){
        $location = Location::find($id);
        $location->status = 2;
        $location->save();
        alert()->error('Xóa thành công'); 
        return redirect()->route('listLocation'); 
    }

    public function edit($id){
        $data = Location::find($id);
        $staff = Staff::where('status',0)->get();
        return view('backend.locations.edit' ,compact('data','staff'));   
    }

    public function update(editLocationRequest $request,$id){
        $data = $request->all();
        unset($data['_token']);
        Location::where('id',$id)->update($data);
        alert()->success('Sửa thành công'); 
        return redirect()->route('listLocation'); 
    }
    public function search(Request $request){
        $data = Location::where('name', 'like', '%' . $request->name . '%')->where('status','!=',2)->paginate(9);
        return view('backend.locations.list' ,compact('data'));   
    }
    
}
