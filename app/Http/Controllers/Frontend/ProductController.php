<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        return view('frontend.product');
    }
    public function detailProduct(){
        return view('frontend.detailProduct');
    }
}
