<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Feedback;
use Illuminate\Http\Request;
use App\Http\Requests\AddFeedbackRequest;
class FeedbackController extends Controller
{
    public function save(AddFeedbackRequest $request){
          $flight = new Feedback;
          $flight->name = $request->name;
          $flight->phone_number = $request->phone_number;
          $flight->content = $request->content;
          $flight->status = 0;
          $flight->save();
        alert()->success('Thành công', "Gửi thành công phản hồi"); 
        return redirect()->route('contact');
      }

      public function contact(){
        return view('frontend.contact');
    }
}
