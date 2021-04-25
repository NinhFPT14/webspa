<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Post;
use App\Http\Requests\AddBlog;
use App\Http\Requests\EditBlog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;
use DB;
class BlogController extends Controller
{

    public function index()
    {
        $data = Post::paginate(8);
        // dd($data);
        return view('backend.blog.list', ['data'=> $data ]);
    }

    public function create()
    {
        $category = Category::get();
        // dd($category);
        return view('backend.blog.add', [
            'category' => $category
        ]);
    }

    public function store(AddBlog $request)
    {
        // dd($request->all());
        $data = $request->all();
        unset($data['_token']);

        if($request->hasFile('avatar')){
            $extension = $request->avatar->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->avatar->storeAs(
              'post_image', $filename, 'public'
            );
            $data['avatar'] = "storage/".$path;  
           }
        //    dd($data);

           $post = Post::create( $data);
           Post::where('id',$post->id)->update(['slug'=> Str::slug($post->title.$post->id.'-')]);
           alert()->success('Đăng bài viết mới thành công');
        return redirect()->route('listBaiviet');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::all();
        $post = Post::where('id',$id)->get();
        // dd(compact('category','post'));
        return view('backend.blog.edit',compact('category','post'));
    }

    public function update(EditBlog $request, $id)
    {
        $data = $request->all();
        // dd($data);
        unset($data['_token'],$data['avatar']);
        $post = Post::find($id);
        if($request->hasFile('avatar')){
            File::delete($post->avatar);
            $extension = $request->avatar->extension();
            $filename =  uniqid(). "." . $extension;
            $path = $request->avatar->storeAs(
              'post_image', $filename, 'public'
            );
            $data['avatar'] = "storage/".$path;  
           }
           Post::where('id',$id)->update($data);
           Post::where('id',$post->id)->update(['slug'=> Str::slug($data['title'].$post->id.'-')]);
           alert()->success('Sửa bài viết thành công');
           return redirect()->route('editBaiviet',['id'=>$post->id]);
    }

    public function destroy($id)
    {
        $data = Post::find($id);
        File::delete($data->avatar);
        $data->delete();
        alert()->success('Xóa bài viết thành công'); 
        return redirect()->route('listBaiviet');
    }

    public function search(Request $request) {
        $data = Post::where('title', 'like', '%' . $request->name . '%')->paginate(5);
        return view('backend.blog.list',compact('data'));
    }
    public function status($id ,$status){
        $flight = Post::find($id);
        $flight->status = $status;
        $flight->save();
        alert()->success('Cập nhật trạng thái thành công'); 
        return redirect()->route('listBaiviet',['type'=>$flight->type]);
    }
}
