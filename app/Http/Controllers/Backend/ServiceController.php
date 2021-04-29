<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Service;
use App\Model\Category;
use App\Http\Requests\AddServiceRequest;
use App\Http\Requests\EditServiceRequest;
use Illuminate\Support\Str;
use App\Model\Appointment;
use Illuminate\Support\Facades\Storage;
use DB;
use File;

class ServiceController extends Controller
{
    public function add(){
        $cate = DB::table('categories')->where('type',1)->where('status',0)->get();
        return view('backend.services.add', ['cate' => $cate]);
    }

    public function store(AddServiceRequest $request){
        // dd($request->all());
        $data = $request->all();
        unset($data['_token']);
        $data['slug'] = Str::slug($request->name.$request->id.'-');

        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->image->storeAs(
              'dichvu_image', $filename, 'public'
            );
            $data['image'] = "storage/".$path;  
           }
        // dd($data);
        $Service = Service::create($data);
        alert()->success('Tạo thành công dịch vụ');
        return redirect()->route('listService');
    }

    public function list(Request $request){
        if(!$request->hasAny(['key', 'type'])){
            $data = Service::where('status','<',2)->orderByDesc('id')->paginate(10);
        }else{
            if($request->has('key')){
                $query = Service::where('status','<',2)->where(function($q2) use ($request){
                    $q2->where("name", "like", "%".$request->key."%")
                        ->orWhere("discount", "like", "%".$request->key."%");
                });
            }
            if($request->has('type')){
                $query =  $query->where("category_id",$request->type);
            }
            $data = $query->orderByDesc('id')->paginate(10);
        }


        $category = Category::where('status',0)->where('type',1)->get();
        $key = $request->key;
        $type = $request->type;
        return view('backend.services.list',compact('data','category','type','key'));
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
        $flight->status = 2;
        $flight->save();
        alert()->success('Xóa dịch vụ thành công'); 
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
              'dichvu_image', $filename, 'public'
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

