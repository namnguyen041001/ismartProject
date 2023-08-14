@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm người dùng
        </div>
        <div class="card-body">
            <form action="{{route('admin.user.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                @error('name')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                @error('email')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="email">Mật khẩu</label>
                    <input class="form-control" type="password" name="password" id="email">
                </div>
                @error('password')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="email">Xác nhận mật khẩu</label>
                    <input class="form-control" type="password" name="password_confirmation" id="email">
                </div>

                <div class="form-group">
                    <label for="">Nhóm quyền</label>
                    <small class="form-text text-muted pb-2">(Bỏ trống nếu là khách hàng)</small>
                    <select class="form-control" multiple name="roles[]" id="">
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection