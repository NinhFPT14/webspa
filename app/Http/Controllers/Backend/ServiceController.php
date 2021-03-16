<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Service;
use App\Http\Requests\AddServiceRequest;
use App\Http\Requests\EditServiceRequest;
use Illuminate\Support\Str;
use DB;

class ServiceController extends Controller
{
    public function add(){
        $cate = DB::table('categories')->where('type',1)->where('status',0)->get();
        return view('backend.services.add', ['cate' => $cate]);
    }

    public function store(AddServiceRequest $request){
        $data = $request->all();
        unset($data['_token']);
        $data['slug'] = 1;
        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->image->storeAs(
              'image', $filename, 'public'
            );
            $data['avatar'] = "storage/".$path;  
           }
        $data['status'] = 0;
        $data['total_time'] = 0;
        $data['time_distance'] = 0;
        $data['slug'] = Str::slug($request->name.$request->id.'-');
        // dd($data);
        $Service = Service::create($data);
        alert()->success('Tạo thành công dịch vụ');
        return redirect()->route('listService');
    }

    public function list(){
        $data = Service::paginate(10);
        // dd($data);
        return view('backend.services.list',compact('data'));
    }

    public function status($id ,$status){
        $flight = Service::find($id);
        $flight->status = $status;
        $flight->save();
        if($status == 0){
            alert()->success('Đã bật dịch vụ');
        }else{
            alert()->error('Đã tắt dịch vụ'); 
        }
        return redirect()->route('listService');
    }

    public function delete($id){
        $flight = Service::find($id);
        $flight->delete();
        alert()->error('Đã xóa dịch vụ'); 
        return redirect()->route('listService');
    }

    public function edit($id){
        $data = Service::find($id);
        $cate = DB::table('categories')->where('type',1)->where('status',0)->get();
        return view('backend.services.edit',compact('data','cate'));
    }

    public function update(EditServiceRequest $request ,$id){
        $data = $request->all();
        unset($data['_token']);
        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->image->storeAs(
              'image', $filename, 'public'
            );
            $data['image'] = "storage/".$path;  
           }
        // dd($data);

           Service::where('id',$id)->update($data);
        $flight = Service::where('id',$id)->update($data);
        alert()->success('Sửa thành công dịch vụ');
        return redirect()->route('listService');
    }
}

