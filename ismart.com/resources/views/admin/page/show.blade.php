@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="" class="text-primary">Tất cả<span class="text-muted">(10)</span></a>
                <a href="" class="text-primary">Chờ duyệt<span class="text-muted">(10)</span></a>
                <a href="" class="text-primary">Công khai<span class="text-muted">(5)</span></a>
            </div>
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

                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Slug</th>

                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $key => $page)
                    <tr class="">
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>{{++$key}}</td>
                        <td><a href="">{{$page->name}}</a></td>
                        <td>{{$page->slug}}</td>

                        @if($page->status == 0)
                        <td><span class="badge badge-warning">Chờ duyệt</span></td>
                        @else
                        <td><span class="badge badge-success">Public</span></td>
                        @endif
                        <td>
                            <a href="" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>Không có sản phẩm nào</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection
@endsection