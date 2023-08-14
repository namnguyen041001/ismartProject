@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách đơn hàng</h5>
            <div class="form-search form-inline">
                <form action="#" method="GET">
                    <input type="text" class="form-control form-search" name="search_users" value="{{request()->input('search_users')}}" placeholder="Tìm kiếm theo mã đơn">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{route('admin.order.show')}}" class="text-primary">Tất cả<span class="text-muted">({{$count_order['all']}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'handle'])}}" class="text-primary">Chờ xử lý<span class="text-muted">({{$count_order['handle']}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'transport'])}}" class="text-primary">Đang vận chuyển<span class="text-muted">({{$count_order['transport']}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'success'])}}" class="text-primary">Thành công<span class="text-muted">({{$count_order['success']}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'cancel'])}}" class="text-primary">Chờ hủy<span class="text-muted">({{$count_order['cancel']}})</span></a>
                <a href="{{request()->fullUrlWithQuery(['status'=>'cancelled'])}}" class="text-primary">Đã hủy<span class="text-muted">({{$count_order['cancelled']}})</span></a>
                <a class="text-primary">Doanh số<span class="text-muted">({{number_format($count_order['sales'],0,',','.')}} VNĐ)</span></a>
            </div>
            <div class="form-action form-inline py-3">
                <select class="form-control mr-1" id="">
                    <option>Chọn</option>
                    <option>Tác vụ 1</option>
                    <option>Tác vụ 2</option>
                </select>
                <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="checkall">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Mã</th>
                        <th scope="col">Khách hàng</th>

                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $key => $item)
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>{{++$key}}</td>
                        <td>{{$item->code}}</td>
                        <td>
                            {{$item->User->name}} <br>
                            {{$item->phone}}
                        </td>

                        <td>
                            @php
                            $quantity = 0;
                            foreach($item->order_detail as $value)
                            $quantity += $value->quantity
                            @endphp

                            {{$quantity}}
                        </td>
                        <td>{{number_format($item->total_price,0,',','.')}}đ</td>
                        @if($item->status == 0)
                        <td><span class="badge badge-warning">Chờ xử lý</span></td>
                        @elseif($item->status == 1)
                        <td><span class="badge badge-primary">Đang vận chuyển</span></td>
                        @elseif($item->status == 2)
                        <td><span class="badge badge-danger">Chờ hủy</span></td>
                        @elseif($item->status == 3)
                        <td><span class="badge badge-success">Thành công</span></td>
                        @elseif($item->status == 4)
                        <td><span class="badge badge-danger">Đã hủy</span></td>
                        @endif
                        <td>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                        <td>
                            <a href="{{route('admin.order.edit',$item->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="{{route('admin.order.delete',$item->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$order->links()}}
        </div>
    </div>
</div>
@endsection