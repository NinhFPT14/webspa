<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function list (){
        $data = Feedback::where('status',0)->paginate(10);
        return view('backend.feedbacks.list',compact('data'));
     }
}
