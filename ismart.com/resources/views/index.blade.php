@extends('layouts.client')
@section('content')
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    @foreach($sliders as $slider)
                    <div class="item">
                        <img src="{{asset($slider->thumbnail)}}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($product_featured as $item)
                        @php
                        $slug_product = Str::slug($item->name);
                        @endphp
                        <li>
                            <a href="{{route('product.detail',['slug'=>$slug_product,'id'=>$item->id])}}" title="" class="thumb">
                                <img src="{{asset($item->thumbnail)}}">
                            </a>
                            <a href="{{route('product.detail',['slug'=>$slug_product,'id'=>$item->id])}}" title="" class="product-name">{{$item->name}}</a>
                            <div class="price">
                                @if($item->sale_price)
                                <span class="new">{{number_format($item->sale_price,0,'','.')}}đ</span>
                                <span class="old"> {{number_format($item->price,0,'','.')}}đ</span>
                                @else
                                <span class="new"> {{number_format($item->price,0,'','.')}}đ</span>
                                @endif
                            </div>
                            @if($item->total_product >0)
                            <div class="action clearfix">
                                <a href="{{route('cart.add', $item->id)}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="{{route('cart.buyNow', $item->id)}}" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                            @else
                            <div>
                                <span class="text-danger font-weight-bold">Hết hàng</span>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach($list_phone as $phone)
                        @php
                        $slug_phone = Str::slug($phone->name);
                        @endphp
                        <li>
                            <a href="{{route('product.detail',['slug'=>$slug_phone,'id'=>$phone->id])}}" title="" class="thumb">
                                <img src="{{asset($phone->thumbnail)}}">
                            </a>
                            <a href="{{route('product.detail',['slug'=>$slug_phone,'id'=>$phone->id])}}" title="" class="product-name">{{($phone->name)}}</a>
                            <div class="price">
                                @if($phone->sale_price)
                                <span class="new">{{number_format($phone->sale_price,0,'','.')}}đ</span>
                                <span class="old"> {{number_format($phone->price,0,'','.')}}đ</span>
                                @else
                                <span class="new"> {{number_format($phone->price,0,'','.')}}đ</span>
                                @endif
                            </div>
                            @if($phone->total_product >0)
                            <div class="action clearfix">
                                <a href="{{route('cart.add', $phone->id)}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="{{route('cart.buyNow', $phone->id)}}" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                            @else
                            <div class="text-center">
                                <span class="text-danger font-weight-bold">Hết hàng</span>
                            </div>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach($list_computer as $computer)
                        @php
                        $slug_computer = Str::slug($computer->name);
                        @endphp
                        <li>
                            <a href="{{route('product.detail',['slug'=>$slug_computer,'id'=>$computer->id])}}" title="" class="thumb">
                                <img src="{{asset($computer->thumbnail)}}">
                            </a>
                            <a href="{{route('product.detail',['slug'=>$slug_computer,'id'=>$computer->id])}}" title="" class="product-name">{{($computer->name)}}</a>
                            <div class="price">
                                @if($computer->sale_price)
                                <span class="new">{{number_format($computer->sale_price,0,'','.')}}đ</span>
                                <span class="old"> {{number_format($computer->price,0,'','.')}}đ</span>
                                @else
                                <span class="new"> {{number_format($computer->price,0,'','.')}}đ</span>
                                @endif
                            </div>
                            @if($computer->total_product >0)
                            <div class="action clearfix">
                                <a href="{{route('cart.add', $computer->id)}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="{{route('cart.buyNow', $computer->id)}}" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                            @else
                            <div class="text-center">
                                <span class="text-danger font-weight-bold">Hết hàng</span>
                            </div>
                            @endif
                        </li>
                        @endforeach
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
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT  -->

</script>

@endsection