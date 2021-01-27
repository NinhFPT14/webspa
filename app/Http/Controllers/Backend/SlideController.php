<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    public function add(){
        return view('backend.slides.add');
    }
    public function store(Request $request){
        $flight = new Slide;
        $flight->title = $request->title;
        $flight->content = $request->content;
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
      return redirect()->route('listSlide');
    }
    public function list (){
        $data = Slide::get();
        return view('backend.slides.list',compact('data'));
 
     }
}
