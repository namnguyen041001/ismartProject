<?php

namespace App\Http\Controllers;

use App\Mail\OrderSuccess;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    function show()
    {
        return view('cart.show');
    }

    function add(Request $request, $id)
    {
        $product = Product::find($id);
        
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => ($request->input('num-order')) ? $request->input('num-order') : 1,
            'price' => $product->sale_price ? $product->sale_price : $product->price,
            'options' => ['thumbnail' => $product->thumbnail,'code' => $product->code,'total_product'=>$product->total_product]
        ]);
        return redirect()->route('cart.show');
    }

    public function update(Request $request)
    {
        $rowId = $request->input('rowId');
        $quantity = $request->input('quantity');

        Cart::update($rowId, $quantity);

        $subtotal = Cart::get($rowId)->subtotal;
        $total = Cart::total();
        $count = Cart::count();

        return response()->json([
            'subtotal' => number_format($subtotal,0,',','.')."đ",
            'total' => $total."đ",
            'count' =>$count,
        ]);
    }

    function buyNow($id){
        $product = Product::find($id);
        Cart::instance('buyNow')->destroy();
        Cart::instance('buyNow')->add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->sale_price ? $product->sale_price : $product->price,
            'options' => ['thumbnail' => $product->thumbnail,'code' => $product->code]
        ]);
        return view('cart.buyNow');
    }
    function storeByNow(Request $request){
        $request->validate(
            [
                'fullname' =>'required|max:255',
                'address' =>'required|max:255',
                'phone' =>'required|max:255',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'max' => ":attribute phải ít hơn :max kí tự"
            ],
            [
                'fullname' =>'Họ tên',
                'address' =>'Địa chỉ',
                'phone' =>'Số điện thoại',
            ]
        );
        $email = $request->input('email');
        #update lại thêm thông tin địa chỉ, sđt
        User::where('email',$email)->update([
            'address'=> $request->input('address'),
            'phone'=> $request->input('phone')
        ]);

        #add bảng order
        $id_account = Auth::user()->id;
        $total_price =str_replace([',', '.'], '', Cart::instance('buyNow')->total());  // loại bỏ các dấu .,
        $orderCode = 'DH#' .time() . rand(1,99);
        $order =  Order::create([
            'code'=> $orderCode,
            'id_account' => $id_account,
            'total_price' => $total_price,
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'note' =>$request->input('note') ,
        ]);
        
        #add bảng order_details:
        $order_id = $order->id;
        foreach(Cart::instance('buyNow')->content() as $item){
            Order_detail::create(
                [
                    'id_order' => $order_id,
                    'id_product' => $item->id,
                    'price' => $item->price,
                    'quantity' => $item->qty,
                ]);
                Product::where('id', $item->id)->decrement('total_product', $item->qty);
        }
        Cart::destroy();
        return redirect()->route('cart.orderSuccess');
    }

    function delete($rowId){
        Cart::remove($rowId);
        return redirect()->route('cart.show');
    }

    function destroy(){
        Cart::destroy();
        return redirect()->route('cart.show');
    }
#Phần xử lý đặt hàng
    function checkout(){
        return view('cart.checkout');
    }

    function store(Request $request){
        $request->validate(
            [
                'fullname' =>'required|max:255',
                'address' =>'required|max:255',
                'phone' =>'required|max:255',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'max' => ":attribute phải ít hơn :max kí tự"
            ],
            [
                'fullname' =>'Họ tên',
                'address' =>'Địa chỉ',
                'phone' =>'Số điện thoại',
            ]
        );
        $email = $request->input('email');
        #update lại thêm thông tin địa chỉ, sđt
        User::where('email',$email)->update([
            'address'=> $request->input('address'),
            'phone'=> $request->input('phone')
        ]);

        #add bảng order
        $id_account = Auth::user()->id;
        $total_price =str_replace([',', '.'], '', Cart::total());  // loại bỏ các dấu .,
        $orderCode = 'DH#' .time() . rand(1,99);
        $order =  Order::create([
            'code'=> $orderCode,
            'id_account' => $id_account,
            'total_price' => $total_price,
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'note' =>$request->input('note') ,
        ]);
        
        #add bảng order_details:
        $order_id = $order->id;
        $carts = Cart::content();
        foreach($carts as $item){
            Order_detail::create(
                [
                    'id_order' => $order_id,
                    'id_product' => $item->id,
                    'price' => $item->price,
                    'quantity' => $item->qty,
                ]);
                Product::where('id', $item->id)->decrement('total_product', $item->qty); // decrement('total_product', $item->qty); giảm số lượng  = $item->qty tại trường total_produts
        }
        Cart::destroy();

        return redirect()->route('cart.orderSuccess');
    }
    
    function orderSuccess(){
        $id_user = Auth::user()->id;
        $email = Auth::user()->email;
        $firstOrder = Order::where('id_account',$id_user)->orderBy('created_at', 'desc')->first();
        $order_detail = $firstOrder->Order_detail;
        $data  = [
			'firstOrder' => $firstOrder,
			'order_detail' => $order_detail,
        ];
        Mail::to($email)->send(new OrderSuccess($data));
        return view('cart.orderSuccess', compact('firstOrder','order_detail'));
    }
}
