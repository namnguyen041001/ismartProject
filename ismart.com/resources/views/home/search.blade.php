@extends('layouts.client')
@section('content')
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Kết quả tìm kiếm cho từ khóa '<span style="color: red;">{{$search_product}}</span>'</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @forelse($products as $key => $product)
                        @php
                        $slug_product = Str::slug($product->name);
                        @endphp
                        <li>
                            <a href="{{route('product.detail',['slug'=>$slug_product,'id'=>$product->id])}}" title="" class="thumb">
                                <img src="{{asset($product->thumbnail)}}">
                            </a>
                            <a href="{{route('product.detail',['slug'=>$slug_product,'id'=>$product->id])}}" title="" class="product-name">{{$product->name}}</a>
                            <div class="price">
                                @if($product->sale_price)
                                <span class="new">{{$product->sale_price}}</span>
                                <span class="old">{{$product->price}}</span>
                                @else
                                <span class="new">{{$product->price}}</span>
                                @endif
                            </div>
                            <div class="action clearfix">
                                <a href="{{route('cart.add', $product->id)}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="{{route('cart.buyNow', $product->id)}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        @empty
                        <li>
                            <p>Không có sản phẩm nào!</p>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    {!! $list_cat !!}
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="{{asset('images/img-pro-13.png')}}" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Laptop Asus A540UP I5</a>
                                <div class="price">
                                    <span class="new">5.190.000đ</span>
                                    <span class="old">7.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="{{asset('images/banner.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT  -->
@endsection