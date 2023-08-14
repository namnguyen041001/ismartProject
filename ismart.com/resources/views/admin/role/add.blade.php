@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Thêm mới vai trò</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('admin.role.store')}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label class="text-strong" for="name">Tên vai trò</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                @error('name')
                <small class="text-danger">{{$message}}</small><br>
                @enderror
                <div class="form-group">
                    <label class="text-strong" for="description">Mô tả</label>
                    <textarea class="form-control" type="text" name="description" id="description"></textarea>
                </div>
                @error('description')
                <small class="text-danger">{{$message}}</small><br>
                @enderror
                <strong>Vai trò này có quyền gì?</strong>
                <small class="form-text text-muted pb-2">Check vào module hoặc các hành động bên dưới để chọn quyền.</small>
                <!-- List Permission  -->
                @foreach($permissions as $key => $permission)
                <div class="card my-4 border">
                    <div class="card-header">
                        <input type="checkbox" class="check-all" name="" id="{{$key}}">
                        <label for="{{$key}}" class="m-0"><strong>Module {{ucfirst($key)}}</strong></label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($permission as $item)
                            <div class="col-md-3">
                                <input type="checkbox" class="permission" value="{{$item->id}}" name="permission_id[]" id="{{$item->slug}}">
                                <label for="{{$item->slug}}">{{ucwords($item->name)}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                <input type="submit" name="btn-add" class="btn btn-primary" value="Thêm mới">
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $('.check-all').click(function () {
        $(this).closest('.card').find('.permission').prop('checked', this.checked)
      })
</script>
@endsection