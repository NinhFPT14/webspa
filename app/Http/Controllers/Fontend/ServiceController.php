<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(){
        return view('fontend.service');
    }
    public function detailService(){
        return view('fontend.detailService');
    }
}
