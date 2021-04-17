<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Feedback;
use Illuminate\Http\Request;
use App\Http\Requests\AddFeedbackRequest;
use Illuminate\Support\Facades\Validator;
class FeedbackController extends Controller
{
    public function apiSave(Request $request){
      $validate = Validator::make($request->all(), 
        [
          'name' => 'required|max:255',
          'phone_number' => 'required|digits_between:10,11',
          'content' => 'required|max:65535',
        ],
        [
        'name.required' => 'Họ tên không được để trống',
        'name.max' => 'Họ tên không được vượt quá 255 ký tự',
        'phone_number.required' => "Số điện thoại không được để trống",
        'phone_number.digits_between' => "Số điện thoại không hợp lệ",
        'content.required' => 'Nội dung không được để trống',
        'content.max' => 'Nội dung không được vượt quá 65535 ký tự',
        ]);
        if($validate->fails()){
            return json_encode([
                'status' => false,
                'messages' => $validate->errors()
            ]);
        }
          $flight = new Feedback;
          $flight->name = $request->name;
          $flight->phone_number = $request->phone_number;
          $flight->content = $request->content;
          $flight->status = 0;
          $flight->save();
          return response()->json(['status' => true, 'data' => 'ok']);
      }

      public function contact(){
        return view('frontend.contact');
    }
}
