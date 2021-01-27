<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slide;
class SlideController extends Controller
{
    public function add(){
        return view('backend.slides.add');
    }
    public function store(Request $request){
      $request->validate([
        'title' => 'required|max:250|min:5',
        'content' => 'required|max:255|min:5',
        'image' => 'required',
        'link' => 'required|max:255|min:5|',
        'status' => 'required'
    ],[
        'title.required' => 'Không được để trống tiêu để',
        'title.min' => 'tiêu đề ít nhất phải trên 5 kí tự',
        'title.max' => 'tiêu đề không được vượt quá 250 kí tự',
        'content.required' => 'Không được để trống nội dung',
        'content.min' => 'tiêu đề ít nhất phải trên 5 kí tự',
        'content.max' => 'tiêu đề không được vượt quá 255 kí tự',
        'image.required' => 'Không được để trống ảnh',
        'link.required' => 'Không được để trống link',
        'link.min' => 'đường link ít nhất phải trên 5 kí tự',
        'link.max' => 'đường link không được vượt quá 5 kí tự',
        'status.required' => 'không được để trống trạng thái',
        
    ]
);
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
   public function delete($id){
    Slide::where('id', $id)->delete();
    return redirect()->route('listSlide');
}
public function edit($id){
  $data = Slide::find($id);
  return view('backend.slides.edit',compact('data'));
}
public function update(Request $request ,$id){
  $request->validate([
    'title' => 'required|max:250|min:5',
    'content' => 'required|max:255|min:5',
    'link' => 'required|max:255|min:5|',
    'status' => 'required'
],[
    'title.required' => 'Không được để trống tiêu để',
    'title.min' => 'tiêu đề ít nhất phải trên 5 kí tự',
    'title.max' => 'tiêu đề không được vượt quá 250 kí tự',
    'content.required' => 'Không được để trống nội dung',
    'content.min' => 'tiêu đề ít nhất phải trên 5 kí tự',
    'content.max' => 'tiêu đề không được vượt quá 255 kí tự',
    'link.required' => 'Không được để trống link',
    'link.min' => 'đường link ít nhất phải trên 5 kí tự',
    'link.max' => 'đường link không được vượt quá 5 kí tự',
    'status.required' => 'không được để trống trạng thái',
    
]
);
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
