@extends('layouts.client')
@section('content')
<div id="wrapper-form-login">
    <h1>ĐĂNG Kí</h1>
    <form id="form-login" action="{{route('user.store')}}" method="POST">
        @csrf
        <input type="text" name="fullname" id="fullname" value="" placeholder="Họ và tên">
        @error('fullname')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <input type="email" name="email" id="email" value="" placeholder="Email">
        @error('email')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <input type="password" name="password" id="password" value="" placeholder="Mật khẩu">
        @error('password')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <input type="password" name="password_confirmation" id="password" value="" placeholder="Xác nhận mật khẩu">
        <input type="submit" name="btn-reg" id="submit" value="Đăng kí"><br />
    </form>
    <a href="{{route('login')}}">Đăng nhập</a><br>
    <a href="">Quên mật khẩu</a>
</div>
@endsection