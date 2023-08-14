<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CatergoryController;
use App\Models\Cat_post;
use App\Models\Post;

class CatPostController extends Controller
{
    private $catController;

    public function __construct(CatergoryController $catController)
    {
        $this->catController = $catController;
    }

    function show($slug)
    {
        $data = Cat_post::get();
        $parentCatpost = Cat_post::where('slug', $slug)->first();
        $title = $parentCatpost->name;
        $list_slug_child = $this->catController->get_slug_child($data, $parentCatpost->id);
        $list_slug_child[] = $slug;

        #lấy bài viết trong tất cả danh mục đc lấy
        $posts = Post::where('status',1)->whereHas('Cat_post', function ($query) use ($list_slug_child) {
            $query->whereIn('slug', $list_slug_child);
        })->paginate(15);
        if($slug == 'gioi-thieu.html'){
            $posts = $posts->first();
            return view('post.detail', compact('posts'));
        }else{
            return view('catPost.show', compact('posts', 'title'));
        }
    }
}
