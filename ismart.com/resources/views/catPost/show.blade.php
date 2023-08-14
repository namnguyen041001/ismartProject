@extends('layouts.client')
@section('content')
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">{{$title}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">{{$title}}</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($posts as $post)
                        <li class="clearfix">
                            <a href="{{route('post.detail', $post->slug)}}" title="" class="thumb fl-left">
                                <img src="{{asset($post->thumbnail)}}" alt="">
                                <!-- public/images/img-post-01.jpg -->
                            </a>
                            <div class="info fl-right">
                                <a href="{{route('post.detail', $post->slug)}}" title="" class="title">{{$post->title}}</a>
                                <span class="create-date">{{$post->created_at->format('Y-m-d')}}</span>
                                <p style="font-size: 14px;font-weight: 600;">Chuyên mục: <span>{{$post->Cat_post->name}}</span> </p>
                                <p class="desc">{!! substr($post->detail, 0, 300)!!}...</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
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

                                <a href="{{route('cart.buyNow', $item->product->id)}}" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_blog_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection