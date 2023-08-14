<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AdminCatController extends Controller
{


    function hasChild($data, $id)
    {
        foreach ($data as $v) {
            if ($v['parent_id'] == $id)
                return true;
        };
        return false;
    }
    function data_tree($data, $parent_id = 0, $level = 0)
    {
        $result = array();
        foreach ($data as $v) {
            if ($v['parent_id'] == $parent_id) {
                $v['level'] = $level;
                $result[] = $v;
                if ($this->hasChild($data, $v['id'])) {
                    $result_child = $this->data_tree($data, $v['id'], $level + 1);
                    $result = array_merge($result, $result_child);
                }
            }
        }
        return $result;
    }
    function add()
    {
        $data =  Categor::get();
        $listCat =  $this->data_tree($data);
        return view('admin.cat.add', compact('listCat'));
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
        Categor::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug') ?: $slug_cat,
            'parent_id' => $request->input('parent_cat'),
            'user_id' => Auth::id(),

        ]);
        return redirect()->route('admin.cat.add')->with('status', 'Thêm danh mục thành công');
        
    }

    function update(Categor $cat){
        $data =  Categor::get();
        $listCat =  $this->data_tree($data);
        return view('admin.cat.update', compact('cat','listCat'));
    }

    function edit(Categor $cat, Request $request){
        $request->validate(
            [
                'name' => 'required|max:50|unique:categors,name,'.$cat->id,
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
        return redirect()->route('admin.cat.add')->with('status', 'Cập nhật danh mục thành công');
    }

    function delete(Categor $cat){
        $data =  Categor::get();
        if($this->hasChild($data,$cat->id)){
            return redirect()->route('admin.cat.add')->with('status', 'Không thành công! Bạn cần xóa danh mục con trước');
        }else{
            $cat->delete();
            return redirect()->route('admin.cat.add')->with('status', 'Xóa danh mục thành công');
        }
    }
}
