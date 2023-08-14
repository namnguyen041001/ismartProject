<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categor;
use App\Models\Product;
use App\Http\Controllers\CatergoryController;
use App\Models\Cat_post;
use App\Models\Order_detail;
use App\Models\Slider;

class HomeController extends Controller
{


    function has_child($data, $id)
    {
        foreach ($data as $v) {
            if ($v['parent_id'] == $id)
                return true;
        };
        return false;
    }

    function render_menu($data, $parent_id = 0, $level = 0)
    {
        if ($level == 0)
            $result = "<ul class='list-item'>";
        else
            $result = "<ul class='sub-menu'>";

        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $result .= "<li>";
                // $result .= "<a href=route('home.category') title=''>{$item['name']}</a>";
                $result .= "<a href=" . route('home.category', $item->slug) . " title=''>{$item['name']}</a>";
                if ($this->has_child($data, $item['id'])) {
                    $result .= $this->render_menu($data, $item['id'], $level + 1);
                }
                $result .= "</li>";
            }
        }
        $result .= "</ul>";
        return $result;
    }

    function get_slug_child($data, $parent_id = 0)
    {
        $result = array();
        foreach ($data as $v) {
            if ($v['parent_id'] == $parent_id) {
                $result[] = $v['slug'];
                if ($this->has_child($data, $v['id'])) {
                    $result_child = $this->get_slug_child($data, $v['id'],);
                    $result = array_merge($result, $result_child);
                }
            }
        }
        return $result;
    }

    function index()
    {
        $data = Categor::get();
        #lấy danh mục của điện thoại
        $slugPhone = 'dien-thoai';
        $catPhone = Categor::where('slug', $slugPhone)->first();
        $list_slug_cat_phone = $this->get_slug_child($data, $catPhone->id);
        $list_slug_cat_phone[] = $slugPhone;
        #lấy danh mục của máy tính:
        $slugComputer = 'may-tinh';
        $catComputer = Categor::where('slug', $slugComputer)->first();
        $list_slug_cat_computer = $this->get_slug_child($data, $catComputer->id);
        $list_slug_cat_computer[] = $slugComputer;
        #lấy danh sách sản phẩm điện thoại:
        $list_phone = Product::where('status',1)->whereHas('Categor', function ($query) use ($list_slug_cat_phone) {
            $query->whereIn('slug', $list_slug_cat_phone);
        })->get();
        #lấy danh sách sản phẩm máy tính:
        $list_computer = Product::where('status',1)->whereHas('Categor', function ($query) use ($list_slug_cat_computer) {
            $query->whereIn('slug', $list_slug_cat_computer);
        })->get();

        #danh mục sản phẩm
        $categrories = Categor::get();
        $list_cat = $this->render_menu($categrories);
        # Lấy Slider:
        $sliders= Slider::where('status', 1)->orderBy('ordinal_number')->get();

        #lấy danh sách sản phẩm nổi bật
        $product_featured = Product::where('featured', 1)->get();
        #danh sách sản phẩm bán chạy nhất:

        
        #danh mục menu
        return view('index', compact('list_cat','list_phone','list_computer','sliders','product_featured'));
    }

    function search(Request $request){
        $categrories = Categor::get();
        $list_cat = $this->render_menu($categrories);
        $search_product = $request->input('keyword');
        $products = Product::where('name', 'LIKE', "%{$search_product}%")->get();
        
        if($search_product == ""){
            return redirect()->route('home.index');
        }else{
            return view('home.search',compact('list_cat','products','search_product'));
        }
    }
}
