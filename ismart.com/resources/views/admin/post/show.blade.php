@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách bài viết</h5>
            <div class="form-search form-inline">
            <form action="#" method="GET">
                    <input type="text" class="form-control form-search" name="search_users" value="{{request()->input('search_users')}}" placeholder="Tìm kiếm tên tiêu đề">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
            <a href="{{route('admin.post.show')}}" class="text-primary">Tất cả<span class="text-muted">({{$count_post['all']}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'public'])}}" class="text-primary">Công khai<span class="text-muted">({{$count_post['public']}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'private'])}}" class="text-primary">Chờ duyệt<span class="text-muted">({{ $count_post['private']}})</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Người đăng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $key => $value)
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td scope="row">{{++$key}}</td>
                        <td><img style="width: 100px; height: auto;" src="{{asset($value->thumbnail)}}" alt=""></td>
                        <td><a href="{{route('admin.post.update',$value->id)}}">{{ substr($value->title, 0, 30)}}...</a></td>
                        <td>{{$value->Cat_post->name}}</td>
                        <td>{{$value->User->name}}</td>
                        @if($value->status == 0)
                        <td><span class="badge badge-warning">Chờ duyệt</span></td>
                        @else
                        <td><span class="badge badge-success">Công khai</span></td>
                        @endif
                        <td>
                            <a href="{{route('admin.post.update',$value->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{route('admin.post.delete',$value->id)}}" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Không có bài viết nào!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection