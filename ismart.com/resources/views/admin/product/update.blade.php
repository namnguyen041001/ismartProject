@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thêm sản phẩm
        </div>
        <div class="card-body">
            <form action="{{route('admin.product.edit',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="code">Mã sản phẩm</label>
                    <input class="form-control" type="text" name="code" value="{{$product->code}}" id="code">
                </div>
                @error('code')
                <p style="color: red;">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input class="form-control" type="text" name="name" value="{{$product->name}}" id="name">
                </div>
                @error('name')
                <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="form-group">
                    <label for="price">Giá</label>
                    <input class="form-control" type="text" name="price" value="{{$product->price}}" id="price">
                </div>
                @error('price')
                <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="form-group">
                    <label for="price_sale">Giảm giá</label>
                    <input class="form-control" type="text" name="price_sale" value="{{$product->sale_price}}" id="price_sale">
                </div>
                @error('price_sale')
                <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="form-group">
                    <label for="total_product">Số lượng sản phẩm <small class="text-muted pb-2"> ({{$product->total_product}} sản phẩm)</small></label>
                    <input class="form-control" type="text" name="total_product" placeholder="thêm số lượng sản phẩm" id="total_product">
                </div>

                <div class="form-group">
                    <label for="intro">Mô tả sản phẩm</label>
                    <textarea name="dess" class="textarea form-control" id="intro" cols="20" rows="5">{{$product->dess}}</textarea>
                </div>

                <div class="form-group">
                    <label for="intro">Chi tiết sản phẩm</label>
                    <textarea name="detail" class="textarea form-control" id="intro" cols="20" rows="5">{{$product->detail}}</textarea>
                </div>
                @error('file')
                <p style="color: red;">{{$message}}</p>
                @enderror


                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="cat" id="">
                        @foreach($categories as $item)
                        <option @if($product->categor_id == $item->id) selected @endif value="{{$item->id}}">{{str_repeat('|--',$item->level)}} {{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('cat')
                <p style="color: red;">{{$message}}</p>
                @enderror

                <div class="form-group">
                    <label for="">Sản phẩm :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="featured" id="exampleRadios1" value="0" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Không nổi bật
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="featured" id="exampleRadios2" value="1">
                        <label class="form-check-label" for="exampleRadios2">
                            Nổi bật
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="0" @if($product->status == 0) checked  @endif>
                        <label class="form-check-label" for="exampleRadios1">
                            Chờ duyệt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="1" @if($product->status == 1) checked  @endif>
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