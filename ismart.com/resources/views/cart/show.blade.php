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
                        <a href="" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(Cart::content() as $row)
                        <tr>
                            <td>{{$row->options->code}}</td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="{{asset($row->options->thumbnail)}}" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="" title="" class="name-product">{{$row->name}}</a>
                            </td>
                            <td>{{number_format($row->price,0,',','.')}}đ</td>
                            <td>
                                <input type="number" min='1' max="{{$row->options->total_product}}" class="quantity" style="width:50px; text-align: center" value="{{$row->qty}}" data-row-id="{{$row->rowId}}">
                            </td>
                            <td class="subtotal">{{currency_format($row->total)}}đ</td>
                            <td>
                                <a href="{{route('cart.delete',$row->rowId)}}" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                Không có sản phẩm nào trong giỏ hàng!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    @if(Cart::total() > 0)
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span class="total">{{Cart::total()}}đ</span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="{{route('cart.checkout')}}" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <a href="{{url('/')}}" title="" id="buy-more">Mua tiếp</a><br />
                <a href="{{route('cart.destroy')}}" title="" id="delete-cart">Xóa toàn bộ giỏ hàng</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('change', '.quantity', function() {
        var rowId = $(this).data('row-id');
        var quantity = $(this).val();
        var $this = $(this); // Lưu trữ tham chiếu

        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                rowId: rowId,
                quantity: quantity
            },
            success: function(response) {
                // Cập nhật lại tổng và thành tiền
                $this.closest('tr').find('.subtotal').text(response.subtotal);
                $('.total').text(response.total);
                $('.count_cart').text(response.count);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
</script>
@endsection