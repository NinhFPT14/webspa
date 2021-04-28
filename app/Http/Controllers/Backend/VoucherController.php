<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Service;
use App\Model\ServiceVoucher;
use App\Http\Requests\AddVoucherService;
use App\Http\Requests\EditVoucherService;
use Carbon\Carbon;

class VoucherController extends Controller
{
    public function add(){
        $service = Service::where('status',0)->get();
        return view('backend.voucher_service.add',compact('service'));
    }
    public function store(AddVoucherService $request){
        $data = $request->all();
        unset($data['_token']);
        ServiceVoucher::create($data);
        alert()->success('Tạo thành công vouchers'); 
      return redirect()->route('listVoucherService');
    }

    public function list (Request $request){

      if(!$request->hasAny(['key', 'from_time', 'to_time'])){
        $data = ServiceVoucher::where('status','!=',3)->paginate(10);
      }else{
          if($request->has('key')){
              $query = ServiceVoucher::where('status','!=',3)->where(function($q2) use ($request){
                  $q2->where("code", "like", "%".$request->key."%")
                      ->orWhere("discount", "like", "%".$request->key."%");
              });
          }
          if($request->from_time != null && $request->to_time != null){
              $query = $query->whereBetween('time_start', [
                  Carbon::createFromFormat('d/m/Y', $request->from_time)->format('Y-m-d'),
                  Carbon::createFromFormat('d/m/Y', $request->to_time)->format('Y-m-d')
              ]);
          }
          if($request->has('type')){
              $query =  $query->where("status",$request->type);
          }
          $data = $query->orderByDesc('id')->paginate(10);
      }
      $key = $request->key;
      $from_time = $request->from_time;
      $to_time = $request->to_time;
      $type = $request->type;
      
        return view('backend.voucher_service.list',compact('data','key','from_time','to_time','type'));
     }

     public function status ($id,$status){
        $data = ServiceVoucher::where('id',$id)->update(['status'=>$status]);
        if($status ==0){
            alert()->success('Bật Voucher'); 
          }else{
            alert()->error('Tắt Voucher'); 
          }
        return redirect()->route('listVoucherService');
     }
     public function delete($id){
        $data = ServiceVoucher::find($id);
        $data->status = 3;
        $data->save();
        alert()->error('Xóa thành công'); 
        return redirect()->route('listVoucherService');
        }
    
    public function edit($id){
        $service = Service::where('status',0)->get();
        $data = ServiceVoucher::find($id);
        return view('backend.voucher_service.edit',compact('data','service'));
    }
    
    public function update(EditVoucherService $request ,$id){
        $data = $request->all();
        unset($data['_token']);
        ServiceVoucher::where('id',$id)->update($data);
        alert()->success('Sửa thành công voucher'); 
        return redirect()->route('listVoucherService');
    }  
 
}
