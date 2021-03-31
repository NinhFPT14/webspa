<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AppointmentController extends Controller
{
   public function appointment(){
   // dd($id);
    return view('frontend.appointment');
   }

}
