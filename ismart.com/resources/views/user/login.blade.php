@extends('layouts.client')
@section('content')
<div id="wrapper-form-login">
    <h1>ĐĂNG NHẬP</h1>
    @if(session('status'))
    <small class="btn btn-success">{{session('status')}}</small>
    @endif
    <form id="form-login" action="{{route('user.checkLogin')}}" method="POST">
        @csrf
        <input type="email" name="email" id="email" value="" placeholder="Email">
        @error('email')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <input type="password" name="password" id="password" value="" placeholder="Password">
        @error('password')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <input type="submit" name="btn-login" id="submit" value="Đăng Nhập"><br />
        <input type="checkbox" name="remember_me" value="true"> Ghi nhớ mật khẩu
    </form>
    <a href="?mod=users&action=resetPass">Quên mật khẩu</a>
    <p>Bạn chưa có tài khoản?<a href="{{route('user.add')}}"> Đăng ký</a></p>
</div>
@endsection