<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Service;

class ServiceController extends Controller
{
    public function add(){
        return view('backend.services.add');
    }

    public function store(AddServiceRequest $request){
        $data = $request->all();
        unset($data['_token']);
        $data['status'] = 0;
        $Service = Service::create($data);
        return redirect()->route('tao-dich-vu');
    }

    public function list(){
        $data = Service::all();
        // dd($data);
        return view('backend.services.list',compact('data'));
    }

    public function status($id ,$status){
        $flight = Service::find($id);
        dd($flight);
        $flight->status = $status;
        $flight->save();
        return redirect()->route('danh-sach-dich-vu');
    }

    public function delete($id){
        $flight = Service::find($id);
        $flight->delete();
        return redirect()->route('danh-sach-dich-vu');
    }

    public function edit($id){
        $data = Service::find($id);
        return view('backend.services.edit',compact('data'));
    }

    public function update(EditServiceRequest $request ,$id){
        $data = $request->all();
        unset($data['_token']);
        $flight = Service::where('id',$id)->update($data);
        return redirect()->route('danh-sach-dich-vu');
    }
}
