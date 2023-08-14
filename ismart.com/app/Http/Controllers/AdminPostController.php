<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat_post;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AdminPostController extends Controller
{
    private $adminCatController;

    public function __construct(AdminCatController $adminCatController)
    {
        $this->adminCatController = $adminCatController;
        
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'post']);
            return $next($request);
        });
    }

    function show(Request $request){
        $posts = Post::get();
        if ($request->input('status') == 'public') {
            $sliders = Post::where('status',1)->get();
        }elseif($request->input('status') == 'private'){
            $posts = Post::where('status',0)->get();
        }elseif($request->input('btn-search')){
            $search_users = $request->input('search_users');
            $posts = Post::where('name', 'LIKE', "%{$search_users}%")->paginate(10);
        }else{
            $posts = Post::get();
        }
        #tính tổng các trang thái Post
        $count_post = array();
        $count_post['all'] = Post::get()->count();
        $count_post['private'] = Post::where('status',0)->get()->count();
        $count_post['public'] = Post::where('status',1)->get()->count();

        return view("admin.post.show",compact('posts', 'count_post'));
    }

    function add()
    {
        $data =  Cat_post::get();
        $cat_post = $this->adminCatController->data_tree($data);
        return view('admin.post.add', compact('cat_post'));
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:80|min:5',
                'content_post' => 'required|min:50',
                'cat_post' => 'required|not_in:--Chọn--',
                'file' => 'required|file|image|mimes:jpeg,png,gif',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'max' => ':attribute phải ít hơn:max kí tự',
                'min' => ':attribute phải nhiều hơn :min kí tự',
                'mimes' => 'Đuôi file không đúng định dạng',
                'not_in' => ':attribute không được bỏ trống',
            ],
            [
                'name' => 'Tên sản phẩm',
                'content_post' => 'Nội dung bài viết',
                'cat_post' => 'Danh mục bài viết',
                'file' => 'File',
            ],
        );
        $file = $request->file;
        // lấy tên file:
        $file_name = $file->getClientOriginalName();
        $path =  $file->move('public/uploads', $file->getClientOriginalName());
        $thumbnail = 'uploads/' . $file_name;
        $user_id = Auth::id();
        $slug = Str::slug($request->input('name'));

        Post::create([

            'user_id' => $user_id,
            'cat_post_id' => $request->input('cat_post'),
            'title' => $request->input('name'),
            'slug' => $slug,
            'detail' => $request->input('content_post'),
            'thumbnail' => $thumbnail,
            'status' => $request->input('status'),
        ]);
        return redirect()->route('admin.post.show')->with('status', "Cập nhật bài viêt thành công");

    }

    function update(Post $post){
        $data =  Cat_post::get();
        $cat_post = $this->adminCatController->data_tree($data);
        return view('admin.post.update', compact('post', 'cat_post'));
    }

    function edit(Request $request, Post $post){
        $request->validate(
            [
                'name' => 'required|max:80|min:5',
                'content_post' => 'required|min:50',
                'cat_post' => 'required|not_in:--Chọn--',
                'file' => 'file|image|mimes:jpeg,png,gif',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'max' => ':attribute phải ít hơn:max kí tự',
                'min' => ':attribute phải nhiều hơn :min kí tự',
                'mimes' => 'Đuôi file không đúng định dạng',
                'not_in' => ':attribute không được bỏ trống',
            ],
            [
                'name' => 'Tên sản phẩm',
                'content_post' => 'Nội dung bài viết',
                'cat_post' => 'Danh mục bài viết',
                'file' => 'File',
            ],
        );
        if ($request->hasFile('file')) {
            $file = $request->file;
            // lấy tên file:
            $file_name = $file->getClientOriginalName();
            $path = $file->move('public/uploads', $file->getClientOriginalName());
            $thumbnail = 'uploads/' . $file_name;
        }
        $user_id = Auth::id();
        $old_thumbnail = $post->thumbnail;
        $slug = Str::slug($request->input('name'));
        $post->update([
            'user_id' => $user_id,
            'cat_post_id' => $request->input('cat_post'),
            'title' => $request->input('name'),
            'slug' => $slug,
            'detail' => $request->input('content_post'),
            'thumbnail' => ($request->hasFile('file')) ? $thumbnail : $old_thumbnail,
            'status' => $request->input('status'),
        ]);
        return redirect()->route('admin.post.show')->with('status', "Cập nhật bài viêt thành công");
    }
    
    function delete(Post $post){
        $post->delete();
        return redirect()->route('admin.post.show')->with('status', "Xóa bài viêt thành công");
    }
}
