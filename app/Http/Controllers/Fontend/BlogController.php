<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        return view('fontend.blog');
    }
    public function detailBlog(){
        return view('fontend.detailBlog');
    }
}
