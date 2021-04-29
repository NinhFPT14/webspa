<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Feedback;
use Carbon\Carbon;

class FeedbackController extends Controller
{
    public function list (Request $request){
        if(!$request->hasAny(['key', 'from_time', 'to_time','type'])){
            $data = Feedback::orderByDesc('id')->paginate(10);
        }else{
            if($request->has('key')){
                $query = Feedback::where(function($q2) use ($request){
                    $q2->where("name", "like", "%".$request->key."%")
                        ->orWhere("phone_number", "like", "%".$request->key."%");
                });
            }
            if($request->from_time != null && $request->to_time != null){
                $query = $query->whereBetween('created_at', [
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
        return view('backend.feedbacks.list',compact('data','key','from_time','to_time','type'));
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
