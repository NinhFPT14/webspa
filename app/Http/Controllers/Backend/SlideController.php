<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddSlideRequest;
use App\Http\Requests\EditSlideRequest;
use App\Model\Slide;
class SlideController extends Controller
{
    public function add(){
        return view('backend.slides.add');
    }
    public function store(AddSlideRequest $request){
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
     public function status($id ,$status){
      $flight = Slide::find($id);
      $flight->status = $status;
      $flight->save();
      return redirect()->route('listSlide',['type'=>$flight->type]);
  }
   public function delete($id){
    Slide::where('id', $id)->delete();
    return redirect()->route('listSlide');
}
public function edit($id){
  $data = Slide::find($id);
  return view('backend.slides.edit',compact('data'));
}
public function update(EditSlideRequest $request ,$id){
  
  $flight = Slide::find($id);
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
}
