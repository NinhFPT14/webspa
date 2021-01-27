<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    public function addSlide(){
        return view('backend.slides.add');
    }
    public function storeSlide (Request $request){
        $flight = new Slide;
        $flight->title = $request->title;
        $flight->contet = $request->contet;
        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->image->storeAs(
              'image_slide', $filename, 'public'
            );
            $flight->image = "storage/".$path;  
           }
        $flight->link = $request->link;
        $flight->status = $request->status;
        $flight->save();
      return redirect('list-slide');
    }
    public function index (){
        $data = Slide::get();
        return view('list-slide',compact('data'));
 
     }
}
