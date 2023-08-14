<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminDashBoardController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         session(['module_active' => 'dashboard']);
    //         return $next($request);
    //     });
    // }

    function index(){
        #tính tổng các trang thái đơn hàng
        $count_order = array();
        $count_order['success'] = Order::where('status',3)->get()->count();
        $count_order['cancelled'] = Order::where('status',4)->get()->count();
        $count_order['transport'] = Order::where('status',1)->get()->count();
        $count_order['handle'] = Order::where('status',0)->get()->count();
        $count_order['all'] = Order::get()->count();
        # tính tổng doanh thu
        $count_order['sales'] = Order::where('status',3)->sum('total_price');
        #lấy danh sách các đơn chờ xử lý
        $orders= Order::where('status',0)->paginate(8);
        // return view('admin.index',compact('orders','count_order'));
        return view('admin.index' ,compact('orders','count_order'));
    }
}
