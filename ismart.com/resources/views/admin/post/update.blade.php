@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm bài viết
        </div>
        <div class="card-body">
            <form action="{{route('admin.post.edit',$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf  
                <div class="form-group">
                    <label for="name">Tiêu đề bài viết</label>
                    <input class="form-control" type="text" name="name" value="{{$post->title}}"  id="name">
                </div>
                @error('name')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="intro">Ảnh đại diện bài viết:</label><br>
                    <input type="file" name="file" id="intro">
                </div>
                @error('file')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="content">Nội dung bài viết</label>
                    <textarea name="content_post"  class="form-control textarea" id="content" cols="30" rows="5">{{$post->detail}}</textarea>
                </div>
                @error('content_post')
                <p style="color: red;">{{$message}}</p>
                @enderror


                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="cat_post" id="">
                        <option>--Chọn--</option>
                        @foreach($cat_post as $item)
                        <option @if($post->cat_post_id == $item->id) selected @endif value="{{$item->id}}">{{str_repeat('|--',$item->level)}} {{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('cat_post')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="0" @if($post->status == 0) checked @endif>
                        <label class="form-check-label" for="exampleRadios1">
                            Chờ duyệt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="1" @if($post->status == 1) checked @endif>
                        <label class="form-check-label" for="exampleRadios2">
                            Công khai
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection