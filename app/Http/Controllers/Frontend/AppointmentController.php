<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AppointmentController extends Controller
{
   public function appointment(){
      $data = DB::table('services')->get();
      // dd($data);
    return view('frontend.appointment', [ 'data' => $data ]);
   }

   public function setup(Request $request) {
      dd($request->all());
   }

}
