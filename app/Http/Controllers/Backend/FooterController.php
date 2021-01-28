<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Footer;
class FooterController extends Controller
{
    
        public function add(){
            return view('Backend.footers.add');
        }
        public function save(Request $request){
            $request->validate([
                'address' => 'required|max:250|min:5',
                'phone_number' => 'required|size:10',
                'email' => 'required|max:255|min:5|',
                'link_fanpage' => 'required|max:255|min:5|'
            ],[
                'address.required' => 'Không được để trống tiêu để',
                'address.min' => 'tiêu đề ít nhất phải trên 5 kí tự',
                'address.max' => 'tiêu đề không được vượt quá 250 kí tự',
                'phone_number.required' => 'Không được để trống số điện thoại',
                'phone_number.size' => 'Số điện thoại bắt buộc phải 10 số',
                // 'phone_number.min' => 'số điện thoại phải cần 10 số',
                // 'phone_number.max' => 'số điện thoại không được vượt quá 10 số',
                'email.required' => 'không được để trống email',
                'email.required' => 'email ít nhất phải trên 5 kí tự',
                'link_fanpage.required' => 'Không được để trống link',
                'link_fanpage.min' => 'đường link ít nhất phải trên 5 kí tự',
                'link_fanpage.max' => 'đường link không được vượt quá 5 kí tự',
                
                
            ]
            );
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
        public function update(Request $request ,$id){
          $flight = Footer::find($id);
              $flight->address = $request->address;
              $flight->phone_number = $request->phone_number;
              $flight->email = $request->email;
              $flight->link_fanpage = $request->link_fanpage;
              $flight->save();
           return redirect()->route('listFooter');
        
        }  
}

