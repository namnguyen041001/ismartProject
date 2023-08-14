@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách vai trò</h5>
        </div>
        <div class="card-body">
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            @if(session('status'))
            <small class="btn btn-success">{{session('status')}}</small>
            @endif
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">STT</th>
                        <th scope="col">Vai trò</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $key => $role)
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td scope="row">{{++$key}}</td>
                        <td><a href="">{{$role->name}}</a></td>
                        <td>{{$role->description}}</td>
                        <td>{{date('Y-m-d', strtotime($role->created_at))}}</td>
                        <td>
                            <a href="{{route('admin.role.edit', $role->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{route('admin.role.delete', $role->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection