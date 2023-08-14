<?php

namespace App\Http\Controllers;

use App\Models\Cat_post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class AdminCatPostController extends Controller
{
    private $adminCatController;

    public function __construct(AdminCatController $adminCatController)
    {
        $this->adminCatController = $adminCatController;
    }

    function add(){
        $data =  Cat_post::get();
        $listCat =  $this->adminCatController->data_tree($data);
        return view('admin.catPost.add', compact('listCat'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
            ],
            [
                'required' => ":attribute không được bỏ trống",
                'max' => ':attribute phải ít hơn :max kí tự'
            ],
            [
                'name' => 'Tên danh mục'
            ]
        
        );
        $slug_cat = Str::slug($request->input('name'));
        Cat_post::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug') ?: $slug_cat,
            'parent_id' => $request->input('parent_cat'),
            'user_id' => Auth::id(),

        ]);
        return redirect()->route('admin.catPost.add')->with('status', 'Thêm danh mục thành công');
        
    }
    function update(Cat_post $cat){
        $data =  Cat_post::get();
        $listCat =  $this->adminCatController->data_tree($data);
        return view('admin.catPost.update', compact('cat','listCat'));
    }

    function edit(Cat_post $cat, Request $request){
        $request->validate(
            [
                'name' => 'required|max:50|unique:cat_posts,name,'.$cat->id,
            ],
            [
                'required' => ":attribute không được bỏ trống",
                'max' => ':attribute phải ít hơn :max kí tự'
            ],
            [
                'name' => 'Tên danh mục'
            ]
        
        );
        $slug_cat = Str::slug($request->input('name'));
        $cat->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug') ?: $slug_cat,
            'parent_id' => $request->input('parent_cat'),
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('admin.catPost.add')->with('status', 'Cập nhật danh mục thành công');
    }

    function delete(Cat_post $cat){
        $data =  Cat_post::get();
        if($this->adminCatController->hasChild($data,$cat->id)){
            return redirect()->route('admin.catPost.add')->with('status', 'Không thành công! Bạn cần xóa danh mục con trước');
        }else{
            $cat->delete();
            return redirect()->route('admin.catPost.add')->with('status', 'Xóa danh mục thành công');
        }
    }

}
