@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm người dùng
        </div>
        <div class="card-body">
            <form action="{{route('admin.user.update',$user)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input class="form-control" type="text" name="name" value="{{$user->name}}" id="name">
                </div>
                @error('name')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" value="{{$user->email}}" name="email" id="email" readonly="readonly">
                </div>
                @error('email')
                <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="form-group">
                <label for="">Nhóm quyền</label>
                    <select multiple name="roles[]" class="form-control" id="">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" @if(in_array($role->id,$user->roles->pluck('id')->toArray())) selected @endif>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" value="Cập nhật" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection