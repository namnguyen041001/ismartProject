@extends('layouts.client')
@section('content')
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">{{$parentCategory->name}}</h3>
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
                            @if($product->total_product >0)
                            <div class="action clearfix">
                                <a href="{{route('cart.add', $product->id)}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="{{route('cart.buyNow', $product->id)}}" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                            @else
                            <div class="text-center">
                                <span class="text-danger font-weight-bold">Hết hàng</span>
                            </div>
                            @endif
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
                        @foreach($best_selling as $item)
                        @php
                        $slug_product = Str::slug($item->product->name);
                        @endphp
                        <li class="clearfix">
                            <a href="{{route('product.detail',['slug'=>$slug_product,'id'=>$item->product->id])}}" title="" class="thumb fl-left">
                                <img src="{{asset($item->product->thumbnail)}}" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="{{route('product.detail',['slug'=>$slug_product,'id'=>$item->product->id])}}" title="" class="product-name">{{$item->product->name}}</a>
                                <div class="price">
                                    @if($item->sale_price)
                                    <span class="new">{{number_format($item->product->sale_price,0,'','.')}}đ</span>
                                    <span class="old"> {{number_format($item->product->price,0,'','.')}}đ</span>
                                    @else
                                    <span class="new"> {{number_format($item->product->price,0,'','.')}}đ</span>
                                    @endif
                                </div>
                                @if($item->product->total_product >0)
                                <div class="action clearfix">
                                    <a href="{{route('cart.buyNow', $item->product->id)}}" title="" class="buy-now">Mua ngay</a>
                                </div>
                                @else
                                <div class="">
                                    <span class="text-danger font-weight-bold">Hết hàng</span>
                                </div>
                                @endif

                            </div>
                        </li>
                        @endforeach
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