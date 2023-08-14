@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách thành viên</h5>
            @if(session('status'))
            <small class="btn btn-success">{{session('status')}}</small>
            @endif
            <div class="form-search form-inline">
                <form action="#" method="GET">
                    <input type="" name="search_users" class="form-control form-search" value="{{request()->input('search_users')}}" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        
        <div class="card-body">
            <div class="analytic">
                <a href="{{request()->fullUrlWithQuery(['status'=>'active'])}}" class="text-primary">Tài khoản<span class="text-muted">({{$total_user_active}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'trash'])}}" class="text-primary">Thùng rác<span class="text-muted">({{$total_user_trash}})</span></a>
            </div>
            <form action="{{route('admin.user.action')}}">
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" name="act">
                        <option>Chọn</option>
                        @if(request()->input('status') == 'trash')
                        <option value="restore">Khôi phục</option>
                        <option value="permanently_deleted">Xóa vĩnh viễn</option>
                        @else
                        <option value="delete">Thêm thùng rác</option>
                        <option value="permanently_deleted">Xóa vĩnh viễn</option>
                        @endif
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="checkall">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Quyền</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $key => $user)
                        <tr>
                            <td>
                                <input type="checkbox" name="list_check[]" value="{{$user->id}}">
                            </td>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($user->roles as $role)
                                <span class="badge badge-warning">{{$role->name}}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                @if(Auth::id() != $user->id)
                                <a href="{{route('admin.user.delete',$user->id)}}" onclick="return confirm('Thêm thùng rác!')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Không tồn tại người dùng!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection