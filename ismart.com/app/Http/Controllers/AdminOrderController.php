<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request;
use App\Models\Order;


class AdminOrderController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'sales']);
            return $next($request);
        });
    }
    function show(Request $request)
    {
        if($request->input('status') == 'handle'){
            $order =  Order::where('status',0)->paginate(10);
        }elseif($request->input('status') == 'transport'){
            $order =  Order::where('status',1)->paginate(10);
        }elseif($request->input('status') == 'success'){
            $order =  Order::where('status',3)->paginate(10);
        }elseif($request->input('status') == 'cancel'){
            $order =  Order::where('status',2)->paginate(10);
        }elseif($request->input('status') == 'cancelled'){
            $order =  Order::where('status',4)->paginate(10);
        }elseif($request->input('btn-search')){
            $search_users = $request->input('search_users');
            $order = Order::where('code', 'LIKE', "%{$search_users}%")->paginate(10);
        }else{
            $order =  Order::with('Order_detail')->orderBy('status')->paginate(10);
        }

        #tính tổng các trang thái đơn hàng
        $count_order = array();
        $count_order['success'] = Order::where('status',3)->get()->count();
        $count_order['cancel'] = Order::where('status',2)->get()->count();
        $count_order['cancelled'] = Order::where('status',4)->get()->count();
        $count_order['transport'] = Order::where('status',1)->get()->count();
        $count_order['handle'] = Order::where('status',0)->get()->count();
        $count_order['all'] = Order::get()->count();
        # tính tổng doanh thu
        $count_order['sales'] = Order::where('status',3)->sum('total_price');
        return view('admin.order.show',compact('order','count_order'));
    }

    function edit($id)
    {
        // $order = Order::where('id',$id)->with('Order_detail')->get();
        $order = Order::find($id);
        $order_detail = Order::find($id)->Order_detail;
        return view('admin.order.edit', compact('order', 'order_detail'));
    }
    function update(Request $request, $id)
    {
        Order::where('id',$id)->update(
            [
                'status'=>$request->input('status'),
            ]
            );
        return back();
    }

    function delete($id){
        Order::where('id',$id)->delete();
        return back();
    }
}
