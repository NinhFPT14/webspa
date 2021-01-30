<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(){
        return view('frontend.service');
    }
    public function detailService(){
        return view('frontend.detailService');
    }
}
