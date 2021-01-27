<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function addSlide(){
        return view('backend.slides.add');
    }
}
