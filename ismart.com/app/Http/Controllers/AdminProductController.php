<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categor;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'product']);
            return $next($request);
        });
    }

    function list(Request $request)
    {
        if ($request->input('status') == 'public') {
            $products = Product::where('status',1)->paginate(10);
        }elseif($request->input('status') == 'private'){
            $products = Product::where('status',0)->paginate(10);
        }elseif($request->input('btn-search')){
            $search_users = $request->input('search_users');
            $products = Product::where('name', 'LIKE', "%{$search_users}%")->paginate(10);
        }else{
            $products = Product::paginate(10);
        }
        #tính tổng các trang thái Product
        $count_product = array();
        $count_product['all'] = Product::get()->count();
        $count_product['private'] = Product::where('status',0)->get()->count();
        $count_product['public'] = Product::where('status',1)->get()->count();
        return view('admin.product.list', compact('products','count_product'));
    }

    function hasChild($data, $id)
    {
        foreach ($data as $v) {
            if ($v['parent_id'] == $id)
                return true;
        };
        return false;
    }
    function data_tree($data, $parent_id = 0, $level = 0)
    {
        $result = array();
        foreach ($data as $v) {
            if ($v['parent_id'] == $parent_id) {
                $v['level'] = $level;
                $result[] = $v;
                if ($this->hasChild($data, $v['id'])) {
                    $result_child = $this->data_tree($data, $v['id'], $level + 1);
                    $result = array_merge($result, $result_child);
                }
            }
        }
        return $result;
    }

    function add()
    {
        $data =  Categor::get();
        $categories =  $this->data_tree($data);
        return view('admin.product.add', compact('categories'));
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'code' => 'required|max:80|min:3',
                'name' => 'required|max:80|min:5',
                'price' => 'required|max:20',
                'price_sale' => 'max:20',
                'file' => 'required|file|image|mimes:jpeg,png,gif',
                'total_product'=>'required|integer',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'max' => ':attribute phải ít hơn:max kí tự',
                'min' => ':attribute phải nhiều hơn :min kí tự',
                'mimes' => 'Đuôi file không đúng định dạng',
                'integer' => ':attribute nhập vào phải là số nguyên',
            ],
            [
                'name' => 'Tên sản phẩm',
                'price' => 'Giá sản phẩm',
                'price_sale' => 'Giảm giá',
                'file' => 'File',
                'code' => "Mã sản phẩm",
                'total_product'=>'Số lượng',
            ],
        );
        if ($request->hasFile('file')) {
            $file = $request->file;
            // lấy tên file:
            $file_name = $file->getClientOriginalName();
            $path =  $file->move('public/uploads', $file->getClientOriginalName());
            $thumbnail = 'uploads/' . $file_name;

            Product::create([
                'code' => $request->input('code'),
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'sale_price' => $request->input('price_sale'),
                'dess' => $request->input('dess'),
                'detail' => $request->input('detail'),
                'thumbnail' => $thumbnail,
                'categor_id' => $request->input('cat'),
                'featured' => $request->input('featured'),
                'status' => $request->input('status'),
                'total_product' => $request->input('total_product'),
            ]);
            return redirect()->route('admin.product.list')->with('status', "Thêm sản phẩm thành công");
        } else {
            return redirect()->route('admin.product.list')->with('status', "Thêm sản phẩm không thành công");
        }
    }

    function update(Product $product)
    {
        $data =  Categor::get();
        $categories =  $this->data_tree($data);
        return view('admin.product.update', compact('categories', 'product'));
    }

    function edit(Request $request, Product $product)
    {
        $request->validate(
            [
                'code' => 'required|max:80|min:3',
                'name' => 'required|max:80|min:5',
                'price' => 'required|max:20',
                'price_sale' => 'max:20',
                'total_product'=>'integer|nullable',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'max' => ':attribute phải ít hơn:max kí tự',
                'min' => ':attribute phải nhiều hơn :min kí tự',
                'integer' => ':attribute nhập vào phải là số nguyên',
            ],
            [
                'code' => "Mã sản phẩm",
                'name' => 'Tên sản phẩm',
                'price' => 'Giá sản phẩm',
                'price_sale' => 'Giảm giá',
                'total_product'=>'Số lượng',
            ],
        );

        $product_in_stock = $product->total_product;


        $product->update([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'sale_price' => $request->input('price_sale'),
            'dess' => $request->input('dess'),
            'detail' => $request->input('detail'),
            'categor_id' => $request->input('cat'),
            'featured' => $request->input('featured'),
            'status' => $request->input('status'),
            'total_product' =>($request->input('total_product'))? $product_in_stock + ($request->input('total_product')): $product_in_stock,
        ]);
        return redirect()->route('admin.product.list')->with('status', "Cập nhật sản phẩm thành công");
    }

    function delete(Product $product){
        $product->delete();
        return redirect()->route('admin.product.list')->with('status', "Xóa sản phẩm thành công");
    }
}
