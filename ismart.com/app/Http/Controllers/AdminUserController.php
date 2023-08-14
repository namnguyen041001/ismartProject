<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminUserController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'user']);
            return $next($request);
        });
    }
    function list(Request $request)
    {
        if ($request->input('status') == 'trash') {
            $users = User::onlyTrashed()->paginate(10);
        } else {
            $search_users = "";
            if ($request->input('search_users')) {
                $search_users = $request->input('search_users');
            }
            $users = User::where('name', 'LIKE', "%{$search_users}%")->paginate(10);
        }
        $total_user_active = User::count();
        $total_user_trash = User::onlyTrashed()->count();

        return view('admin.user.list', compact('users', 'total_user_active', 'total_user_trash'));
    }
    function add()
    {
        $roles = Role::all();
        return view('admin.user.add',compact('roles'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'required' => ":attribute không được để trống",
                'min' => ":attribute phải hơn :min kí tự",
                'max' => ":attribute phải ít hơn :max kí tự",
                'confirmed' => "Nhập lại mật khẩu không khớp",
                "unique" => "Email đã đã tồn tại, vui lòng dùng tài khoản email khác"
            ],
            [
                'name' => 'Tên người dùng',
                'email' => 'Email',
                'password' => 'Mật khẩu'
            ]
        );
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_active' => 1
        ]);
        $user->roles()->attach($request->input('roles'));

        return redirect()->route('admin.user.list')->with('status', "Thêm tài khoản thành công");
    }
    function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user','roles'));
    }
    function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'. $user->id,

            ],
            [
                'required' => ":attribute không được để trống",
                'min' => ":attribute phải hơn :min kí tự",
                'max' => ":attribute phải ít hơn :max kí tự",
                "unique" => "Email đã đã tồn tại, vui lòng dùng tài khoản email khác"
            ],
            [
                'name' => 'Tên người dùng',
                'email' => 'Email',
            ]
        );
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);
        $user->roles()->sync($request->input('roles'));
        return redirect()->route('admin.user.list')->with('status', 'Cập nhật tài khoản thành công');
    }
    function delete(User $user)
    {
        if (Auth::id() != $user->id) {
            $user->delete();
            return redirect()->route('admin.user.list')->with('status', 'Đã thêm tài khoản vào thùng rác');
        } else {
            return redirect()->route('admin.user.list')->with('status', 'Không thành công! Bạn không thể xóa chính bản thân mình');
        }
    }
    function action(Request $request){
        $list_check = $request->input('list_check');
        if ($list_check) {
            //Kiểm tra xem có trùng với người đăng nhập không(không cho phép tự xóa mình), nếu trùng thì xóa mình ra khỏi danh sách được chọn

            foreach ($list_check as $key => $value) {
                if (Auth::id() == $value) {
                    unset($list_check[$key]);
                }
            }
            //kiểm tra danh sách có rỗng không sau khi kiểm tra có tên mình trong danh sách xóa không
            // ví dụ xóa đúng 1 user mà user đó chính là mình thì $list_check sẽ rỗng, nếu k kiểm tra có giá trị list_check lần nữa k thì phần dưới if nó vẫn chạy
            if ($list_check) {
                $act = $request->input('act');
                if ($act == 'delete') {
                    User::destroy($list_check);
                    return redirect()->route('admin.user.list')->with('status', 'Đã thêm vào danh sách xóa tạm thời');
                }

                if ($act == 'permanently_deleted') {
                    User::whereIn('id', $list_check)->forceDelete();
                    return redirect()->route('admin.user.list')->with('status', 'Xóa thành công người dùng');
                }

                if ($act == 'restore') {
                    User::whereIn('id', $list_check)->restore();
                    return redirect()->route('admin.user.list')->with('status', 'Khôi phục thành công người dùng');
                }
            }
            return redirect("admin/users/list")->with('status', 'Bạn không thể xóa chính bản thân mình');
        } else {
            return redirect("admin/users/list")->with('status', 'Bạn chưa chọn người dùng nào');
        }
    }

    function logout(){
        
    }
}
