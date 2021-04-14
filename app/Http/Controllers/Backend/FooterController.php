<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddFooterRequest;
use App\Http\Requests\EditFooterRequest;
use App\Model\Footer;
class FooterController extends Controller
{
    
        public function add(){
            return view('backend.footers.add');
        }
        public function save(AddFooterRequest $request){
              $flight = new Footer;
              $flight->address = $request->address;
              $flight->phone_number = $request->phone_number;
              $flight->email = $request->email;
              $flight->link_fanpage = $request->link_fanpage;
              $flight->save();
              alert()->success('Tạo thành công footer'); 
            return redirect()->route('listFooter');
          }
          public function list (){
            $data = Footer::get();
            return view('backend.footers.list',compact('data'));
         }
         public function delete($id){
            Footer::where('id', $id)->delete();
            alert()->error('Xóa thành công');
            return redirect()->route('listFooter');
        }
        public function edit($id){
          $data = Footer::find($id);
          return view('backend.footers.edit',compact('data'));
        }
        public function update(EditFooterRequest $request ,$id){
          $flight = Footer::find($id);
              $flight->address = $request->address;
              $flight->phone_number = $request->phone_number;
              $flight->email = $request->email;
              $flight->link_fanpage = $request->link_fanpage;
              $flight->save();
              alert()->success('Sửa thành công footer'); 
           return redirect()->route('listFooter');
        
        }  
}

