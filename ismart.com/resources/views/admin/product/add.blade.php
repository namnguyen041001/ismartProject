@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        <div class="card-body">
            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="code">Mã sản phẩm</label>
                    <input class="form-control" type="text" name="code" id="name">
                </div>
                @error('code')
                <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                @error('name')
                <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="form-group">
                    <label for="price">Giá</label>
                    <input class="form-control" type="text" name="price" id="price">
                </div>
                @error('price')
                <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="form-group">
                    <label for="price">Giảm giá</label>
                    <input class="form-control" type="text" name="price_sale" id="price">
                </div>
                @error('price_sale')
                <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="form-group">
                    <label for="total_product">Số lượng sản phẩm</label>
                    <input class="form-control" type="text" name="total_product" id="total_product">
                </div>
                @error('total_product')
                <p style="color: red;">{{$message}}</p>
                @enderror


                <div class="form-group">
                    <label for="intro">Mô tả sản phẩm</label>
                    <textarea name="dess" class="textarea form-control" id="intro" cols="20" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="intro">Chi tiết sản phẩm</label>
                    <textarea name="detail" class="textarea form-control" id="intro" cols="20" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="intro">Ảnh sản phẩm:</label><br>
                    <input type="file" name="file" id="intro">
                </div>
                @error('file')
                <p style="color: red;">{{$message}}</p>
                @enderror


                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="cat" id="">
                        @foreach($categories as $item)
                        <option value="{{$item->id}}">{{str_repeat('|--',$item->level)}} {{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('cat')
                <p style="color: red;">{{$message}}</p>
                @enderror
                
                <div class="form-group">
                    <label for="">Sản phẩm :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="featured" id="featured_product" value="0" checked>
                        <label class="form-check-label" for="featured_product">
                            Không nổi bật
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="featured" id="featured_product1" value="1">
                        <label class="form-check-label" for="featured_product1">
                            Nổi bật
                        </label>
                    </div>
                </div>
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