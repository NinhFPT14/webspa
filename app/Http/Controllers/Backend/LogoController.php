<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddLogoRequest;
use App\Http\Requests\EditLogoRequest;
use App\Model\Logo;
class LogoController extends Controller
{
    public function add(){
        return view('backend.logos.add');
    }
    public function store(AddLogoRequest $request){
        $flight = new Logo;
        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->image->storeAs(
              'image_logo', $filename, 'public'
            );
            $flight->image = "storage/".$path;  
           }
        $flight->save();
      return redirect()->route('listLogo');
    }
    public function list (){
        $data = Logo::get();
        return view('backend.logos.list',compact('data'));
     }
   public function delete($id){
    Logo::where('id', $id)->delete();
    return redirect()->route('listLogo');
}
public function edit($id){
  $data = Logo::find($id);
  return view('backend.logos.edit',compact('data'));
}
public function update(EditLogoRequest $request ,$id){
  $flight = Logo::find($id);
  if($request->hasFile('image')){
      $extension = $request->image->extension();
      $filename =  uniqid(). "." . $extension;
      $path = $request->image->storeAs(
        'image_logo', $filename, 'public'
      );
     $flight->image = "storage/".$path;  
     } 
  $flight->save();
   return redirect()->route('listLogo');

}  
}
