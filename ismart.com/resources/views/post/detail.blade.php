@extends('layouts.client')
@section('content')
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">{{$posts->Cat_post->name}}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">{{$posts->title}}</h3>
                </div>
                <div class="section-detail">
                    <span class="create-date">{{$posts->created_at->format('Y-m-d')}}</span>
                    <div class="detail">
                        {!! $posts->detail !!}
                    </div>
                </div>
            </div>
            <div class="section" id="social-wp">
                <div class="section-detail">
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <div class="g-plusone-wp">
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                    <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5"></div>
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
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection