<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AppointmentController extends Controller
{
   public function appointment(){
    return view('frontend.appointment');
   }

   public function setup(Request $request) {
      dd($request->all());
   }

}
