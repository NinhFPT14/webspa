<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Sms;
use Illuminate\Support\Facades\Validator;
class SmsController extends Controller
{
    public function list(){
        $data = Sms::find(1);
        return view('backend.sms.list',compact('data'));
    }
    public function edit(Request $request ,$id){
        if(!$request->hasAny(['code_api', 'code_devices'])){
           $data = Sms::find($id);
        return view('backend.sms.edit',compact('data'));
        }else{
            $validatedData = $request->validate( [
                'code_api' => "required",
                'code_devices' => "required",
            ],
            [
            'code_api.required' => "Mã API không được để trống",
            'code_devices.required' => "Mã thiết bị không được để trống",
            ]);
            $data = Sms::find($id);
            $data->code_api = $request->code_api;
            $data->code_devices = $request->code_devices;
            $data->save();
            alert()->success('Sửa cấu hình thành công');
            return redirect()->route('listSms');
        }
    }

    public function add(Request $request){
        if(!$request->hasAny(['code_api', 'code_devices'])){
        return view('backend.sms.add');
        }else{
            $validatedData = $request->validate( [
                'code_api' => "required",
                'code_devices' => "required",
            ],
            [
            'code_api.required' => "Mã API không được để trống",
            'code_devices.required' => "Mã thiết bị không được để trống",
            ]);

            $data = Sms::get();
            if(count($data) >=1){
                return back()->with('mess','Đã có 1 cấu hình SMS bạn không thể tạo mới');
            }else{
                $data = new Sms;
                $data->code_api = $request->code_api;
                $data->code_devices = $request->code_devices;
                $data->save();
                alert()->success('Tạo mới hình thành công');
                return redirect()->route('listSms');
            }
        }
    }
}
