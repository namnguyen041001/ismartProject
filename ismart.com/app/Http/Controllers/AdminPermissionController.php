<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    function add()
    {
        $permissions = Permission::all()->groupBy(function ($permission) {
            return explode('.', $permission->slug)[0]; //Điều này có nghĩa là các quyền có cùng phần tử đầu tiên của "slug" sẽ được nhóm lại với nhau.
        });
        return view('admin.permission.add', compact('permissions'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:100|unique:permissions,name',
                'slug' => 'required|max:100|unique:permissions,slug',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'max' => ':attribute phải ít hơn :max kí tự',
                'unique' => ':attribute đã tồn tại trên hệ thống',
            ],
            [
                'name' => 'Tên quyền',
                'slug' => 'Slug',
            ]
        );
        $name = strtolower($request->input('name'));
        Permission::create(
            [
                'name' => $name,
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
            ]
        );
        return redirect()->route("admin.permission.add")->with('status', "Thêm quyền thành công");
    }

    function update($id)
    {
        $permissions = Permission::all()->groupBy(function ($permission) {
            return explode('.', $permission->slug)[0];
        });
        $permission = Permission::find($id);
        return view('admin.permission.update', compact('permissions', 'permission'));
    }

    function edit(Request $request, $id){
        $request->validate(
            [
                'name' => 'required|max:100|unique:permissions,name,'.$id,
                'slug' => 'required|max:100|unique:permissions,slug,'.$id,
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'max' => ':attribute phải ít hơn :max kí tự',
                'unique' => ':attribute đã tồn tại trên hệ thống',
            ],
            [
                'name' => 'Tên quyền',
                'slug' => 'Slug',
            ]
        );
        Permission::where('id',$id)->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description')
        ]);
        return redirect()->route("admin.permission.add")->with('status',"Cập nhật thành công");
    }
    function delete($id){
        Permission::where('id',$id)->delete();
        return redirect()->route("admin.permission.add")->with('status',"Xóa thành công");

    }
}
