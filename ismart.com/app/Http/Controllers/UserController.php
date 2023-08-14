<?php

namespace App\Http\Controllers;

use App\Mail\ActiveUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;



class UserController extends Controller
{
    function login()
    {
        return view('user.login');
    }
    function checkLogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|max:255|email',
                'password' => 'required|max:255'
            ],
            [
                'required' => ":attribute không được bỏ trống",
                'max' => ':attribute không được vượt quá :max kí tự',
                'email' => 'Không đúng định dạng email',
            ],
            [
                'email' => 'Email',
                'password' => 'Mật khẩu',
            ]
        );
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'is_active' => 1])) {
            // return Auth::user();
            // if (Auth::user()->email == 'nguyenvannam041001@gmail.com')
            if (Auth::user()->roles->count() >0)
                return redirect()->route('admin.index');
            return redirect('/');
        } else {
            return redirect()->route('login')->with('status', "Thông tin tài khoản hoặc mật khẩu không chính xác");
        }
    }

    function add()
    {
        return view('user.register');
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'fullname' => 'required|max:100',
                'email' => 'required|max:255|email|unique:users,email',
                'password' => 'required|max:255|confirmed'
            ],
            [
                'required' => ":attribute không được bỏ trống",
                'max' => ':attribute không được vượt quá :max kí tự',
                'unique' => ":attribute đã tồn tại trên hệ thống",
                'email' => 'Không đúng định dạng email',
                'confirmed' => ":attribute nhập lại không khớp"
            ],
            [
                'fullname' => 'Họ và tên',
                'email' => 'Email',
                'password' => 'Mật khẩu'
            ]
        );
        $active_token = md5($request->email . time());
        User::create([
            'name' => $request->input('fullname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'active_token' => $active_token,
        ]);
        $data = array(
            'name' => "$request($request->input('fullname'))",
            'link_active' => "/user/active/?active=$active_token",
        );
        Mail::to($request->input('email'))->send(new ActiveUserMail($data));

        return redirect()->route('login')->with('status', "Vui lòng vào Gmail để kích hoạt tài khoản");
    }

    function active(Request $request)
    {
        $get_active = $request->input('active');
        echo $get_active . "<br>";
        $users = User::get();
        foreach ($users as $user) {
            if (($user->active_token == $get_active) && ($user->is_active == 0)) {
                User::where('active_token', $get_active)->update([
                    'is_active' => 1,
                ]);
                return redirect()->route('user.login')->with('status', "kích hoạt tài khoản thành công");
            }
        }
        return redirect()->route('login')->with('status', "kích hoạt không thành công hoặc tài khoản đã được kích hoạt trước đó");
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
