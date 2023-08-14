@extends('layouts.client')
@section('content')
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Đặt hàng thành công</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div style="line-height: 35px;" class="col-md-7">
                    <div class="alert text-center" role="alert">
                        <h3 class="order-success">ĐẶT HÀNG THÀNH CÔNG!</h3>
                        <p>Cảm ơn bạn đã đặt hàng. Chúng tôi đã nhận được đơn hàng của bạn thành công.</p>
                        <!-- <hr> -->
                        <p class="">Chúng tôi sẽ gửi sản phẩm đến bạn trong thời gian nhanh nhất.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="mb-3 font-weight-bold">Mã Đơn: <span class="font-weight-normal">{{$firstOrder->code}}</span></p>
                    <div id="info-customer" class="mb-4">
                        <h1 class="mb-3 font-weight-bold">Thông tin khách hàng</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$firstOrder->User->name}}</td>
                                    <td>{{$firstOrder->address}}</td>
                                    <td>{{$firstOrder->User->email}}</td>
                                    <td>{{$firstOrder->phone}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="info-order">
                        <h1 class="mb-3 font-weight-bold">Thông tin sản phẩm</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order_detail as $key => $item)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img style="width:100px; height:auto;" src="{{asset($item->product->thumbnail)}}" alt=""></td>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{number_format($item->price,0,',','.')}}đ</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{number_format($item->price * $item->quantity,0,',','.')}}đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="mt-3 font-weight-bold">Tổng tiền: <span>{{number_format($firstOrder->total_price,0,',','.')}}VNĐ</span></p>
                    </div>
                </div>
            </div>
            <div id="redirect" class="justify-content-center text-center">
                <a class="d-inline-block" href="">Danh sách đơn hàng </a>
                <a class="d-inline-block" href="{{url('/')}}"> Trang chủ</a>
            </div>

        </div>
    </div>
</div>

@endsection