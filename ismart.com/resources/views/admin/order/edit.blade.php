@extends('layouts.admin')
@section('content')
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">

                    <li>
                        <h3 class="title">Người nhận hàng</h3>

                        <span class="detail">{{ $order->User->name }}</span>
                    </li>
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail">{{ $order->code }}</span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail">{{ $order->address }}</span>
                    </li>
                    <li>
                        <h3 class="title">Hinh thức thanh toán</h3>
                        <span class="detail">Thanh toán tại nhà</span>
                    </li>
                    <li>
                        <h3 class="title">Ghi chú:</h3>
                        <span class="detail">{{ $order->note }}</span>
                    </li>
                    <form method="POST" action="{{route('admin.order.update',$order->id)}}">
                        @csrf
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3><br>
                            <select name="status">
                                <option @if($order->status == 0) selected @endif value='0'>Chờ xử lý</option>
                                <option @if($order->status == 1) selected @endif value='1'>Đang vận chuyển</option>
                                <option @if($order->status == 2) selected @endif value='2'>Chờ hủy</option>
                                <option @if($order->status == 3) selected @endif value='3'>Thành công</option>
                                <option @if($order->status == 4) selected @endif value='4'>Đã Hủy</option>
                            </select>
                            <input type="submit" id="status_order" name="sm_status" class="btn-primary" value="Cập nhật đơn hàng">
                        </li>
                    </form>

                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $quantity = 0;
                            @endphp
                            @foreach($order_detail as $key => $item)
                            <tr>
                                <td class="thead-text">{{++$key}}</td>
                                <td class="thead-text">
                                    <div class="thumb">
                                        <img style="width:100px;height:auto;" src="{{asset($item->product->thumbnail)}}" alt="">
                                    </div>
                                </td>
                                <td class="thead-text">{{$item->product->name}}</td>
                                <td class="thead-text">{{number_format($item->price,0,',','.')}}</td>
                                <td class="thead-text">{{$item->quantity}}</td>
                                <td class="thead-text">{{number_format($item->price * $item->quantity,0,',','.')}} VNĐ</td>
                                @php
                                $quantity += $item->quantity
                                @endphp
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <div id="order-amount" class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng:</span>
                            <span class="total">{{$quantity}} sản phẩm</span>
                        </li>
                        <li>
                            <span class="total-fee">Tổng đơn hàng:</span>
                            <span class="total">{{number_format($order->total_price,0,',','.')}} VNĐ</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection