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
            return view('Backend.footers.add');
        }
        public function save(AddFooterRequest $request){
              $flight = new Footer;
              $flight->address = $request->address;
              $flight->phone_number = $request->phone_number;
              $flight->email = $request->email;
              $flight->link_fanpage = $request->link_fanpage;
              $flight->save();
            return redirect()->route('listFooter');
          }
          public function list (){
            $data = Footer::get();
            return view('Backend.footers.list',compact('data'));
         }
         public function delete($id){
            Footer::where('id', $id)->delete();
            return redirect()->route('listFooter');
        }
        public function edit($id){
          $data = Footer::find($id);
          return view('Backend.footers.edit',compact('data'));
        }
        public function update(EditFooterRequest $request ,$id){
          $flight = Footer::find($id);
              $flight->address = $request->address;
              $flight->phone_number = $request->phone_number;
              $flight->email = $request->email;
              $flight->link_fanpage = $request->link_fanpage;
              $flight->save();
           return redirect()->route('listFooter');
        
        }  
}

