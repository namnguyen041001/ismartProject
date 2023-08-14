@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Thêm Danh Mục
                </div>
                <div class="card-body">
                    <form action="{{route('admin.catPost.edit',$cat->id)}}">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" value="{{$cat->name}}" type="text" name="name" id="name">
                        </div>
                        @error('name')
                        <p style="color: red;">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <small class="form-text text-muted pb-2">(Để trống để tạo slug mặc định)</small>
                            <input class="form-control" type="text" name="slug" value="" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="cat">Danh mục cha</label>
                            <select class="form-control" id="cat" name="parent_cat">
                                <option value="0">--Chọn--</option>
                                @forelse($listCat as $item)
                                <option @if($cat->parent_id == $item->id) selected @endif value="{{$item->id}}">{{str_repeat('|--',$item->level)}} {{$item->name}}</option>
                                @empty
                                <option value="0">--Chọn--</option>
                                @endforelse
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh sách quyền
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($listCat as $key => $item)
                            <tr>
                                <td scope="row">{{++$key}}</td>
                                <td>{{str_repeat('|--',$item->level)}} {{$item->name}}</td>
                                <td>{{$item->slug}}</td>
                                <td>
                                    <a href="{{route('admin.catPost.update',$item->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="" onclick="return confirm('Thêm thùng rác!')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">Không có danh mục nào</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection