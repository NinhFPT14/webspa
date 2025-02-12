<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Feedback;
use App\Model\Post;
use DB;

class BlogController extends Controller
{
    public function list(){
        $data = Post::where('status',0)->orderBy('view')->paginate(5);
        return view('frontend.blog', compact('data'));
    }

    public function categoryBlog($id) {
        $data = Post::where('status',0)->where('category_id',$id)->paginate(5);
        return view('frontend.blog', compact('data'));
    }
    public function detailBlog($id){
        // dd($id);
        $detail = Post::where('id',$id)->get();//lấy thông tin bài viết
        $category_id = collect($detail)->first()->category_id ; // lấy ra category_id từ mảng $detail
        $lienquan = Post::where('category_id','=', $category_id)->get(); // Hiển thị các bài viết có cùng Category_id
        // dd($feedback);
        $view = collect($detail)->first()->view + 1;
        // dd($view);
        DB::table('posts')->where('id',$id)->update(['view' => $view]);
        return view('frontend.detailBlog', compact('detail', 'lienquan'));
    }
    public function search(Request $request) {
        unset($request['_token']);
        $data = Post::where('title', 'like', '%' . $request->name . '%')->paginate(5);
        // dd($data->all());
        if($data == []){
            alert()->error('Từ khóa không có kết quả hoặc không hợp lệ, vui lòng thử từ khóa khác nhé ! Thanks');
        }
        return view('frontend.blog',compact('data'));
    }
    
}
