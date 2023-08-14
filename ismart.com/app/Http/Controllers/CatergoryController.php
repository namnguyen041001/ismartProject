<?php

namespace App\Http\Controllers;

use App\Models\Categor;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

class CatergoryController extends Controller
{

    private $homeController;

    public function __construct(HomeController $homeController)
    {
        $this->homeController = $homeController;
    }

    function get_slug_child($data, $parent_id = 0)
    {
        $result = array();
        foreach ($data as $v) {
            if ($v['parent_id'] == $parent_id) {
                $result[] = $v['slug'];
                if ($this->homeController->has_child($data, $v['id'])) {
                    $result_child = $this->get_slug_child($data, $v['id'],);
                    $result = array_merge($result, $result_child);
                }
            }
        }
        return $result;
    }


    function category($slug)
    {
        $data = Categor::get();
        $parentCategory = Categor::where('slug', $slug)->first();
        $list_slug_cat = $this->get_slug_child($data, $parentCategory->id);
        $list_slug_cat[] = $slug;

        #lấy sản phẩm trong tất cả danh mục đc lấy
        $products = Product::whereHas('Categor', function ($query) use ($list_slug_cat) {
            $query->whereIn('slug', $list_slug_cat);
        })->get();

        $list_cat = $this->homeController->render_menu($data);
        return view('category.show',compact('products','parentCategory','list_cat'));
    }
}
