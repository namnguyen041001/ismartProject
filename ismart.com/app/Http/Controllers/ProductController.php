<?php

namespace App\Http\Controllers;

use App\Models\Categor;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $homeController;

    public function __construct(HomeController $homeController)
    {
        $this->homeController = $homeController;
    }

    function detail($slug, $id){
        $slugAndIdArray = explode('-', $id);
        $id_product = end($slugAndIdArray);
        $products = Product::where('id',$id_product)->get();
        $product = $products[0];

        #lấy danh mục
        $data = Categor::get();
        $list_cat = $this->homeController->render_menu($data);
        return view('product.detail',compact('product','list_cat'));
    }
}
