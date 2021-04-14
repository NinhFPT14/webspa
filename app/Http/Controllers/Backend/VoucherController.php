<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Service;
use App\Model\ServiceVoucher;
use App\Http\Requests\AddVoucherService;
use App\Http\Requests\EditVoucherService;

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

    public function list (){
        $data = ServiceVoucher::paginate(10);
        return view('backend.voucher_service.list',compact('data'));
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
        $data->delete();
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
    
  
  public function search(Request $request){
    $data = ServiceVoucher::where('code', 'like', '%' . $request->name . '%')->paginate(10);
    return view('backend.voucher_service.list',compact('data'));
}
}
