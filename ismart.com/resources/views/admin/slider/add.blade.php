@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm bài viết
        </div>
        <div class="card-body">
            <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                @csrf  
                <div class="form-group">
                    <label for="name">Tiêu đề Slider</label>
                    <input class="form-control" type="text" name="name" value="{{old('name')}}"  id="name">
                </div>
                @error('name')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="intro">Ảnh Slider:</label><br>
                    <input type="file" name="file" id="intro">
                </div>
                @error('file')
                <p style="color: red;">{{$message}}</p>
                @enderror

                @error('cat_post')
                <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="form-group">
                    <label for="name">Thứ tự Slider</label>
                    <input class="form-control" type="text" name="ordinal_number" value=""  id="name">
                </div>
                @error('ordinal_number')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="0" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Chờ duyệt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Công khai
                        </label>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@endsection