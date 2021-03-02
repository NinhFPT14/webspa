<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddLogoRequest;
use App\Http\Requests\EditLogoRequest;
use App\Model\Logo;
use File;
use Illuminate\Support\Facades\Storage;
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
           $status = Logo::where('status',0)->get();
           if(count($status) == 0){
            $flight->status = 0;
           }else{
            $flight->status = 1;
           }
        $flight->save();
      return redirect()->route('listLogo');
    }

    public function list (){
        $data = Logo::get();
        return view('backend.logos.list',compact('data'));
     }
//new code
    public function delete($id){
      $data = Logo::find($id);
      File::delete($data->image);
      Logo::destroy($id);
      return redirect()->route('listLogo');
      }

      public function edit($id){
        $data = Logo::find($id);
        return view('backend.logos.edit',compact('data'));
      }

      public function update(EditLogoRequest $request ,$id){
        $flight = Logo::find($id);
        File::delete($flight->image);
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

      public function status($id , $status){
        $data = Logo::find($id);
        if($data->status == 0){
          Logo::where('id',$id)->update(['status' => 1]);
        }else{
          Logo::where('id',$id)->update(['status' => 0]);
          $data = Logo::where('id','!=',$id)->get();
          // dd($data);
          foreach($data as $value){
            Logo::where('id',$value->id)->update(['status' => 1]);
          }
        }
        return redirect()->route('listLogo');
      }
}
