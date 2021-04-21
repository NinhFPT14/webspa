<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Feedback;

class FeedbackController extends Controller
{
    public function list (){
        $data = Feedback::orderBy('id', 'desc')->paginate(10);
        return view('backend.feedbacks.list',compact('data'));
     }

     public function detail (Request $request){
        if($request->has('id')){
            $data = Feedback::find($request->id);
            $data->status = 1;
            $data->save();
            return response()->json(['status' => true, 'data' => $data]);
        }
        return response()->json(['status' => false, 'message' => 'Không có tham số id']);
     }
}
