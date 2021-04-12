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
          $flight->email = $request->email;
          $flight->phone_number = $request->phone_number;
          $flight->content = $request->content;
          $flight->status = 0;
          $flight->save();
        return redirect()->route('contact');
      }

      public function contact(){
        return view('frontend.contact');
    }
}
